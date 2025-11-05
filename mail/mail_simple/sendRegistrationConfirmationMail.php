<?php
error_reporting(0);
		function sendRegistrationConfirmationMail($email,$subject,$msg){
		/************************** Send Email Notification **************************************************************/
	require_once('PHPMailer_v5.1/class.phpmailer.php');
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	
	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	
	$mail->IsSMTP(); // telling the class to use SMTP
	
	try {
	  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	  $mail->SMTPAuth   = true;                  // enable SMTP authentication
	  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	  $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	  $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
	//  $mail->Username   = "yourusername@gmail.com";  // GMAIL username
		$mail->Username   = "rajeshnagar.tops@gmail.com";  // GMAIL username
	//  $mail->Password   = "yourpassword";            // GMAIL password
		$mail->Password   = "xdftchytoqupjthw";            // GMAIL password
	//  $mail->AddReplyTo('name@yourdomain.com', 'First Last');
	  $mail->AddReplyTo($email, 'Mrugesh Vaghela');
	//$mail->AddAddress('whoto@otherdomain.com', 'John Doe');
	$mail->AddAddress($email, 'Mrugesh Vaghela');
	//  $mail->SetFrom('name@yourdomain.com', 'First Last');
	  $mail->SetFrom('rajeshnagarn@gmail.com', 'Nagar Rajesh');
	$mail->AddReplyTo($email, 'First Last');
	 $mail->Subject = $subject;
	  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
	  $mail->MsgHTML($msg);
	 
	  $mail->Send();
	  echo "Message Sent OK</p>\n";
	} catch (phpmailerException $e) {
	   $e->errorMessage(); //Pretty error messages from PHPMailer
	} catch (Exception $e) {
	  $e->getMessage(); //Boring error messages from anything else!
	}
		
		/****************************** set session and redirect to the user dhashboard ************************/
	
		}
	?>		
	