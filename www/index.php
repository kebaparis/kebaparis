<!DOCTYPE html>

<html>

  <?php include 'header.php'; ?>
  
  
  <body>
  
    <div id="login">
    
      <?php include 'usr.php'; ?> 
      

      
    </div> <!-- end div #login -->
    
    <div id="search">
    <table>
    	<tr> 
    		<td> Search: </td>
    		<td> <input type="text" name="q" onkeyup="letstype(this.value, '""')" size="20" /> </td>
    		<td> <a href=""> Go </a> </td>
    	</tr>
	</table>


    </div>
<!-- end div #search --> 


<!-- Arvet test 1 -->
        <div id="tabvanilla" class="widget">

            <ul class="tabnav">
                <li><a href="#browse">Browse</a></li>
                <li><a href="#new">New</a></li>
                <li><a href="#ranking">Ranking</a></li>
								<li><a href="#moderator">Moderator</a></li>
								<li><a href="#kebapowner">Kebapowner</a></li>            
						</ul>

            <div id="browse" class="tabdiv">
										<p> browse </p>

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


            </div><!--/browse-->
            
            <div id="new" class="tabdiv">
                <p> new </p>
            </div><!--/new-->
            
            <div id="ranking" class="tabdiv">
                   <p> ranking </p>
            </div><!--ranking-->

            <div id="moderator" class="tabdiv">
                   <p> moderator </p>
            </div><!--moderator-->

            <div id="kebapowner" class="tabdiv">
                   <p> kebapowner </p>
            </div><!--kebapowner-->

        </div><!--/widget-->

<!-- Arvet end test 1 -->

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
