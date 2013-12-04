<?php
 
// call the lib..
    require_once (TEMPLATEPATH . '/includes/lib/recaptchalib.php');
    $resp = null;
    $error = null;
 
// Get a key from http://recaptcha.net/api/getkey
$publickey = "6LfebM4SAAAAADPkIc5mykmQHTIyLyGn1hcLLW37";
$privatekey = "6LfebM4SAAAAAJnmd7i1ExzGSCClLuBX4vhH6T_Q";
 
 
# was there a reCAPTCHA response?
if ($_POST["submit"]) {
 
    $response = recaptcha_check_answer($privatekey,
        $_SERVER["REMOTE_ADDR"],
        $_POST["recaptcha_challenge_field"],
        $_POST["recaptcha_response_field"]);
 
        if ($response->is_valid) {
                cp_contact_ad_owner_email($post->ID);
        $msg = '<p class="green center"><strong>' . __('Your message has been sent!', 'appthemes') . '</p>';
        } else {
 
                # set the error code so that we can display it
        $msg = '<p class="red center"><strong>' . __('The anti-spam reCaptcha answer was incorrect!' , 'appthemes') . '</p>';
 
         }
}
 
?>
 
   <form name="mainform" id="mainform" class="form_contact" action="#priceblock2" method="post" enctype="multipart/form-data">
       <?php echo $msg; ?>
       <p class="contact_msg"><?php _e('To inquire about this ad listing, complete the form below to send a message to the ad poster.', 'appthemes') ?></p>
 
        <ol>
            <li>
 
                <label><?php _e('Name:', 'appthemes') ?></label>
                <input name="from_name" id="from_name" type="text" minlength="2" value="<?php if(isset($_POST['from_name'])) echo stripslashes($_POST['from_name']); ?>" class="text required" />
                <div class="clr"></div>
 
            </li>
 
            <li>
                <label><?php _e('Email:', 'appthemes') ?></label>
                <input name="from_email" id="from_email" type="text" minlength="5" value="<?php if(isset($_POST['from_email'])) echo stripslashes($_POST['from_email']); ?>" class="text required email" />
                <div class="clr"></div>
 
            </li>
 
            <li style="display:none;">
 
                <label><?php _e('Subject:', 'appthemes') ?></label>
                <input name="subject" id="subject" type="text" minlength="2" value="<?php the_title();?>" class="text required" />
                <div class="clr"></div>
 
            </li>
 
            <li>
 
                <label><?php _e('Message:', 'appthemes') ?></label>
                <textarea name="message" id="message" rows="" cols="" class="text required"><?php if(isset($_POST['message'])) echo stripslashes($_POST['message']); ?></textarea>
                 <div class="clr"></div>
 
           </li>
 
            <li>
 
          <?php 
    // include the spam checker if enabled
          appthemes_recaptcha();
     ?>
 
 
          <input name="submit" type="submit" id="submit_inquiry" class="btn_orange" value="<?php _e('Send Inquiry','appthemes'); ?>" />
 
 
          </li>
 
   </form>