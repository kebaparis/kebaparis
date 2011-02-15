<?php


	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	include "Mail.php";

	$from = "kebaparis <do-not-reply@kebaparis.ch>"; //no @signs and dots outside of the <>brackets, message will not be sent
	$to = "Marco Koch <random@example.com>";
	$subject = "Hi...";
	$body = "... how are you?";


	$host = "ssl://mail.kebaparis.ch";
	//$host = "mail.kebaparis.ch";
	$port = "465";
	$username = "<ourusername>";
	$password = "<ourpassword>";


	$headers = array (
		'From' => $from,
		'To' => $to,
		'Subject' => $subject
	);
 
	$smtp = Mail::factory(
	'smtp',
	array (
		'host' => $host,
		'port' => $port,
		'auth' => TRUE,
		'username' => $username,
		'password' => $password,
		'debug' => TRUE
		)
	);

	$mail = $smtp->send($to, $headers, $body);


 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
  


?>