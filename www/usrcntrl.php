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

include 'classes.php';
$myDB = new Database();
$myDB-> connect();

$sql = mysql_query("select usrName,usrEmail,usrLastLogin, usrCreated from tUser where usrName like 'marco';");
$num_rows = mysql_num_rows($sql);

while ($row = mysql_fetch_array($sql)){
?>

  
<div id="usrcntrl">

   <table>
    <tr>
     <td>Username: </td> 
     <td><?=$row['usrName'];?></td>
    </tr>
   <tr>
     <td>E-Mail:  </td> 
     <td><?=$row['usrEmail'];?></td>
    </tr>
    <tr>
     <td>Last-Login: </td> 
     <td><?=$row['usrLastLogin'];?></td>
    </tr>
    <tr>
     <td>Account created: </td> 
     <td><?=$row['usrCreated'];?></td>
    </tr>
  </table>

</div>

<?php
  }
 ?>