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
	//$myDB-> connect();
	?>
	
	<div class="coda-slider preload" id="settings-slider">
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Change password</h2>
				<div id="changePasswordDiv">
					<div id="statusHolder">
						Here comes the status.
					</div>
					<form>
						<table>
							<tr>
								<td>Current password</td>
								<td><input type="password" name="currentPassword" id="oldPassword" /></td>
							</tr>
							<tr>
								<td>New password</td>
								<td><input type="password" name="newPassword" id="newPassword" /></td>
							</tr>
							<tr>
								<td>Commit new password</td>
								<td><input type="password" name="newPasswortCommitted" id="newPassword1" /></td>
							</tr>
							<tr>
								<td></td>
								<td><a href="#" onClick="changePassword()">Change</a></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Remove account</h2>
				<p></p>
			</div>
		</div>
	</div><!-- .coda-slider -->
	
	<?php
?>