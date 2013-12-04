=== reCAPTCHA Form ===
Contributors: tcrDev
Donate link: http://dev.computer-rebooter.com
Tags: recaptcha form, recaptcha contact form, contact, form, contact form, recaptcha, antispam, captcha
Requires at least: 3.4
Tested up to: 3.4.1
Stable tag: 1.3.1

This plugin enables you to use a Google reCAPTCHA contact form on your blog.

== Description ==

A simple plugin for your WordPress blog that enables you to have a contact form with the reCAPTCHA challenge system.

All you have to do is install and activate the plugin, enter your reCAPTCHA keys in the Admin section, and place the 
shortcode `[recaptcha_form]` on any page or post within your blog, that's it!

You can optionally specify a theme for the reCAPTCHA box (Red, Blackglass, Clean and White), and you can also specify 
a different language (Dutch, French, German, Portuguese, Russian, Spanish and Turkish).

The form asks users for their name, email address and message.  The plugin will check that all fields have been filled 
in, and check the reCAPTCHA challenge has been validated before sending the email to the blog administrator's email 
address (a different email address can be specified if required).

If you would like to style the form elements using CSS to better fit in with your WordPress theme, this is also possible 
by editing the plugin's CSS file.

== Installation ==

1. Upload the `recaptcha-form` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to the `reCaptcha Form` Admin section and enter your reCAPTCHA private and public keys, and recipient email address
1. Use the shortcode `[recaptcha_form]` in any of your posts or pages

== ChangeLog ==

= Version 1.3.1

* Maintenance release
* Updated FAQ

= Version 1.3 =

* Added DIV tag to wrap around the reCAPTCHA form (for further CSS styling flexibility)
* Added option to change email subject
* Bug fix for blog names containing quotation marks in the email message
* Bug fix for blogs accessed via SSL
* Bug fix for unescaped quotation marks in the email message
* Updated code to point to Google's reCAPTCHA API servers
* Updated recaptchalib.php to latest version (v1.11, June 2010) from Google
* Updated URL in admin to point to the reCAPTCHA website on Google's web servers

= Version 1.2 =

* Bug fix for reCAPTCHA HTML form label W3C XHTML standards compliancy.
* Added option to change recipient email address (field is filled in with blog administrator's email address by default).
* Form field input (sender's name, email address and message) are retained in the form if message sending fails.

= Version 1.11 =

* Changed source code encoding to UTF-8 from ANSI for better international language character support.
* Added CSS stylesheet for reCAPTCHA form styling (`gd-recaptcha.css`, in the `recaptcha-form` plugin directory).

= Version 1.1 =

* Modified reCAPTCHA HTML form for W3C XHTML standards compliancy.
* Added support for other reCAPTCHA box themes (Blackglass, Clean and White).
* Added support for Dutch, French, German, Portuguese, Russian, Spanish and Turkish languages.

= Version 1.0.1 =

* Bug fix for WordPress installations that do not have any other plugins which use reCAPTCHA.

= Version 1.0 =

* First release.

== Frequently Asked Questions ==

= Where Can I Use The reCAPTCHA Form? =

You can use it in any post or page.  Simply insert the shortcode `[recaptcha_form]`

= I Don't Have Any reCAPTCHA Keys.  Where Can I Get Them From? =

You can get them from the [Google reCAPTCHA website](http://www.google.com/recaptcha/whyrecaptcha "Google reCAPTCHA website").

= Can I Use This Plugin With Other Plugins That Use reCAPTCHA? =

reCAPTCHA Form can be installed alongside any other plugins that use the reCAPTCHA challenge system, however you must 
make sure that whatever post/page you insert the reCAPTCHA Form shortcode on does not already display a reCAPTCHA 
form - this is because you cannot display more than one reCAPTCHA form on the same web page.

= Why Isn't This Plugin Working For Me? =

* Make sure that you have correctly copied the public and private keys from the Google website, and without spaces before or after each key
* Make sure that you entered a valid email address in the settings, and that email functionality is working on your server
* Check your Junk Mail/Spam folders in your email client in case they have been incorrectly marked as spam messages

== Translation Credits ==

* German: [Ömür Yolcu Iskender](http://www.pandorascode.com/ "Ömür Yolcu Iskender"), [socreative.tv](http://socreative.tv/ "socreative.tv")
* Russian: [socreative.tv](http://socreative.tv/ "socreative.tv")
* Turkish: [Ömür Yolcu Iskender](http://www.pandorascode.com/ "Ömür Yolcu Iskender")

== Screenshots ==

1. The reCAPTCHA admin section
2. The reCAPTCHA form - English, Red theme
3. The reCAPTCHA form - French, Blackglass theme
4. The reCAPTCHA form - Spanish, Clean theme
5. The reCAPTCHA form - German, White theme