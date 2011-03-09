<?php

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

include 'classes.php';
$myDB = new Database();
$myDB->connect();

$myuser = new user("blahhh", "12345", "marco.koch@hsr.ch");
//$myuser->removeUser();
//$myuser->register();
$myuser->login('12345');
//echo $myuser->registrationPossible() . "<br />";
//$myuser->checkActivationLink("fecf5c6ea46c7b57c73016b2773aa2d1"); //working
//$myuser->sendActivationEmail(); //working


if (isset($_REQUEST['akey'])) {
	$myuser->checkActivationLink($_REQUEST['akey']);
}




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
