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


    </div> <!-- end div #search --> 


<!-- Tab start -->
<div id="main">

	<div id="container">

		      <ul class="menu">
			  
				<!-- Default -->
				<li id="new" class="active"> New </li> 	
				<li id="browse"> Browse </li>  
				<li id="ranking"> Ranking </li>
				
				<!-- User is logged in -->
				<?php if ($_SESSION['logedin'] == "true")  { ?>
					<li id="usrcntrl"> Control </li>
				<?php } ?>
				
				<!-- User is moderator -->
				<?php if ($myuser->usrType == "moderator" or $myuser->usrType == "admin")  { ?>
					<li id="moderator"> Moderator </li>
				<?php } ?>

				<!-- User is Kebapowner -->
				<?php if ($myuser->usrType == "kebapowner" or $myuser->usrType == "admin")  { ?>
					<li id="kebapowner"> Kebapowner </li>
				<?php } ?>
		      </ul>
	 
		    <span class="clear"></span>  

		    <div class="content new"> 
					<?php include 'tabs/new.php'; ?>
			</div>

			<div class="content browse">  
		         	<?php include 'tabs/browse.php'; ?>
		    </div>

		    <div class="content ranking"> 
					<?php include 'tabs/ranking.php'; ?>
			</div>

		    <div class="content moderator"> 
	 				<?php include 'tabs/moderator.php'; ?>
			</div>

		    <div class="content usrcntrl"> 
					<?php include 'tabs/usrcntrl.php'; ?>
			</div>

		    <div class="content kebapowner"> 
	 				<?php include 'tabs/kebapowner.php'; ?>
			</div>
	</div>  <!-- container -->
</div> <!-- /main -->

<!-- Tab end -->

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
