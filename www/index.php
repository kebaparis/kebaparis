<!DOCTYPE html>

<html>

  <?php include 'header.php'; ?>
  
  
  <body>
  
    <div id="login">
    
      <!--  <?php include 'usr.php'; ?> -->
	  <table>
	  <tr>
	  
		<td>
		  <label>username<label>
		  <!-- <form action="#" method="get"> -->
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

      
    </div> <!-- end div #login -->
 
  
    <div id="stand">

		<table>

			<tr>
				<td rowspan="3"><div id="map">map</div></td>
				<td colspan="3"><h1>Seeperle<h1></td>
			</tr>

			<tr>
				<td colspan="3">Stäfa</td>
			</tr>

			<tr id="buttons">
				<td><a href"#">rate</a></td>
				<td><a href"#">social</a></td>
				<td><a href"#">new</a></td>
			</tr>

		</table>
    
	</div> <!-- end #stand -->

	<div id="promo">
		<table>
			<tr>
				<td> Facebonk </td>
			</tr>
			<tr>
				<td> Twitta</td>
			</tr>
			<tr>
				<td> Mailah </td>
			</tr>
		</table>
	</div>
    <!--
    <div id="drminfo">
  		<table>
			<tr>
				<td> More Informations about Kebeabstand </td>
				<td> Hoore </td>
			</tr>  		
  		</table>
  	 </div> -->


	 <?php include 'footer.php'; ?>
	 
  </body>

</html>