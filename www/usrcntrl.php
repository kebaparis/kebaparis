<?php 
/* User control page, nach der fertigstellung wird diese Seite auf der mainpage eingebunden und durch einen link über javascript aufgerufen 

Hier können user einstellungen vorgenommen werde, sowie Statistiken werden angezeigt. 

	Statistik
		- Erfasste Kebabstände
		- Bewertete Kebabstände
	
	Konfiguration / Anzeige
		- Username 
		- Passwort ändern
		- E-Mail addresse
		- Konto löschen
*/


include 'header.php';
include 'classes.php';


$myDB = new Database();
$myDB-> connect();


//Find username in session
$myUser = new user("arvet");
echo $myUser->username;



/* 
//$sql = mysql_query("select usrName,usrEmail,usrLastLogin, usrCreated from tUser where usrName = 'marco';");
$sql = mysql_query("select usrName,usrEmail,usrLastLogin, usrCreated from tUser where usrName = '".$myUser->username."'");
$num_rows = mysql_num_rows($sql);

while ($row = mysql_fetch_array($sql)){
*/
?>

  
<div id="usrcntrl">

   <table>
    <tr>
     <td>Username: </td> 
     <td><?echo $usrName;?></td>
    </tr>
   <tr>
     <td>E-Mail:  </td> 
     <td><?echo $usrName;?></td>
    </tr>
    <tr>
     <td>Last-Login: </td> 
     <td><?echo $usrName;?></td>
    </tr>
    <tr>
     <td>Account created: </td> 
     <td><?echo $usrName;?></td>
    </tr>
  </table>

</div>
