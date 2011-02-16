<?php

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

include 'classes.php';

$myuser = new user("koma6", "12345", "info@kebaparis.ch");
$myuser->register();

?>

      <table>
        <tr>
        
          <td>
            <form action="#" method="get">
            <label>username<label>
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
