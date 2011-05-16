<?php

ob_start();

class user {

public $usrID;
public $usrName;
public $usrPassword;
public $usrEmail;
public $usrType;
public $usrActivationkey;
public $usrActiv;
public $usrIP;
public $usrCreated;
public $usrLastLogin;
public $usrSessionID;



private $activated;
private $emailCount;
private $session_id;

private $minRegDelay; //delay

private $CookieLifeTime;

private $SALT_LENGTH;

	//runs every time a new reference is created
	public function __construct($newUsername = NULL) {
		
		$this->CookieLifeTime = 60*60*24*50; // 50 days
		$this->minRegDelay = 20; // one day 60*60*24
		$this->SALT_LENGTH = 32;

		$this->usrIP = $_SERVER['REMOTE_ADDR'];
		
		//take value of attribute else take it from the session
		if ($this->checkLogin()) { $this->usrName = $_SESSION['username']; }
		else { $this->usrName = $newUsername; }
		
		echo "class constructed: " . $this->usrName . "</br>";
		
		$this->updateFromDB();
		$this->printUser();
	}
	
	public function printUser() {
	
          echo $this->usrID;
          echo "<b> | </b>";
          echo $this->usrName;
          echo "<b> | </b>";
          echo $this->usrPassword['hash']; //??
          echo "<b> | </b>";
          echo $this->usrPassword['salt']; //??
          echo "<b> | </b>";
          //echo $this->usrPassword['plaintext']; //??
          //echo "<b> | </b>";
          echo $this->usrEmail;
          echo "<b> | </b></br>";
          echo $this->usrType;
          echo "<b> | </b>";
          echo $this->usrActivationkey;
          echo "<b> | </b>";
          echo $this->usrActiv;
          echo "<b> | </b>";
          echo $this->usrIP;
          echo "<b> | </b>";
          echo $this->usrCreated;
          echo "<b> | </b>";
          echo $this->usrLastLogin;
          echo "<b> | </b>";
          echo $this->usrSessionID;
          echo "<b> | </b> </br>";
          //Session
          echo $_SESSION['username'];
          echo "<b> | </b>";
          echo "logedin: " . $_SESSION['logedin'];
          echo "<b> | </b> </br>";


		
	}

    	public function updateFromDB() {

	$sessionmail= mysql_query("
	SELECT usrID, usrName, usrPassword, usrSalt, usrEmail, usrType, usrActivationkey, usrActiv, usrIP,usrCreated, usrLastLogin FROM tUser WHERE tUser.usrName = '" . $this->usrName . "'
	");
		while ($row = mysql_fetch_array($sessionmail)){
			$this->usrID = $row['usrID'];
			$this->usrName  = $row['usrName'];
			$this->usrPassword['hash']  = $row['usrPassword'];
			$this->usrPassword['salt']  = $row['usrSalt'];
			$this->usrEmail  = $row['usrEmail'];
			$this->usrType  = $row['usrType'];
			$this->usrActivationkey = $row['usrActivationkey'];
			$this->usrActiv  = $row['usrActiv'];
			$this->usrIP = $row['usrIP'];
			$this->usrCreated = $row['usrCreated'];
			$this->usrLastLogin = $row['usrLastLogin'];
			}

	}


	//check registration possible
   public function registrationPossible() {
		//check time between last registration from IP (too many sign ups from your ip)
		//username allredy used
		//email allredy used
		$errorCode = 0;
		

		$result = mysql_query("
			SELECT UNIX_TIMESTAMP(MAX(usrCreated)) FROM tUser WHERE tUser.usrIP = '" . $this->usrIP . "'
		");
		
		$usrCreated = mysql_result($result, 0);
		
		if ( time() - $usrCreated < $this->minRegDelay ) {
			$errorCode = 10; // to much registrations
		}
		
		
		$result = mysql_query("
			SELECT COUNT(*) FROM tUser WHERE tUser.usrName = '" . $this->usrName . "'
		");
		if (mysql_result($result, 0) > 0) {
			$errorCode = 11; //username allready used
		}

		$result = mysql_query("
			SELECT COUNT(*) FROM tUser WHERE tUser.usrEmail = '" . $this->usrEmail . "'
		");
		if (mysql_result($result, 0) > 0) {
			
			if ($errorCode == 11) { $errorCode = 13;} //username and emailaddress are allready used
			else { $errorCode = 12;} // only the email adress is used
		}
		
		return $errorCode;
	  
	  
      //return exact faillure
   
   }
	
	//register user
	public function register($newPassword, $newEmail) {
	  //if faillure = registrationPossible()
		//write new user in DB
		//sendValidationEmail();
	  //else put out faillure
	 
	 $this->usrPassword['plaintext'] = $newPassword;
	 $this->usrEmail = $newEmail;
	 
    	  $errorCode = $this->registrationPossible();
	  
	  if ($errorCode == 0) {
       //if (true == true) {
       	  
          $saltAndHash = $this->generateHash($this->usrPassword['plaintext']);
          list($this->usrPassword['salt'], $this->usrPassword['hash']) = explode(";", $saltAndHash, 2);


		  mysql_query("
			  INSERT INTO tUser (usrName, usrPassword, usrSalt, usrEmail, usrIP)
			  VALUES ('" . $this->usrName . "', '" . $this->usrPassword['hash'] . "', '" . $this->usrPassword['salt'] . "', '" . $this->usrEmail . "', '" . $this->usrIP . "')
		   ");


			$this->sendActivationEmail();
      		return true;
	  }

	 switch ($errorCode) {
        case 0:
          echo "registred sucessfully";
          break;
        case 10:
          echo "to much registrations from your IP";
          break;
        case 11:
          echo "username allready used";
          break;
        case 12:
          echo "email allready used";
          break;
        case 13:
          echo "email and username allready used";
          break;
      }
	  
	}

	//check validation in DB
    public function checkActivationDB() {
      //lookup in DB if valide
      //return true of false
      
      $result = mysql_query("SELECT COUNT(*) FROM tUser WHERE tUser.usrName = '" . $this->usrName . "' AND tUser.usrActiv = TRUE");
      $sqlResultCount = mysql_result($result, 0);
      
      if ($sqlResultCount == 1)
      {
        return true;
      }
      else {
        return false;
      }

    }

	//send validation Email
    public function sendActivationEmail() {
    //if checkUserDB();
      //if not valide jet
        //if not sent to much Emails then
          // increment Email Sent count
          //send Mail with link from DB
          //or send again write in DB
          //return true if sent
      //else return false if not sent
	
	
	
	  $activationkey = md5(uniqid(rand() * rand(), true) . $this->usrName);
	  
	$bool = mysql_query("
		UPDATE tUser SET tUser.usrActivationkey = '$activationkey', usrActivationkeysent = usrActivationkeysent+1 WHERE tUser.usrName = '$this->usrName'
	");
      
		$body = <<<EOF
Hello Hello $this->usrName,

your activation key 
http://kebaparis.ch/login.php?akey=$activationkey
	#dev purposes
	http://127.0.0.1/dev/kebaparis/www/usr.php?akey=$activationkey&rtype=act


EOF;
	  
		sendEmail($this->usrName . " <" . $this->usrEmail . ">", "kebaparis.ch registration", $body);
      

	}
	
	//generates the password hash and the salt
	public function generateHash($plainText, $salt = null) {

		if ($salt === null)
		{
			$salt = substr(md5(uniqid(rand(), true)), 0, $this->SALT_LENGTH);
		}
		else
		{
			$salt = substr($salt, 0, $this->SALT_LENGTH);
		}

		return $salt . ";" . md5($salt . $plainText);

	}

	//check validation link <> user
    public function checkActivationLink($linkSent) {

		$sqlResult = mysql_query("UPDATE tUser SET tUser.usrActiv = TRUE WHERE tUser.usrActivationkey = '$linkSent'");

		if ($sqlResult) {
			$user = mysql_query("SELECT usrName, usrEmail, usrType FROM tUser WHERE tUser.usrActivationkey = '$linkSent'");
			$userrow = mysql_fetch_array($user);
			$this->usrName = $userrow['usrName'];
			$this->usrEmail = $userrow['usrEmail'];
			$this->usrType = $userrow['usrType'];
			
			$this->makeSessionUsable(); //login
			return true;
		}
		else {
			return false;
		}

	}

	//check if registred
    public function checkUserDB() {
      //lookup in DB if user exists
	  
	  $sqlResult = mysql_query("SELECT COUNT(*) FROM tUser WHERE tUser = '$this->usrName'");
	  $count = mysql_result($sqlResult, 0);
	  
	  if ($count == 1) {
		return true;
	  }
	  else {
		return false;
	  }

    }

	//creates a usless standart session
	public function createSession() {
	
		/*
		$this->session_id = session_id();
		
		if(!empty($this->session_id)) {
			//create session if no jet existing
			session_name('usr_session');
			
			ini_set('session.use_cookies', true);
			ini_set('session.gc_maxlifetime', time() + $this->CookieLifeTime + 60);
			ini_set('session.cookie_lifetime', time() + $this->CookieLifeTime);
			
			session_set_cookie_params($this->CookieLifeTime);*/
			session_start();
			//standart values
			$_SESSION['logedin'] = "false";
			echo "new session created <br />";
		//}
		//echo "session_id: " . $this->session_id . "<br />";
	}
	
	//makeSessionUsable > login
    private function makeSessionUsable() {
			
		echo "makeSessionUsable <- now logedin = true <br />";
		$_SESSION['username'] = $this->usrName;
		$_SESSION['logedin'] = "true";

		
		//0nly for testing
		echo "Username: ";
		echo $_SESSION['username'];
		echo " Loggedin: ";
		echo $_SESSION['logedin'] . "</br>";
	  
    }
	
	public function login($password) {
		
		$this->createSession();
		
		$this->usrPassword['plaintext'] = $password;
		
		$rawResult = mysql_query("SELECT usrPassword, usrSalt FROM tUser WHERE tUser.usrName = '$this->usrName'");
		$count = mysql_num_rows($rawResult);
		
		if ($count == 1) {
			$result = mysql_fetch_array($rawResult);
			$this->usrPassword['hash'] = $result['usrPassword'];
			$this->usrPassword['salt'] = $result['usrSalt'];
		}
		else {
			$error = false;
		}
		
		$sentHash = md5($this->usrPassword['salt'] . $this->usrPassword['plaintext']);
		
		if ($sentHash == $this->usrPassword['hash']) {
			echo "correct username und password!! <br />";
			$this->printUser();
			$this->makeSessionUsable();
			$this->printUser();
			$error = true;
		}
		else {
			echo "failed to log in <br />";
			$error = false;
		}
		
		return $error;
	}
	
    
	//check validation in Session
    public function checkValidationSession() {
      //lookup in Session if valide
      //return true of false
      if ($_SESSION['activated'] == true) {
        return true;
      }
      else {
        return false;
      }
      
    } 

	//destroy session > logout
    public function destroySession() {
      //if checkLogin true then
        //destroy session
        //return true
      //else
      //return false
    }
    
    	//set session variable logedin to false
    public function logout() {
      $_SESSION['logedin'] = "false";
    }


	//check Session > check login
    public function checkLogin() {
        //check session variable loggded in
      if ($_SESSION['logedin'] == "true") {
        return true;
      }
      else {
        return false; //return false
      }
		
    }

	//set user inactive
    public function removeUser() {
		//
		
		$bool = $this->checkActivationDB();

		if ($bool) {
			mysql_query("UPDATE tUser SET tUser.usrActiv = FAlSE WHERE tUser.usrName = '" . $this->usrName . "'");
			echo "user was active ... not anymore!";
			return true; 
		}
		else {
			echo "user was not active or did not exist...";
			return false;
		}
        
    }

	//runs every time the reference is droped
	public function __destruct() {
		//$_SESSION['username'] = $this->usrName;
		//$_SESSION['email'] = $this->usrEmail;
	}
   
   


} //end class user

class Database {

	private $db_handler;
	private $db_server;
	private $db_user;
	private $db_password;
	private $db_name;



	public function __construct() {
		include 'db_config.php';
	}
	
	
	public function connect() {

		if (!isset($this->db_handler)) {
			$this->db_handler = mysql_connect($this->db_server, $this->db_user, $this->db_password) or die ("connect to db failed!");
			mysql_select_db($this->db_name, $this->db_handler) or die ("select of db failed!");
			//echo "db conected: " . $this->db_server . "</br>";
		}
	
	}
	
	
	public function quit() {
	
		if (isset($this->db_handler)) {
			mysql_close($this->db_handler);
			$this->db_handler = NULL;
			//echo "db disconnected: " . $this->db_server;
		}
	
	}

	
	public function __destruct() {
	$this->quit();
	
	}




}


function sendEmail($recipient, $subject, $body) {
  
	if (!is_numeric($recipient)) {
		$to = $recipient;
	}
	else {
		//database query for email
	}
	
	require_once "Mail.php";

	include 'mail_config.php';


	$headers = array (
		'From' => $from,
		'To' => $to,
		'Subject' => $subject
	);
 
	$smtp = Mail::factory(
	'smtp',
	array (
		'host' => $host,
		'port' => $port,
		'auth' => TRUE,
		'username' => $username,
		'password' => $password,
		'debug' => false
		)
	);

	$mail = $smtp->send($to, $headers, $body);
	
	/*
	if (PEAR::isError($mail)) {
		echo("<p>" . $mail->getMessage() . "</p>");
	}
	else {
		echo("<p>Message successfully sent!</p>");
	} */
}


?>