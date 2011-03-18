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

			<tr id="buttons">
				<td> <a href"#"> <a href=""> rate </a> </td>
				<td> <a href"#"> <a href=""> Edit </a> </td>
				<td> <a href"#"> <a href=""> New  </a> </td>
			</tr>

		</table>
    
	</div> <!-- end #stand -->

	<div id="promo">
		<table>
			<tr>
				<td> <a href=""> Facebonk </a> </td>
			</tr>
			<tr>
				<td> <a href=""> Twitta </a> </td>
			</tr>
			<tr>
				<td> <a href=""> Mailah </a> </td>
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