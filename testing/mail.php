<?php

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

echo "blahh";
include "Mail.php";

$from = "kebaparis.ch team <do-not-reply@kebaparis.ch>";
$to = "sepp <marco@5th.ch>";
$subject = "Hi...";
$body = "... how are you?";


 $host = "ssl://mail.5th.ch";
 $port = "465";
 $username = "<ourusername>";
 $password = "<ourpassword>";


$headers = array (
 'From' => $from,
 'To' => $to,
 'Subject' => $subject);
 
$smtp = Mail::factory(
 'smtp',
 array (
   'host' => $host,
   'port' => $port,
   'auth' => true,
   'username' => $username,
   'password' => $password
 )
);

$mail = $smtp->send($to, $headers, $body);


 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }

?>