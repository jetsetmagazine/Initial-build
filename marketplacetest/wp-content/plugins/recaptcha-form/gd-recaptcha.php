<?php
/*
Plugin Name: reCAPTCHA Form
Plugin URI: http://dev.computer-rebooter.com
Version: 1.3.1
Author: The Computer Rebooter Ltd.
Author URI: http://dev.computer-rebooter.com
Description: This plugin enables you to use a reCAPTCHA contact form on your blog.

Copyright 2012 The Computer Rebooter Ltd.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// plugin class
if(!class_exists('GD_reCAPTCHA')) {
	class GD_reCAPTCHA {

		// admin sidebar menu option
		function sidebar_menu_item() {
			return add_action('admin_menu', array('GD_reCAPTCHA', 'menu_hook'));
		}
		
		// admin menu hook
		function menu_hook() {
			return add_options_page('reCAPTCHA Form Settings', 'reCAPTCHA Form', 8, __FILE__, array('GD_reCAPTCHA', 'options_page'));
		}
		
		// checks theme colour in db, returns theme colour and admin form option list (selected="selected") status in array
		function theme_check($theme_check_param) {
			$theme_check_db_entry = get_option('gd_recap_theme');
			$theme_check_selected = ' selected="selected"';
			
			$theme_check_postback = array('selected' => '', 'colour' => '');
			
			switch($theme_check_db_entry) {
				case true:
					switch($theme_check_param) {
						case ($theme_check_param == 'red' || $theme_check_param == 'gd_recap_theme_red'):
							if($theme_check_db_entry == 'gd_recap_theme_red') {
								$theme_check_postback['selected'] = $theme_check_selected;
								$theme_check_postback['colour'] = 'red';
							}
							
							break;
						
						case ($theme_check_param == 'blackglass' || $theme_check_param == 'gd_recap_theme_blackglass'):
							if($theme_check_db_entry == 'gd_recap_theme_blackglass') {
								$theme_check_postback['selected'] = $theme_check_selected;
								$theme_check_postback['colour'] = 'blackglass';
							}
							
							break;
						
						case ($theme_check_param == 'clean' || $theme_check_param == 'gd_recap_theme_clean'):
							if($theme_check_db_entry == 'gd_recap_theme_clean') {
								$theme_check_postback['selected'] = $theme_check_selected;
								$theme_check_postback['colour'] = 'clean';
							}
							
							break;
							
						case ($theme_check_param == 'white' || $theme_check_param == 'gd_recap_theme_white'):
							if($theme_check_db_entry == 'gd_recap_theme_white') {
								$theme_check_postback['selected'] = $theme_check_selected;
								$theme_check_postback['colour'] = 'white';
							}
							
							break;
							
						default:
							break;
					}
					
					break;
					
				default:
					break;
			}
			
			return $theme_check_postback;
		}
		
		// returns theme colour as variable
		function theme_colour($theme_colour_param) {
			$theme_colour_function = self::theme_check($theme_colour_param);
			$theme_colour_function = $theme_colour_function['colour'];
			
			return $theme_colour_function;
		}
		
		// returns theme colour admin form option list (selected="selected") status
		function theme_selected($theme_selected_param) {
			$theme_selected_function = self::theme_check($theme_selected_param);
			$theme_selected_function = $theme_selected_function['selected'];
			
			return $theme_selected_function;
		}
		
		//checks language in db, returns admin form option list (selected="selected") status in variable
		function language_check($language_check_param) {
			$language_check_db_entry = get_option('gd_recap_language');
			$language_check_selected = ' selected="selected"';
			$language_check_postback = '';
			
			switch($language_check_db_entry) {
				case true:
					switch($language_check_param) {
						case 'english':
							if($language_check_db_entry == 'gd_recap_language_english') $language_check_postback = $language_check_selected;
							break;
						
						case 'dutch':
							if($language_check_db_entry == 'gd_recap_language_dutch') $language_check_postback = $language_check_selected;
							break;
						
						case 'french':
							if($language_check_db_entry == 'gd_recap_language_french') $language_check_postback = $language_check_selected;
							break;
						
						case 'german':
							if($language_check_db_entry == 'gd_recap_language_german') $language_check_postback = $language_check_selected;
							break;
						
						case 'portuguese':
							if($language_check_db_entry == 'gd_recap_language_portuguese') $language_check_postback = $language_check_selected;
							break;
						
						case 'russian':
							if($language_check_db_entry == 'gd_recap_language_russian') $language_check_postback = $language_check_selected;
							break;
						
						case 'spanish':
							if($language_check_db_entry == 'gd_recap_language_spanish') $language_check_postback = $language_check_selected;
							break;
						
						case 'turkish':
							if($language_check_db_entry == 'gd_recap_language_turkish') $language_check_postback = $language_check_selected;
							break;
							
						default:
							break;
					}
					
					break;
					
				default:
					break;
			}
			
			return $language_check_postback;
		}
		
		// returns current language, and form fields text as array
		function current_language($current_language_parameter) {
			$current_language_postback = array('language' => '', 'client_name' => '', 'client_email' => '', 'client_message' => '', 'submit_button' => '', 'invalid_recaptcha' => '', 'fill_in_fields' => '', 'message_sent' => '', 'message_failed' => '');
			
			switch($current_language_parameter) {
				case 'gd_recap_language_english':
					$current_language_postback['language'] = 'en';
					$current_language_postback['client_name'] = 'Your Name:';
					$current_language_postback['client_email'] = 'Your Email Address:';
					$current_language_postback['client_message'] = 'Your Message:';
					$current_language_postback['submit_button'] = 'Submit';
					$current_language_postback['invalid_recaptcha'] = 'Invalid reCAPTCHA phrase - please try again.';
					$current_language_postback['fill_in_fields'] = 'Please fill in ALL fields.';
					$current_language_postback['message_sent'] = 'Your message has been sent.';
					$current_language_postback['message_failed'] = 'Your message could not be sent at this time.';
					
					break;
					
				case 'gd_recap_language_dutch':
					$current_language_postback['language'] = 'nl';
					$current_language_postback['client_name'] = 'Uw Naam:';
					$current_language_postback['client_email'] = 'Uw Emailadres:';
					$current_language_postback['client_message'] = 'Uw Bericht:';
					$current_language_postback['submit_button'] = 'Verstuur';
					$current_language_postback['invalid_recaptcha'] = 'Incorrecte waarden voor reCAPTCHA.  Probeer het opnieuw.';
					$current_language_postback['fill_in_fields'] = 'Vul alle velden in.';
					$current_language_postback['message_sent'] = 'Uw bericht is verzonden.';
					$current_language_postback['message_failed'] = 'Je bericht kan niet worden verzonden op dit moment.';
					
					break;
					
				case 'gd_recap_language_french':
					$current_language_postback['language'] = 'fr';
					$current_language_postback['client_name'] = 'Votre Nom:';
					$current_language_postback['client_email'] = 'Votre Email:';
					$current_language_postback['client_message'] = 'Votre Message:';
					$current_language_postback['submit_button'] = 'Envoyer';
					$current_language_postback['invalid_recaptcha'] = 'Valeur incorrecte pour reCAPTCHA.  S\'il-vous-pla&icirc;t, essayez de nouveau.';
					$current_language_postback['fill_in_fields'] = 'S\'il vous pla&icirc;t remplir tous les champs.';
					$current_language_postback['message_sent'] = 'Votre message a &eacute;t&eacute; envoy&eacute;.';
					$current_language_postback['message_failed'] = 'Votre message n\'a pas pu &ecirc;tre envoy&eacute; en ce moment.';
					
					break;
					
				case 'gd_recap_language_german':
					$current_language_postback['language'] = 'de';
					$current_language_postback['client_name'] = 'Ihr Name:';
					$current_language_postback['client_email'] = 'Ihre Email-Adresse:';
					$current_language_postback['client_message'] = 'Ihre Nachricht:';
					$current_language_postback['submit_button'] = '&Uuml;bermitteln';
					$current_language_postback['invalid_recaptcha'] = 'Falscher reCAPTCHA Satz - Bitte versuchen Sie es erneut.';
					$current_language_postback['fill_in_fields'] = 'Bitte ALLE Felder ausfüllen.';
					$current_language_postback['message_sent'] = 'Ihre Nachricht wurde verschickt.';
					$current_language_postback['message_failed'] = 'Ihre nachricht konnte nicht abgesendet werden.';
					
					break;
					
				case 'gd_recap_language_portuguese':
					$current_language_postback['language'] = 'pt';
					$current_language_postback['client_name'] = 'O seu Nome:';
					$current_language_postback['client_email'] = 'O seu Endere&ccedil;o de Email:';
					$current_language_postback['client_message'] = 'A Sua Mensagem:';
					$current_language_postback['submit_button'] = 'Enviar';
					$current_language_postback['invalid_recaptcha'] = 'A frase reCAPTCHA inválida - por favor tente novamente.';
					$current_language_postback['fill_in_fields'] = 'Por favor preencha todos os campos.';
					$current_language_postback['message_sent'] = 'A sua mensagem foi enviada.';
					$current_language_postback['message_failed'] = 'A sua mensagem não pode ser enviada neste momento.';
					
					break;
					
				case 'gd_recap_language_russian':
					$current_language_postback['language'] = 'ru';
					$current_language_postback['client_name'] = 'Ваше имя:';
					$current_language_postback['client_email'] = 'Ваш адрес электронной почты:';
					$current_language_postback['client_message'] = 'Ваше сообщение:';
					$current_language_postback['submit_button'] = 'Отправить';
					$current_language_postback['invalid_recaptcha'] = 'Неправильная reCAPTCHA фраза - пожалуйста попробуйте еще раз.';
					$current_language_postback['fill_in_fields'] = 'Пожалуйста заполните ВСЕ поля.';
					$current_language_postback['message_sent'] = 'Ваше сообщение отправлено.';
					$current_language_postback['message_failed'] = 'Ваше сообщение не было отправлено.';
					
					break;
					
				case 'gd_recap_language_spanish':
					$current_language_postback['language'] = 'es';
					$current_language_postback['client_name'] = 'Tu Nombre:';
					$current_language_postback['client_email'] = 'Tu Direcci&oacute;n De Email:';
					$current_language_postback['client_message'] = 'Tu Mensaje:';
					$current_language_postback['submit_button'] = 'Enviar';
					$current_language_postback['invalid_recaptcha'] = 'La frase de reCAPTCHA es incorrecta. Por favor, int&eacute;ntelo de nuevo.';
					$current_language_postback['fill_in_fields'] = 'Por favor, rellene TODOS los campos.';
					$current_language_postback['message_sent'] = 'Tu mensaje se ha enviado.';
					$current_language_postback['message_failed'] = 'Tu mensaje no podría ser enviado en este momento.';
					
					break;
					
				case 'gd_recap_language_turkish':
					$current_language_postback['language'] = 'tr';
					$current_language_postback['client_name'] = 'Isminiz:';
					$current_language_postback['client_email'] = 'Email Adresiniz:';
					$current_language_postback['client_message'] = 'Mesaj&iota;n&iota;z:';
					$current_language_postback['submit_button'] = 'G&ouml;nder';
					$current_language_postback['invalid_recaptcha'] = 'L&uuml;tfen reCAPTCHA (resim)/g&ouml;rd&uuml;&#287;&uuml;n&uuml;z karakterleri aynen giriniz.';
					$current_language_postback['fill_in_fields'] = 'L&uuml;tfen b&uuml;t&uuml;n alanlar&iota; doldurun.';
					$current_language_postback['message_sent'] = 'Mesaj&iota;n&iota;z g&ouml;nderildi.';
					$current_language_postback['message_failed'] = 'Mesaj&iota;n&iota;z g&ouml;nderilemedi.';
					
					break;
					
				default:
					break;
			}
			
			return $current_language_postback;
		}
		
		// admin options page
		function options_page() {
			// form submitted
			if(isset($_POST['recaptcha_admin'])) {
				$options_page_public_check = false;
				$options_page_private_check = false;
				$options_page_recaptcha_public = get_option('gd_recap_publickey');
				$options_page_recaptcha_private = get_option('gd_recap_privatekey');
				$options_page_email = get_option('gd_recap_email');
				$options_page_email_subject = get_option('gd_recap_subject');

				// public key
				switch($options_page_recaptcha_public) {
					case false:
						if(add_option('gd_recap_publickey', 'Public Key Goes Here', '', 'no')) {
							$options_page_public_check = 'no_key';
						} else {
							update_option('gd_recap_publickey', 'Public Key Goes Here');
							$options_page_recaptcha_public = get_option('gd_recap_publickey');
							$options_page_public_check = 'no_key';
						}
						
						break;
						
					case true:
						$form_option_public = $_POST['gd_recap_publickey'];
						
						if($form_option_public == 'Public Key Goes Here') {
							$options_page_public_check = 'no_key';
						} else {
							if(($form_option_public == null) || (empty($form_option_public))) {
								update_option('gd_recap_publickey', 'Public Key Goes Here');
								$options_page_recaptcha_public = get_option('gd_recap_publickey');
								$options_page_public_check = 'no_key';						
							} else {
								update_option('gd_recap_publickey', $form_option_public);
								$options_page_recaptcha_public = get_option('gd_recap_publickey');
								$options_page_public_check = 'yes_key';
							}
						}
						
						break;
						
					default:
						break;
				}
				
				// private key
				switch($options_page_recaptcha_private) {
					case false:
						if(add_option('gd_recap_privatekey', 'Private Key Goes Here', '', 'no')) {
							$options_page_private_check = 'no_key';
						} else {
							update_option('gd_recap_privatekey', 'Private Key Goes Here');
							$options_page_recaptcha_private = get_option('gd_recap_privatekey');
							$options_page_private_check = 'no_key';
						}
						
						break;
						
					case true:
						$form_option_private = $_POST['gd_recap_privatekey'];
						
						if($form_option_private == 'Private Key Goes Here') {
							$options_page_private_check = 'no_key';
						} else {
							if(($form_option_private == null) || (empty($form_option_private))) {
								update_option('gd_recap_privatekey', 'Private Key Goes Here');
								$options_page_recaptcha_private = get_option('gd_recap_privatekey');
								$options_page_private_check = 'no_key';						
							} else {
								update_option('gd_recap_privatekey', $form_option_private);
								$options_page_recaptcha_private = get_option('gd_recap_privatekey');
								$options_page_private_check = 'yes_key';
							}
						}
						break;
						
					default:
						break;
				}
				
				// theme
				$form_option_theme = $_POST['gd_recap_theme'];
				
				if(add_option('gd_recap_theme', $form_option_theme, '', 'no')) {
					$options_page_theme = $form_option_theme;
				} else {
					update_option('gd_recap_theme', $form_option_theme);
					$options_page_theme = $form_option_theme;
				}
				
				// language
				$form_option_language = $_POST['gd_recap_language'];
				
				if(add_option('gd_recap_language', $form_option_language, '', 'no')) {
					$options_page_language = $form_option_language;
				} else {
					update_option('gd_recap_language', $form_option_language);
					$options_page_language = $form_option_language;
				}				
				// email address
				if(empty($_POST['gd_recap_email'])) {
					// email field was empty when save button was clicked, so enter default blog admin email address into db
					$form_option_email = get_bloginfo('admin_email');
					
					if(add_option('gd_recap_email', $form_option_email, '', 'no')) {
						$options_page_email = $form_option_email;
					} else {
						update_option('gd_recap_email', $form_option_email);
						$options_page_email = $form_option_email;
					}
				} else {
					// email field isn't empty, add/update what was entered
					$form_option_email = $_POST['gd_recap_email'];
					
					if(add_option('gd_recap_email', $form_option_email, '', 'no')) {
						$options_page_email = $form_option_email;
					} else {
						update_option('gd_recap_email', $form_option_email);
						$options_page_email = $form_option_email;
					}
				}
				
				// email subject
				if(empty($_POST['gd_recap_subject'])) {
					// subject field was empty when save button was clicked, so enter default subject of "New Message From <blogname>" into db
					$form_option_email_subject = 'New Message From ' . get_option('blogname');
					
					if(add_option('gd_recap_subject', $form_option_email_subject, '', 'no')) {
						$options_page_email_subject = $form_option_email_subject;
					} else {
						update_option('gd_recap_subject', $form_option_email_subject);
						$options_page_email_subject = $form_option_email_subject;
					}
				} else {
					// subject field isn't empty, add/update what was entered
					$form_option_email_subject = $_POST['gd_recap_subject'];
					
					if(add_option('gd_recap_subject', $form_option_email_subject, '', 'no')) {
						$options_page_email_subject = $form_option_email_subject;
					} else {
						update_option('gd_recap_subject', $form_option_email_subject);
						$options_page_email_subject = $form_option_email_subject;
					}
				}

			// form not submitted
			} else {
				$options_page_public_check = false;
				$options_page_private_check = false;
				$options_page_recaptcha_public = get_option('gd_recap_publickey');
				$options_page_recaptcha_private = get_option('gd_recap_privatekey');
				$options_page_theme = get_option('gd_recap_theme');
				$options_page_language = get_option('gd_recap_language');
				$options_page_email = get_option('gd_recap_email');
				$options_page_email_subject = get_option('gd_recap_subject');

				// public key
				switch($options_page_recaptcha_public) {
					case false:
						if(add_option('gd_recap_publickey', 'public key', '', 'no')) {
							add_option('gd_recap_publickey', 'Public Key Goes Here', '', 'no');
							$options_page_public_check = 'no_key';
						} else {
							update_option('gd_recap_publickey', 'Public Key Goes Here');
							$options_page_recaptcha_public = get_option('gd_recap_publickey');
							$options_page_public_check = 'no_key';
						}
						
						break;
						
					case true:
						if($options_page_recaptcha_public == 'Public Key Goes Here') {
							$options_page_public_check = 'no_key';
						} elseif($options_page_recaptcha_public == null) {
							update_option('gd_recap_publickey', 'Public Key Goes Here');
							$options_page_public_check = 'no_key';
						} else {
							$options_page_public_check = 'do_nothing';
						}
						
						break;
						
					default:
						break;
				}
				
				// private key
				switch($options_page_recaptcha_private) {
					case false:
						if(add_option('gd_recap_privatekey', 'Private Key Goes Here', '', 'no')) {
							$options_page_private_check = 'no_key';
						} else {
							update_option('gd_recap_privatekey', 'Private Key Goes Here');
							$options_page_recaptcha_private = get_option('gd_recap_privatekey');
							$options_page_private_check = 'no_key';
						}
						
						break;
						
					case true:
						if($options_page_recaptcha_private == 'Private Key Goes Here') {
							$options_page_private_check = 'no_key';
						} elseif($options_page_recaptcha_private == null) {
							update_option('gd_recap_privatekey', 'Private Key Goes Here');
							$options_page_private_check = 'no_key';
						} else {
							$options_page_private_check = 'do_nothing';
						}
						
						break;
						
					default:
						break;
				}
				
				// theme
				switch($options_page_theme) {
					case false:
						if(add_option('gd_recap_theme', 'gd_recap_theme_red', '', 'no')) {
							// added option
						} else {
							update_option('gd_recap_theme', 'gd_recap_theme_red');
						}
						
						break;
						
					default:
						break;
				}
				
				// language
				switch($options_page_language) {
					case false:
						if(add_option('gd_recap_language', 'gd_recap_language_english', '', 'no')) {
							// added option
						} else {
							update_option('gd_recap_language', 'gd_recap_language_english');
						}
						
						break;
						
					default:
						break;
				}
				
				// email address
				switch($options_page_email) {
					case false:
						if(add_option('gd_recap_email', get_bloginfo('admin_email'), '', 'no')) {
							$options_page_email = get_bloginfo('admin_email');
						} else {
							update_option('gd_recap_email', get_bloginfo('admin_email'));
							$options_page_email = get_bloginfo('admin_email');
						}
						
						break;
						
					default:
						break;
				}
				
				// email subject
				$form_option_email_subject = 'New Message From ' . get_option('blogname');
				
				switch($options_page_email_subject) {
					case false:
						if(add_option('gd_recap_subject', $form_option_email_subject, '', 'no')) {
							$options_page_email_subject = $form_option_email_subject;
						} else {
							update_option('gd_recap_subject', $form_option_email_subject);
							$options_page_email_subject = $form_option_email_subject;
						}
						
						break;
						
					default:
						break;
				}
				
			}
			
			// display appropriate message
			if(($options_page_private_check == 'no_key') || ($options_page_public_check == 'no_key')){
		?>
		<div class="error"><p><strong><?php _e('Please populate the required fields.', 'recaptcha_plugin_menu' ); ?></strong></p></div>
		<?php	
			} elseif(($options_page_private_check == 'do_nothing') && ($options_page_public_check == 'do_nothing')) {
				// do nothing
			} else {
		?>
		<div class="updated"><p><strong><?php _e('Settings updated.', 'recaptcha_plugin_menu' ); ?></strong></p></div>
		<?php	
			}
		?>
		<div class="wrap">
			<h2>reCAPTCHA Form</h2>
			<h3>Settings</h3>
			<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
				<?php wp_nonce_field('update-options'); ?>
				
				<table class="form-table">
					<tr valign="top">
						<th scope="row">reCAPTCHA public key</th>
						<td>
							<input class="regular-text" type="text" name="gd_recap_publickey" value="<?php echo $options_page_recaptcha_public; ?>" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">reCAPTCHA private key</th>
						<td>
							<input class="regular-text" type="text" name="gd_recap_privatekey" value="<?php echo $options_page_recaptcha_private; ?>" />
							<p><i>If you haven't already got reCAPTCHA public and private keys, you can get them by visiting the <a href="http://www.google.com/recaptcha/whyrecaptcha">reCAPTCHA website</a>.</i></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Theme</th>
						<td>
							<select name="gd_recap_theme">
								<option value="gd_recap_theme_red"<?php echo self::theme_selected('red'); ?>>Red</option>
								<option value="gd_recap_theme_blackglass"<?php echo self::theme_selected('blackglass'); ?>>Blackglass</option>
								<option value="gd_recap_theme_clean"<?php echo self::theme_selected('clean'); ?>>Clean</option>
								<option value="gd_recap_theme_white"<?php echo self::theme_selected('white'); ?>>White</option>								
							</select>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Language</th>
						<td>
							<select name="gd_recap_language">
								<option value="gd_recap_language_english"<?php echo self::language_check('english'); ?>>English</option>
								<option value="gd_recap_language_dutch"<?php echo self::language_check('dutch'); ?>>Dutch</option>
								<option value="gd_recap_language_french"<?php echo self::language_check('french'); ?>>French</option>
								<option value="gd_recap_language_german"<?php echo self::language_check('german'); ?>>German</option>
								<option value="gd_recap_language_portuguese"<?php echo self::language_check('portuguese'); ?>>Portuguese</option>
								<option value="gd_recap_language_russian"<?php echo self::language_check('russian'); ?>>Russian</option>
								<option value="gd_recap_language_spanish"<?php echo self::language_check('spanish'); ?>>Spanish</option>
								<option value="gd_recap_language_turkish"<?php echo self::language_check('turkish'); ?>>Turkish</option>
							</select>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Email address</th>
						<td>
							<input class="regular-text" type="text" name="gd_recap_email" value="<?php echo stripslashes_deep($options_page_email); ?>" />
							<p><i>The email address where you would like the form messages sent to.</i></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Email subject</th>
						<td>
<?php

			// fix single and double quotation mark issues in the email subject so that they are correctly displayed in the "Email subject" form field
			$options_page_email_subject = htmlspecialchars_decode($options_page_email_subject, ENT_COMPAT);
			$options_page_email_subject = stripslashes($options_page_email_subject);
			$options_page_email_subject = str_replace('"', '&quot;', $options_page_email_subject);
			

?>
							<input class="regular-text" type="text" name="gd_recap_subject" value="<?php echo $options_page_email_subject; ?>" />
							<p><i>You can specify a subject for the emails you receive.</i></p>
						</td>
					</tr>
				</table>
				
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="gd_recap_privatekey" />
				<input type="hidden" name="page_options" value="gd_recap_publickey" />
				<input type="hidden" name="page_options" value="gd_recap_theme" />
				<input type="hidden" name="page_options" value="gd_recap_language" />
				<input type="hidden" name="page_options" value="gd_recap_email" />
				<input type="hidden" name="page_options" value="gd_recap_subject" />
				<p class="submit"><input type="submit" class="button-primary" name="recaptcha_admin" value="<?php _e('Save Changes') ?>" /></p>
			</form>

			<h3>Usage</h3>
			<p>Simply use the shortcode <b>[recaptcha_form]</b> in any of your posts or pages.  All emails submitted from the reCAPTCHA forms will be sent to the email address specified above.</p>

			<h3>Styling the reCAPTCHA Form</h3>
			<p>Located in the <a href="<?php echo WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)); ?>">reCAPTCHA Form plugin directory</a> is a separate CSS file, <b>recaptcha-form.css</b>, which can be edited to modify the styling of the form objects.</p>
			<a class="button" href="<?php bloginfo('url'); ?>/wp-admin/plugin-editor.php?file=recaptcha-form/gd-recaptcha.css&plugin=recaptcha-form/gd-recaptcha.php">Edit CSS file</a>

			<h3>Need some help?</h3>
			<p>Get support for this plugin by visiting the <a href="http://wordpress.org/extend/plugins/recaptcha-form/">plugin page on the WordPress forums</a>.</p>
		</div>
		<?php
		}

		// shortcode and message handling functions
		function short_code() {
			$short_code_private_check = get_option('gd_recap_privatekey');
			$short_code_public_check = get_option('gd_recap_publickey');
			$short_code_theme_value = get_option('gd_recap_theme');
			$short_code_language_value = get_option('gd_recap_language');
			$short_code_email_value = get_option('gd_recap_email');
			$short_code_language_fields = self::current_language($short_code_language_value);
			$short_code_email_subject_value = get_option('gd_recap_subject');
			$short_code_blog_name = get_option('blogname');
			
			// remove any special or escape characters from the email subject
			$short_code_email_subject_value = htmlspecialchars_decode($short_code_email_subject_value, ENT_QUOTES);
			$short_code_email_subject_value = stripslashes($short_code_email_subject_value);
			
			// remove any special or escape characters from the blog name
			$short_code_blog_name = htmlspecialchars_decode(get_option('blogname'), ENT_QUOTES);
			$short_code_blog_name = stripslashes($short_code_blog_name);
			
			// one or both keys are invalid	
			if(($short_code_private_check == 'Private Key Goes Here') || ($short_code_public_check == 'Public Key Goes Here')) {
				$short_code_form_code = '';
			// one or both keys are empty	
			} elseif(($short_code_private_check == null) || ($short_code_public_check == null)) {
				$short_code_form_code = '';
			// both keys are valid
			} else {
				// message has been submitted
				if(isset($_POST['recaptcha_client'])) {
					// include reCAPTCHA library (only if it hasn't been declared elsewhere)
					if(!is_callable('recaptcha_check_answer')) require_once('recaptchalib.php');
					
					// check reCAPTCHA response
					$short_code_recaptcha_response = recaptcha_check_answer($short_code_private_check, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
					
					// recaptcha challenge failed, show error message and contact form
					if(!$short_code_recaptcha_response->is_valid) {
						// save form data (if available) to variables
						if(empty($_POST['recaptcha_form_name'])) {
							$short_code_post_data_name = '';
						} else {
							$short_code_post_data_name = $_POST['recaptcha_form_name'];						
						}

						if(empty($_POST['recaptcha_form_email'])) {
							$short_code_post_data_email = '';
						} else {
							$short_code_post_data_email = sanitize_email($_POST['recaptcha_form_email']);
						}

						if(empty($_POST['recaptcha_form_message'])) {
							$short_code_post_data_message = '';
						} else {
							$short_code_post_data_message = stripslashes($_POST['recaptcha_form_message']);
						}

						$short_code_form_code = "\n" . '<!-- start of reCAPTCHA form -->' . "\n";
						$short_code_form_code .= '<div id="gd_recaptcha_form">' . "\n";
						$short_code_form_code .= '<p class="recaptcha_form_p recaptcha_form_p_error">' . $short_code_language_fields['invalid_recaptcha'] . '</p>' . "\n";
						$short_code_form_code .= '<br />' . "\n";
						$short_code_form_code .= '<script type="text/javascript">' . "\n";
						$short_code_form_code .= 'var RecaptchaOptions = {' . "\n";
						$short_code_form_code .= 'theme: \'' . self::theme_colour($short_code_theme_value) . '\',' . "\n";
						$short_code_form_code .= 'lang: \'' . $short_code_language_fields['language'] . '\'' . "\n";
						$short_code_form_code .= '};' . "\n";
						$short_code_form_code .= '</script>' . "\n";
						$short_code_form_code .= '<noscript>&nbsp;</noscript>' . "\n";
						$short_code_form_code .= '<form method="post" action="' . str_replace( '%7E', '~', $_SERVER['REQUEST_URI']) . '">' . "\n";
						$short_code_form_code .= '<fieldset class="recaptcha_form_fieldset">' . "\n";
						$short_code_form_code .= '<p class="recaptcha_form_p">' . $short_code_language_fields['client_name'] . '<br /><label for="recaptcha_form_name"><input type="text" id="recaptcha_form_name" name="recaptcha_form_name" value="' . $short_code_post_data_name .'" class="recaptcha_form_input" /></label></p>' . "\n";
						$short_code_form_code .= '<p class="recaptcha_form_p">' . $short_code_language_fields['client_email'] . '<br /><label for="recaptcha_form_email"><input type="text" id="recaptcha_form_email" name="recaptcha_form_email" value="' . $short_code_post_data_email .'" class="recaptcha_form_input" /></label></p>' . "\n";
						$short_code_form_code .= '<p class="recaptcha_form_p">' . $short_code_language_fields['client_message'] . '<br /><label for="recaptcha_form_message"><textarea id="recaptcha_form_message" name="recaptcha_form_message" rows="10" cols="20" class="recaptcha_form_textarea">' . $short_code_post_data_message .'</textarea></label></p>' . "\n";
						$short_code_form_code .= '<script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k=' . $short_code_public_check . '"></script>' . "\n";
						$short_code_form_code .= '<noscript>' . "\n";
						$short_code_form_code .= '<div id="gatt_design_recaptcha_plugin">' . "\n";
						$short_code_form_code .= '<object data="https://www.google.com/recaptcha/api/noscript?k=' . $short_code_public_check . '" type="text/html" id="gatt_design_recaptcha_plugin_object" class="recaptcha_form_captcha_box">' . "\n";
						$short_code_form_code .= '<!--[if IE]>' . "\n";
						$short_code_form_code .= '<object classid="clsid:235336920-03F9-11CF-8FD0-00AA00686F13" data="https://www.google.com/recaptcha/api/noscript?k=' . $short_code_public_check . '" type="text/html" id="gatt_design_recaptcha_plugin_object" class="recaptcha_form_captcha_box">' . "\n";
						$short_code_form_code .= '<p>&nbsp;</p>' . "\n";
						$short_code_form_code .= '</object>' . "\n";
						$short_code_form_code .= '<![endif]-->' . "\n";
						$short_code_form_code .= '<p>&nbsp;</p>' . "\n";
						$short_code_form_code .= '</object>' . "\n";
						$short_code_form_code .= '</div>' . "\n";
						$short_code_form_code .= '<br />' . "\n";
						$short_code_form_code .= '<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>' . "\n";
						$short_code_form_code .= '<input type="hidden" name="recaptcha_response_field" value="manual_challenge" />' . "\n";
						$short_code_form_code .= '</noscript>' . "\n";
						$short_code_form_code .= '<br />' . "\n";
						$short_code_form_code .= '<p class="recaptcha_form_p"><input type="submit" name="recaptcha_client" value="' . $short_code_language_fields['submit_button'] . '" /></p>' . "\n";
						$short_code_form_code .= '</fieldset>' . "\n";
						$short_code_form_code .= '</form>' . "\n";
						$short_code_form_code .= '</div>' . "\n";
						$short_code_form_code .= '<!-- end of reCAPTCHA form -->' . "\n";
					// recaptcha challenge passed
					} else {
						// save form data (if available) to variables
						if(empty($_POST['recaptcha_form_name'])) {
							$short_code_form_name_field = '';
						} else {
							$short_code_form_name_field = $_POST['recaptcha_form_name'];						
						}

						if(empty($_POST['recaptcha_form_email'])) {
							$short_code_form_email_field = '';
						} else {
							$short_code_form_email_field = sanitize_email($_POST['recaptcha_form_email']);
						}

						if(empty($_POST['recaptcha_form_message'])) {
							$short_code_form_message_field = '';
						} else {
							$short_code_form_message_field = stripslashes($_POST['recaptcha_form_message']);
						}
						
						// some fields are empty, show error message and contact form
						if(($short_code_form_name_field == null) || ($short_code_form_email_field == null) || ($short_code_form_message_field == null)) {
							$short_code_form_code = "\n" . '<!-- start of reCAPTCHA form -->' . "\n";
							$short_code_form_code .= '<div id="gd_recaptcha_form">' . "\n";
							$short_code_form_code .= '<p class="recaptcha_form_p recaptcha_form_p_error">' . $short_code_language_fields['fill_in_fields'] .'</p>' . "\n";
							$short_code_form_code .= '<br />' . "\n";
							$short_code_form_code .= '<script type="text/javascript">' . "\n";
							$short_code_form_code .= 'var RecaptchaOptions = {' . "\n";
							$short_code_form_code .= 'theme: \'' . self::theme_colour($short_code_theme_value) . '\',' . "\n";
							$short_code_form_code .= 'lang: \'' . $short_code_language_fields['language'] . '\'' . "\n";
							$short_code_form_code .= '};' . "\n";
							$short_code_form_code .= '</script>' . "\n";
							$short_code_form_code .= '<noscript>&nbsp;</noscript>' . "\n";
							$short_code_form_code .= '<form method="post" action="' . str_replace( '%7E', '~', $_SERVER['REQUEST_URI']) . '">' . "\n";
							$short_code_form_code .= '<fieldset class="recaptcha_form_fieldset">' . "\n";
							$short_code_form_code .= '<p class="recaptcha_form_p">' . $short_code_language_fields['client_name'] . '<br /><label for="recaptcha_form_name"><input type="text" id="recaptcha_form_name" name="recaptcha_form_name" value="' . $short_code_form_name_field .'" class="recaptcha_form_input" /></label></p>' . "\n";
							$short_code_form_code .= '<p class="recaptcha_form_p">' . $short_code_language_fields['client_email'] . '<br /><label for="recaptcha_form_email"><input type="text" id="recaptcha_form_email" name="recaptcha_form_email" value="' . $short_code_form_email_field .'" class="recaptcha_form_input" /></label></p>' . "\n";
							$short_code_form_code .= '<p class="recaptcha_form_p">' . $short_code_language_fields['client_message'] . '<br /><label for="recaptcha_form_message"><textarea id="recaptcha_form_message" name="recaptcha_form_message" rows="10" cols="20" class="recaptcha_form_textarea">' . $short_code_form_message_field .'</textarea></label></p>' . "\n";
							$short_code_form_code .= '<script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k=' . $short_code_public_check . '"></script>' . "\n";
							$short_code_form_code .= '<noscript>' . "\n";
							$short_code_form_code .= '<div id="gatt_design_recaptcha_plugin">' . "\n";
							$short_code_form_code .= '<object data="https://www.google.com/recaptcha/api/noscript?k=' . $short_code_public_check . '" type="text/html" id="gatt_design_recaptcha_plugin_object" class="recaptcha_form_captcha_box">' . "\n";
							$short_code_form_code .= '<!--[if IE]>' . "\n";
							$short_code_form_code .= '<object classid="clsid:235336920-03F9-11CF-8FD0-00AA00686F13" data="https://www.google.com/recaptcha/api/noscript?k=' . $short_code_public_check . '" type="text/html" id="gatt_design_recaptcha_plugin_object" class="recaptcha_form_captcha_box">' . "\n";
							$short_code_form_code .= '<p>&nbsp;</p>' . "\n";
							$short_code_form_code .= '</object>' . "\n";
							$short_code_form_code .= '<![endif]-->' . "\n";
							$short_code_form_code .= '<p>&nbsp;</p>' . "\n";
							$short_code_form_code .= '</object>' . "\n";
							$short_code_form_code .= '</div>' . "\n";
							$short_code_form_code .= '<br />' . "\n";
							$short_code_form_code .= '<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>' . "\n";
							$short_code_form_code .= '<input type="hidden" name="recaptcha_response_field" value="manual_challenge" />' . "\n";
							$short_code_form_code .= '</noscript>' . "\n";
							$short_code_form_code .= '<br />' . "\n";
							$short_code_form_code .= '<p class="recaptcha_form_p"><input type="submit" name="recaptcha_client" value="' . $short_code_language_fields['submit_button'] . '" /></p>' . "\n";
							$short_code_form_code .= '</fieldset>' . "\n";
							$short_code_form_code .= '</form>' . "\n";
							$short_code_form_code .= '</div>' . "\n";
							$short_code_form_code .= '<!-- end of reCAPTCHA form -->' . "\n";
						// all fields have input, send email and display confirmation message
						} else {
							// construct mail 
							$short_code_form_email_sender = 'From: ' . $short_code_form_name_field . ' <' . $short_code_form_email_field . '>';
							$short_code_form_email_receiver = $short_code_blog_name . ' <' . $short_code_email_value . '>';
							$short_code_form_email_body = 'You have received a message from ' . $short_code_blog_name . '.  Message details are as follows:' . "\n\n";
							$short_code_form_email_body .= 'Date and Time: ' . date("l jS F Y H:i:s") . "\n\n";
							$short_code_form_email_body .= 'IP address: ' . $_SERVER['REMOTE_ADDR'] . ' (' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ')' . "\n\n";
							$short_code_form_email_body .= 'Message: ' . $short_code_form_message_field;
							
							//mail sent
							if(wp_mail($short_code_form_email_receiver, $short_code_email_subject_value, $short_code_form_email_body, $short_code_form_email_sender)) {
								$short_code_form_code = '<!-- start of reCAPTCHA form -->' . "\n";
								$short_code_form_code .= '<p class="recaptcha_form_p recaptcha_form_p_info">' . $short_code_language_fields['message_sent'] . '</p>' . "\n";
								$short_code_form_code .= '<!-- end of reCAPTCHA form -->' . "\n";
							// problem sending mail
							} else {
								$short_code_form_code = '<!-- start of reCAPTCHA form -->' . "\n";
								$short_code_form_code .= '<p class="recaptcha_form_p recaptcha_form_p_error">' . $short_code_language_fields['message_failed'] . '</p>' . "\n";
								$short_code_form_code .= '<!-- end of reCAPTCHA form -->' . "\n";
							}
						}
					}
				// message hasn't been submitted, display contact form
				} else {
					$short_code_form_code = "\n" . '<!-- start of reCAPTCHA form -->' . "\n";
					$short_code_form_code .= '<div id="gd_recaptcha_form">' . "\n";
					$short_code_form_code .= '<script type="text/javascript">' . "\n";
					$short_code_form_code .= 'var RecaptchaOptions = {' . "\n";
					$short_code_form_code .= 'theme: \'' . self::theme_colour($short_code_theme_value) . '\',' . "\n";
					$short_code_form_code .= 'lang: \'' . $short_code_language_fields['language'] . '\'' . "\n";
					$short_code_form_code .= '};' . "\n";
					$short_code_form_code .= '</script>' . "\n";
					$short_code_form_code .= '<noscript>&nbsp;</noscript>' . "\n";
					$short_code_form_code .= '<form method="post" action="' . str_replace( '%7E', '~', $_SERVER['REQUEST_URI']) . '">' . "\n";
					$short_code_form_code .= '<fieldset class="recaptcha_form_fieldset">' . "\n";
					$short_code_form_code .= '<p class="recaptcha_form_p">' . $short_code_language_fields['client_name'] . '<br /><label for="recaptcha_form_name"><input type="text" id="recaptcha_form_name" name="recaptcha_form_name" value="" class="recaptcha_form_input" /></label></p>' . "\n";
					$short_code_form_code .= '<p class="recaptcha_form_p">' . $short_code_language_fields['client_email'] . '<br /><label for="recaptcha_form_email"><input type="text" id="recaptcha_form_email" name="recaptcha_form_email" value="" class="recaptcha_form_input" /></label></p>' . "\n";
					$short_code_form_code .= '<p class="recaptcha_form_p">' . $short_code_language_fields['client_message'] . '<br /><label for="recaptcha_form_message"><textarea id="recaptcha_form_message" name="recaptcha_form_message" rows="10" cols="20" class="recaptcha_form_textarea"></textarea></label></p>' . "\n";
					$short_code_form_code .= '<script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k=' . $short_code_public_check . '"></script>' . "\n";
					$short_code_form_code .= '<noscript>' . "\n";
					$short_code_form_code .= '<div id="gatt_design_recaptcha_plugin">' . "\n";
					$short_code_form_code .= '<object data="https://www.google.com/recaptcha/api/noscript?k=' . $short_code_public_check . '" type="text/html" id="gatt_design_recaptcha_plugin_object" class="recaptcha_form_captcha_box">' . "\n";
					$short_code_form_code .= '<!--[if IE]>' . "\n";
					$short_code_form_code .= '<object classid="clsid:235336920-03F9-11CF-8FD0-00AA00686F13" data="https://www.google.com/recaptcha/api/noscript?k=' . $short_code_public_check . '" type="text/html" id="gatt_design_recaptcha_plugin_object" class="recaptcha_form_captcha_box">' . "\n";
					$short_code_form_code .= '<p>&nbsp;</p>' . "\n";
					$short_code_form_code .= '</object>' . "\n";
					$short_code_form_code .= '<![endif]-->' . "\n";
					$short_code_form_code .= '<p>&nbsp;</p>' . "\n";
					$short_code_form_code .= '</object>' . "\n";
					$short_code_form_code .= '</div>' . "\n";
					$short_code_form_code .= '<br />' . "\n";
					$short_code_form_code .= '<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>' . "\n";
					$short_code_form_code .= '<input type="hidden" name="recaptcha_response_field" value="manual_challenge" />' . "\n";
					$short_code_form_code .= '</noscript>' . "\n";
					$short_code_form_code .= '<br />' . "\n";
					$short_code_form_code .= '<p class="recaptcha_form_p"><input type="submit" name="recaptcha_client" value="' . $short_code_language_fields['submit_button'] . '" /></p>' . "\n";
					$short_code_form_code .= '</fieldset>' . "\n";
					$short_code_form_code .= '</form>' . "\n";
					$short_code_form_code .= '</div>' . "\n";
					$short_code_form_code .= '<!-- end of reCAPTCHA form -->' . "\n";
				}
			}
			
			return $short_code_form_code;
		}
		
		// create the [recaptcha_form] shortcode
		function create_shortcode() {
			return add_shortcode('recaptcha_form', array('GD_reCAPTCHA', 'short_code'));
		}
		
		// create CSS file entry for page headers
		function append_css() {
			echo '<link rel="stylesheet" type="text/css" media="screen, print" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/recaptcha-form/gd-recaptcha.css" />' . "\n";
		}
		
		// function initialisations
		function start_me_up() {
			// append css file link to page headers
			add_action('wp_head', array('GD_reCAPTCHA', 'append_css'));
			
			// append short code functionality
			self::create_shortcode();

			// load plugin
			self::sidebar_menu_item();
		}
		
		// plugin class constructor
		function GD_reCAPTCHA() {
			return self::start_me_up();
		}

	}
}

// initialise class
if(class_exists('GD_reCAPTCHA')) $GD_reCAPTCHA_class = new GD_reCAPTCHA;

?>