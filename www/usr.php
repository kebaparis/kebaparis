<?php 

session_start();
  
  include 'classes.php';
  $myDB = new Database();
  $myDB->connect();
  
  //define request type (login / logout / registration / activation / blahh)
  $rtype = $_REQUEST['rtype'];
  
  switch ($rtype) {
    case "lin":
      lin();
      break;
      
    case "lou":
      lou();
      break;
      
    case "reg":
      reg();
      break;
      
    case "act":
      act();
      break;
      
    default:
      def();
      break;
  }
  
  $myDB->quit();
  

  function lin() {
    echo "login requested <br />";
    $User['username'] = $_REQUEST['username'];
    $User['password'] = $_REQUEST['password'];
    
    $myuser = new user($User['username']);
    $myuser->login($User['username'],$User['password']);

  } // end lin()

  function lou() {
    echo "logout requested <br />";
    //user class weiss den username aus der session
    
    $myuser = new user();
	$myuser->destroySession();
    //$myuser->logout();
  
  } // end lou()


  
  function reg() {
    echo "registration requested <br />";
    $newUser['username'] = $_REQUEST['username'];
    $newUser['password'] = $_REQUEST['password'];
    $newUser['email'] = $_REQUEST['email'];
    
    $myuser = new user($newUser['username'], $newUser['password'], $newUser['email']);
    $myuser->register();
  
  } // end reg()
  
  
  function act() {
    echo "activation requested <br />";
    $sentAkey = $_REQUEST['akey'];
    
    $myuser = new user();
    $myuser->checkActivationLink($sentAkey);
  
  } // end act()


  function def() {
	echo "default requested <br />";
    $myuser = new user();
    
	$myuser->checkValidationSession();
	
	if(isset($_POST['feld']) && $_POST['feld']=="1") {
	echo lin();
	?>
	<!--  logout button / stuff here -->
	<p> logout button here with link</p>
	
	<?php
	}
	else {
    //if ($myuser->checkLogin()) {
	
    /*echo "logged in... $myuser->username";
    }
    else {
      echo "user not logged in";
	*/
    ?>
	
<!-- Login test Arvet -->


<form action="index.php" method="post">
Username: <input type="text" name="username" size="15"> <br>
Password: <input type="password" name="password" size="15"> <br>
<input type="hidden" name="feld" value="1" />
<input type="submit" />
</form> 


<!--
<table>
  <tr>
  
    <td>
      <label>username<label>
      <form action="#" method="get">
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

-->
    <?php
	}
    //end else } 
    
  } // end def()


?>