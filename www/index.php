<!DOCTYPE html>

<html>

  <?php include 'header.php'; ?>
  
  
  <body>
  
    <div id="login">
    
      <!--  <?php include 'usr.php'; ?> -->
      
	  <table>
	  <tr>
	  
		<td>
		  <label> username </label>
		  <!-- <form action="#" method="get">  -->
		  <input type="text" name="username" />
		</td>
		
		<td>
		  <label> password </label>
		  <input type="password" name="password" />
		</td>
		
		<td>
		  <input type="submit" value="login" />
		  <!-- </form> -->
		</td>
		
	  </tr>
	</table>

      
    </div> <!-- end div #login -->
    
    <div id="search">
    <table>
    	<tr> 
    		<td> Search: </td>
    		<td> <input type="text" name="" value="" />  </td>
    		<td> <a href=""> Go </a>
    	</tr>
	</table>
    </div>
<!-- end div #search --> 
  
    <div id="stand">

		<table>

			<tr>
				<td rowspan="3"><div id="map">map</div></td>
				<td colspan="3" id="ort"><h1>Seeperle<h1></td>
			</tr>

			<tr>
				<td id="ort" colspan="3">Stäfa</td>
			</tr>

			<tr>
				<td colspan="2" id="trate"> <a href"#"> 
				<!-- table in table :o -->
					<table id="rate">
						<tr>
							<td> Preis / Leistung: * * * * *</td>
						</tr>
						<tr>
							<td> Preis / Leistung: * * * * </td>
						</tr>
						<tr> 
							<td> Preis / Leistung: * * *</td> 
						</tr>
						<tr> 
							<td> Preis / Leistung: * *</td> 
						</tr>
					</table>		
				<!-- end table in table :D -->		
				
				</a> </td>
				<td id="edit"> <a href"#">  </a> </td>
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
	<!-- end #promo -->
	
	
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