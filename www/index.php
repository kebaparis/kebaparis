<!DOCTYPE html>

<html>

  <?php include 'header.php'; ?>
  
  
  <body>
  
    <!-- Login & Registration form -->
    <?php include 'usr.php'; ?> 
    
    
    <div id="search">
    	<table>
					<tr> 
						<td> Search: </td>
						<td> <input type="text" name="q" onkeyup="letstype(this.value, '""')" size="20" /> </td>
						<td> <a href=""> Go </a> </td>
					</tr>
			</table>
    </div> <!-- end div #search --> 



	<div id="container">


		<div id="promo">
			<table>
				<tr>
					<!-- https://www.facebook.com/brandpermissions/logos.php -->
					<td> <a href="https://www.facebook.com/pages/kebaparisch/157140087677024" target="_blank"> Facebonk </a> </td>
				</tr>
				<tr>
					<td> <a href="http://twitter.com/#!/kebaparisch" target="_blank"> Twitta </a> </td>
				</tr>
				<tr>
					<td> <a href="mailto:info@kebaparis.ch"> Mailah </a> </td>
				</tr>
			</table>
		</div> 	<!-- end #promo -->

	</div>	<!-- end #container -->


	 <?php include 'footer.php'; ?>
	 
  </body>

</html>
