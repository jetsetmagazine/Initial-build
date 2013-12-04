<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if ( cp_is_zoom_enabled() ) { ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes" />
	<?php } else { ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<?php } ?>
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php $str = cp_get_header_title(); echo stripslashes($str); ?></title>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link <?php if (cp_is_flat_icon_enabled()) { echo 'rel="apple-touch-icon-precomposed"'; } else { echo 'rel="apple-touch-icon"';} ?> href="<?php echo cp_get_title_image(); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen" />
	<?php if (cp_is_gigpress_enabled() && function_exists( 'gigpress_shows' )) { ?>
		<link rel="stylesheet" href="<?php echo compat_get_plugin_url( 'cpmobile' ); ?>/themes/core/core-css/gigpress.css" type="text/css" media="screen" />
	<?php } ?>
	<?php cpmobile_core_header_styles(); cpmobile_core_header_enqueue(); ?>
	<?php if (!is_single()) { ?>
		<script type="text/javascript">
			// Hides the addressbar on non-post pages
			function hideURLbar() { window.scrollTo(0,1); }
			addEventListener('load', function() { setTimeout(hideURLbar, 0); }, false );
		</script>
<?php } ?>
</head>
<?php flush();