<?php 
/**
 * Mailer.php
 *
 * The Mailer class is meant to simplify the task of sending
 * emails to users. Note: this email system will not work
 * if your server is not setup to send mail.
 *
 * If you are running Windows and want a mail server, check
 * out this website to see a list of freeware programs:
 * <http://www.snapfiles.com/freeware/server/fwmailserver.html>
 *
 *  Please subscribe to our feeds at http://blog.geotitles.com for more such tutorials
 */

//require_once "Mail.php";


//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded


class Mailer
{
   /**
    * sendWelcome - Sends a welcome message to the newly
    * registered user, also supplying the username and
    * password.
    */
	
   function sendWelcome($user, $email, $pass){ 
	   require_once "mail/class.phpmailer.php";
	   $link = SITE_URL."/backend/confirm_email.php?confirm_email&id=".md5($user)."";
	  
	   $bodyHtml = file_get_contents(SITE_URL.'/backend/mail/users/register.html');
	   
	   $bodyHtml = str_replace("%user%",$user,$bodyHtml);
	   $bodyHtml = str_replace("%pass%",$pass,$bodyHtml);
	   $bodyHtml = str_replace("%link%",$link,$bodyHtml);
	   
	   $bodyHtml = eregi_replace("[\]",'',$bodyHtml);
	   
	   
      $body = $user.",\n\n"
             ."Welcome you've just registered at The Great Escape "
             ."with this information:\n\n"
             ."Username: ".$user."\n"
             ."Password: ".$pass."\n\n"
             ."In order to log in you have to first confirm your email: \n\n"
			 ."Please follow the next link:\n\n  ".SITE_URL."/backend/"
			 ."confirm_email.php?confirm_email&id=".md5($user)."\n\n"
			 ."If the link doesn't work, copy and paste it in the address bar of your browser\n\n"
             ."If you ever loose your password "
             ."a new one will be sent to this address.\n\n"
             ."You can change this address by going to the section "
             ."My Account once you've logged in.\n\n"
			  ."LozUnderground welcomes you!";
			 
		$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

		$mail->IsSMTP(); // telling the class to use SMTP

		 //$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
		 $mail->SMTPAuth   = true;                  // enable SMTP authentication
		 $mail->Host       = EMAIL_SMTP_HOST; // sets the SMTP server
		 $mail->Port       = EMAIL_SMTP_PORT;                    // set the SMTP port for the GMAIL server
		 $mail->Username   = EMAIL_SMTP_USERNAME; // SMTP account username
		 $mail->Password   = EMAIL_SMTP_PASSWORD;        // SMTP account password
		 $mail->SMTPSecure = EMAIL_SMTP_SECURE;
		 $mail->AddReplyTo(EMAIL_FROM_ADDR, 'No-Reply');
		 $mail->AddAddress($email);
		 $mail->SetFrom(EMAIL_FROM_ADDR, 'No-Reply');
		 $mail->Subject = 'Confirm email!';
		 $mail->AltBody = $body; //Optional
		 $mail->MsgHTML($bodyHtml);
		 //$mail->MsgHTML($body);
		 if($mail->Send()){
		 	//echo "Message Sent OK<p></p>\n";
			return true;
		 }else{
			 return false;
		 }	   
	//return mail($email,$subject,$body,implode("\r\n", $headers));
  
   }
   
   /**
    * sendNewPass - Sends the newly generated password
    * to the user's email address that was specified at
    * sign-up.
    */
   function sendNewPass($user, $email, $pass){
	  require_once "mail/class.phpmailer.php";
	  
   		$bodyHtml = file_get_contents(SITE_URL.'/backend/mail/users/new_pass.html');
	   
   	 	$bodyHtml = str_replace("%user%",$user,$bodyHtml);
   	 	$bodyHtml = str_replace("%pass%",$pass,$bodyHtml);
	   
   	 	$bodyHtml = eregi_replace("[\]",'',$bodyHtml);
	  
	  
	  
	  
      $body = $user.",\n\n"
             ."Hello! "
             ."Your new credentials! \n\n"
             ."User: ".$user."\n"
             ."Password: ".$pass."\n\n"
             ."We advice that you change it as soon as possible "
             ."for something easier to remember!\n\n"
             ."LozUnderground!";
	  
	  
	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

	$mail->IsSMTP(); // telling the class to use SMTP

	 //$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Host       = EMAIL_SMTP_HOST; // sets the SMTP server
	$mail->Port       = EMAIL_SMTP_PORT;                    // set the SMTP port for the GMAIL server
	$mail->Username   = EMAIL_SMTP_USERNAME; // SMTP account username
	$mail->Password   = EMAIL_SMTP_PASSWORD;        // SMTP account password
	$mail->SMTPSecure = EMAIL_SMTP_SECURE;
	 $mail->AddReplyTo(EMAIL_FROM_ADDR, 'No-Reply');
	 $mail->AddAddress($email);
	 $mail->SetFrom(EMAIL_FROM_ADDR, 'No-Reply');
	 $mail->Subject = 'New password';
	 $mail->AltBody = $body; //Optional
	 $mail->MsgHTML($bodyHtml);
	 if($mail->Send()){
		return true;
	 }else{
		 return false;
	 }	   
	  
	  
   }
};

/* Initialize mailer object */
$mailer = new Mailer;
 
?>
