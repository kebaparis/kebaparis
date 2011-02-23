<?php

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

include 'classes.php';
$myDB = new Database();
$myDB->connect();

$myuser = new user("koma9", "12345", "balhhhhh@5th.ch");
//$myuser->register();
echo $myuser->registrationPossible() . "<br />";
//$myuser->sendActivationEmail();
//echo $myuser->registrationPossible();


$myDB->quit();


?>

      <table>
        <tr>
        
          <td>
            <label>username<label>
            <form action="#" method="get">
            <input type="text" name="username" />
          </td>
          
          <td>
            <label>password<label>
            <input type="password" name="password" />
          </td>
          
          <td>
            <input type="submit" value="login" />
            </form>
          </td>
          
        </tr>
      </table>
