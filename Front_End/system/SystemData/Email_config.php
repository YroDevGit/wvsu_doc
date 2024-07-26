<?php
/**
 * CodeYRO Mailer
 * Email config
 */
 //Configuration here...
 $protocol = 'smtp';
 $smtp_host = 'smtp.gmail.com'; //gmail host//You can change it
 $smtp_port = 587; // or 465 for SSL
 $smtp_user_email = "thirdymalocon@gmail.com"; //Your email address
 $smtp_pass = "gtdxbskarngtkqpp"; //Your email password //Password should not have spaces
 $mail_type = "html"; 
 $charset = "utf-8";



















 










 












 //Don't modify anything below. might cause errors.
 define("cy_protocol", $protocol);
 define('cy_smtp_host', $smtp_host);
 define('cy_smtp_port', $smtp_port);
 define('cy_smtp_user', $smtp_user_email);
 define('cy_smtp_pass', $smtp_pass);
 define('cy_mail_type', $mail_type);
 define('cy_charset', $charset);
?>