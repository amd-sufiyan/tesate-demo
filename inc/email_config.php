<?php 

define( 'SMTP_USER',   'sufiyan.ae@gmail.com' );    // Username to use for SMTP authentication
define( 'SMTP_PASS',   'bjcp5au2' );       // Password to use for SMTP authentication
define( 'SMTP_HOST',   'smtp.gmail.com' );    // The hostname of the mail server
define( 'SMTP_FROM',   'sufiyan.ae@gmail.com' ); // SMTP From email address
define( 'SMTP_NAME',   'sufiyan.ae@gmail.com' );    // SMTP From name
define( 'SMTP_PORT',   '465' );                  // SMTP port number - likely to be 25, 465 or 587
define( 'SMTP_SECURE', 'ssl' );                 // Encryption system to use - ssl or tls
define( 'SMTP_AUTH',    true );                 // Use SMTP authentication (true|false)
define( 'SMTP_DEBUG',   2 );                    // for debugging purposes only set to 1 or 2
// show wp_mail() errors
 add_action( 'wp_mail_failed', 'onMailError', 10, 1 );
 function onMailError( $wp_error ) {
		 echo "<pre>";
		 print_r($wp_error);
		 echo "</pre>";
 }  
/*
 * Add the script below to wherever you store custom code snippets
 * in your site, whether that's your child theme's functions.php, 
 * a custom plugin file, or through a code snippet plugin.
 */

/**
 * This function will connect wp_mail to your authenticated
 * SMTP server. This improves reliability of wp_mail, and 
 * avoids many potential problems.
 *
 * For instructions on the use of this script, see:
 * https://butlerblog.com/easy-smtp-email-wordpress-wp_mail/
 * 
 * Values for constants are set in wp-config.php
 */
add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( $phpmailer ) {
	$phpmailer->isSMTP();
	$phpmailer->Host       = SMTP_HOST;
	$phpmailer->SMTPAuth   = SMTP_AUTH;
	$phpmailer->Port       = SMTP_PORT;
	$phpmailer->Username   = SMTP_USER;
	$phpmailer->Password   = SMTP_PASS;
	$phpmailer->SMTPSecure = SMTP_SECURE;
	$phpmailer->From       = SMTP_FROM;
	$phpmailer->FromName   = SMTP_NAME;
}
$email = 'amd_sufiyan@yahoo.com';

// //php mailer variables
//   $to = get_option('admin_email');
//   $subject = "Some text in subject...";
	$headers = 'From: '. $email . "\r\n" .
		'Reply-To: ' . $email . "\r\n";
//  }

//Here put your Validation and send mail
$sent = wp_mail('amd_sufiyan@yahoo.com', 'Ini adalah Suject', "Ini Adalah Body Message", $headers);
			if($sent) {
				echo 'Send';
				echo $sent;

			}//message sent!
			else  {
				echo "Gatot";
				print_r($sent) ;

			}//message wa

