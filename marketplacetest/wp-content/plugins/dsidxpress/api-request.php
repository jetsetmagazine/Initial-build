<?php
class dsSearchAgent_ApiRequest {
	public static $ApiEndPoint = "http://api.idx.diversesolutions.com/api/";
	// do NOT change this value or you will be automatically banned from the API. since the data is only updated every two hours, and
	// since these API calls are computationally intensive on our servers, we need to set a reasonable cache duration.
	private static $CacheSeconds = 7200;
	private static $NumericValues = array(
		"query.PriceMin",
		"query.PriceMax",
		"query.ImprovedSqFtMin",
		"query.BedsMin",
		"query.BathsMin"
	);

	static function FetchData($action, $params = array(), $echoAssetsIfNotEnqueued = true, $cacheSecondsOverride = null, $options = null) {
		global $wp_query, $wp_version;

		$options = $options ? $options : get_option(DSIDXPRESS_OPTION_NAME);
		$privateApiKey = $options["PrivateApiKey"];
		$requestUri = self::$ApiEndPoint . $action;
		$compressCache = function_exists('gzdeflate') && function_exists('gzinflate');

		if(!class_exists('Memcached'))
			$memcached = null;
		else if(isset($options["MemcacheHost"]) && isset($options["MemcachePort"])) {
			$memcached = new Memcached();
			if($memcached->addServer($options["MemcacheHost"], $options["MemcachePort"]) === false)
				$memcached = null;
		} else
			$memcached = null;

		if(!class_exists('Memcache'))
			$memcache = null;
		else if(isset($options["MemcacheHost"]) && isset($options["MemcachePort"])) {
			$memcache = new Memcache;
			if($memcache->connect($options["MemcacheHost"], $options["MemcachePort"]) === false)
				$memcache = null;
		} else
			$memcache = null;

		$params["query.SearchSetupID"] = $options["SearchSetupID"];
		$params["requester.AccountID"] = $options["AccountID"];
		$params["requester.ApplicationProfile"] = "WordPressIdxModule";
		$params["requester.ApplicationVersion"] = $wp_version;
		$params["requester.PluginVersion"] = DSIDXPRESS_PLUGIN_VERSION;
		$params["requester.RequesterUri"] = get_bloginfo("url");
		$params["requester.IsRegistered"] = current_user_can(dsSearchAgent_Roles::$Role_ViewDetails) ? "true" : "false";

		foreach (self::$NumericValues as $key) {
			if (array_key_exists($key, $params))
				$params[$key] = str_replace(",", "", $params[$key]);
		}

		ksort($params);
		$transientKey = "idx_" . sha1($action . "_" . http_build_query($params));

		if ($cacheSecondsOverride !== 0) {
			if(isset($memcache))
				$cachedRequestData = $memcache->get($transientKey);
			else if(isset($memcached))
				$cachedRequestData = $memcached->get($transientKey);
			else
				$cachedRequestData = get_transient($transientKey);

			if ($cachedRequestData) {
				$cachedRequestData = $compressCache ? unserialize(gzinflate(base64_decode($cachedRequestData))) : $cachedRequestData;
				$cachedRequestData["body"] = self::ExtractAndEnqueueStyles($cachedRequestData["body"], $echoAssetsIfNotEnqueued);
				$cachedRequestData["body"] = self::ExtractAndEnqueueScripts($cachedRequestData["body"], $echoAssetsIfNotEnqueued);
				return $cachedRequestData;
			}
		}

		// these params need to be beneath the caching stuff since otherwise the cache will be useless
		$params["requester.ClientIpAddress"] = $_SERVER["REMOTE_ADDR"];
		$params["requester.ClientUserAgent"] = $_SERVER["HTTP_USER_AGENT"];
		$params["requester.UrlReferrer"] = $_SERVER["HTTP_REFERER"];
		$params["requester.UtcRequestDate"] = gmdate("c");

		ksort($params);
		$stringToSign = "";
		foreach ($params as $key => $value) {
			$stringToSign .= "$key:$value\n";
			if (!isset($params[$key]))
				$params[$key] = "";
		}
		$stringToSign = rtrim($stringToSign, "\n");
		$params["requester.Signature"] = hash_hmac("sha1", $stringToSign, $privateApiKey);
		$response = (array)wp_remote_post($requestUri, array(
			"body"			=> $params,
			"redirection"	=> "0",
			"timeout"		=> 15 // we look into anything that takes longer than 2 seconds to return
		));

		if (empty($response["errors"]) && substr($response["response"]["code"], 0, 1) != "5") {
			$response["body"] = self::FilterData($response["body"]);
			if ($cacheSecondsOverride !== 0 && $response["body"]){
				if(isset($memcache))
					$memcache->set($transientKey, $compressCache ? base64_encode(gzdeflate(serialize($response))) : $response, MEMCACHE_COMPRESSED, $cacheSecondsOverride === null ? self::$CacheSeconds : $cacheSecondsOverride);
				else if(isset($memcached))
					$memcached->set($transientKey, $compressCache ? base64_encode(gzdeflate(serialize($response))) : $response, time() + ($cacheSecondsOverride === null ? self::$CacheSeconds : $cacheSecondsOverride));
				else
					set_transient($transientKey, $compressCache ? base64_encode(gzdeflate(serialize($response))) : $response, $cacheSecondsOverride === null ? self::$CacheSeconds : $cacheSecondsOverride);
			}
			$response["body"] = self::ExtractAndEnqueueStyles($response["body"], $echoAssetsIfNotEnqueued);
			$response["body"] = self::ExtractAndEnqueueScripts($response["body"], $echoAssetsIfNotEnqueued);
		}

		return $response;
	}
	private static function FilterData($data) {
		global $wp_version;

		$blog_url = get_bloginfo("url");

		$blogUrlWithoutProtocol = str_replace("http://", "", $blog_url);
		$blogUrlDirIndex = strpos($blogUrlWithoutProtocol, "/");
		$blogUrlDir = "";
		if ($blogUrlDirIndex) // don't need to check for !== false here since WP prevents trailing /'s
			$blogUrlDir = substr($blogUrlWithoutProtocol, strpos($blogUrlWithoutProtocol, "/"));

		$idxActivationPath = $blogUrlDir . "/" . dsSearchAgent_Rewrite::GetUrlSlug();

		$dsidxpress_options = get_option(DSIDXPRESS_OPTION_NAME);
		$dsidxpress_option_keys_to_output = array("ResultsMapDefaultState");
		$dsidxpress_options_to_output = array();

		foreach($dsidxpress_options as $key => $value)
		{
			if(in_array($key, $dsidxpress_option_keys_to_output))
				$dsidxpress_options_to_output[$key] = $value;
		}

		$data = str_replace('{$pluginUrlPath}', DSIDXPRESS_PLUGIN_URL, $data);
		$data = str_replace('{$pluginVersion}', DSIDXPRESS_PLUGIN_VERSION, $data);
		$data = str_replace('{$wordpressVersion}', $wp_version, $data);
		$data = str_replace('{$wordpressBlogUrl}', $blog_url, $data);
		$data = str_replace('{$wordpressBlogUrlEncoded}', urlencode($blog_url), $data);
		$data = str_replace('{$wpOptions}', json_encode($dsidxpress_options_to_output), $data);

		$data = str_replace('{$idxActivationPath}', $idxActivationPath, $data);
		$data = str_replace('{$idxActivationPathEncoded}', urlencode($idxActivationPath), $data);

		return $data;
	}
	private static function ExtractAndEnqueueStyles($data, $echoAssetsIfNotEnqueued) {
		// since we 100% control the data coming from the API, we can set up a regex to look for what we need. regex
		// is never ever ideal to parse html, but since neither wordpress nor php have a HTML parser built in at the
		// time of this writing, we don't really have another choice. in other words, this is super delicate!

		preg_match_all('/<link\s*rel="stylesheet"\s*type="text\/css"\s*href="(?P<href>[^"]+)"\s*data-handle="(?P<handle>[^"]+)"\s*\/>/', $data, $styles, PREG_SET_ORDER);
		foreach ($styles as $style) {
			if (!$echoAssetsIfNotEnqueued || ($echoAssetsIfNotEnqueued && wp_style_is($style["handle"], 'registered')))
				$data = str_replace($style[0], "", $data);

			if ($echoAssetsIfNotEnqueued)
				wp_register_style($style["handle"], $style["href"], false, "-");
			else
				wp_enqueue_style($style["handle"], $style["href"], false, "-");
		}

		return $data;
	}
	private static function ExtractAndEnqueueScripts($data, $echoAssetsIfNotEnqueued) {
		// see comment in ExtractAndEnqueueStyles

		preg_match_all('/<script\s*src="(?P<src>[^"]+)"\s*data-handle="(?P<handle>[^"]+)"><\/script>/', $data, $scripts, PREG_SET_ORDER);
		foreach ($scripts as $script) {
			if (!$echoAssetsIfNotEnqueued || ($echoAssetsIfNotEnqueued && wp_script_is($script["handle"], 'registered')))
				$data = str_replace($script[0], "", $data);

			if ($echoAssetsIfNotEnqueued)
				wp_register_script($script["handle"], $script["src"], false, "-");
			else
				wp_enqueue_script($script["handle"], $script["src"], false, "-");
		}

		return $data;
	}
}
?>