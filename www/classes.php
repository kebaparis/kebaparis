<?php

class user {

public $username;
public $password;
public $email;

private $activated;
private $emailCount;
private $session_id;

private $CookieLifeTime;

//db
private $db_handler;
private $db_server;
private $db_user;
private $db_password;
private $db_name;


private $SALT_LENGTH;

	//runs every time a new reference is created
	public function __construct($newUsername, $newPassword, $newEmail) {

		$SALT_LENGTH = 16;
	
		//create useless session
		$this->createSession();
		
		include 'db_config.php';
		
		$this->CookieLifeTime = 60*60*24*50;
		$this->SALT_LENGTH = 32;

		$this->db_handler = mysql_connect($this->db_server, $this->db_user, $this->db_password) or die ("connect to db failed!");
		mysql_select_db($this->db_name, $this->db_handler) or die ("select of db failed!");
		echo "db conected: " . $this->db_server . "</br>";
		
		$this->username = $newUsername;
		$this->password['plaintext'] = $newPassword;
		$this->email = $newEmail;
		echo "class constructed: " . $this->username . "</br>";
	}

	//check registration possible
   private function registrationPossible() {
      //check time between last registration from IP (too many sign ups from your ip)
      //username allredy used
      //email allredy used
      
      //return exact faillure
   
   }
	
	//register user
	public function register() {
	  //if faillure = registrationPossible()
		//write new user in DB
		//sendValidationEmail();
	  //else put out faillure
	  
	  $saltAndHash = $this->generateHash($this->password['plaintext']);
	  list($this->password['salt'], $this->password['hash']) = explode(";", $saltAndHash, 2);
	  echo $this->password['salt'] . "  " . $this->password['hash'] . " ";
	  
	  
	  //if ($this->registrationPossible() == true) {
        if (true == true) {
       	  
       	  
		  mysql_query("
			  INSERT INTO tUser (usrName, usrPassword, usrSalt, usrEmail)
			  VALUES ('" . $this->username . "', '" . $this->password['hash'] . "', '" . $this->password['salt'] . "', '" . $this->email . "')
		   ");
       	  
	  
			$this->sendActivationEmail();
		return true;
	  }
	  
	}

	//check validation in DB
    public function checkActivationDB() {
      //lookup in DB if valide
      //return true of false
      
      $sqlResult = mysql_query("SELECT COUNT(*) FROM tUser WHERE tUser.usrName == '$this->username' AND tUser.usrActivated == TRUE");
      $sqlResultCount = mysql_num_rows($sqlResult);
      
      if ($sqlResultCount == 1)
      {
        return true;
      }
      else {
        return false;
      }

      
      
    }   

	//send validation Email
    private function sendActivationEmail() {
    //if checkRegistrationDB();
      //if not valide jet
        //if not sent to much Emails then
          // increment Email Sent count
          //send Mail with link from DB
          //or send again write in DB
          //return true if sent
      //else return false if not sent
	  
	  $activationkey = md5(uniqid(rand() * rand(), true) . $this->username);
	  
	  $bool = mysql_query("UPDATE tUser SET tUser.usrActivationtionkey = '$activationkey', usrActivationtionkeysent = usrActivationtionkeysent+1 WHERE tUser.usrName = '$this->username'");
      
		$body = <<<EOF
Hello Hello $this->username,

your activation key 
http://kebaparis.ch/login.php?akey=$activationkey
http://127.0.0.1/login.php?akey=$activationkey


EOF;
	  
		sendEmail($this->username . " <" . $this->email . ">", "kebaparis.ch registration", $body);
      

	}
	
	//generates the password hash and the salt
	public function generateHash($plainText, $salt = null) {

		if ($salt === null)
		{
			$salt = substr(md5(uniqid(rand(), true)), 0, $this->SALT_LENGTH);
		}
		else
		{
			$salt = substr($salt, 0, $this->$SALT_LENGTH);
		}

		return $salt . ";" . md5($salt . $plainText);

	}


	//write validation
    private function writeActivation() {
      //write Validation in DB
	  //rewrite Session
    }

	//check validation link <> user
    public function checkActivationLink() {
      //lookup in DB if right Link <> user
      //writeValidation()
      //createSession();
      //return true;
      //else return false;
    }

	//check if registred
    public function checkRegistrationDB() {
      //lookup in DB if user exists
      //return true or false
    }

	//creates a usless standart session
	private function createSession() {
	
		$this->session_id = session_id();
		if(empty($this->session_id)) {
			//create session if no jet existing
			session_name('usr_session');
			
			ini_set('session.use_cookies', true);
			ini_set('session.gc_maxlifetime', time() + $this->CookieLifeTime + 60);
			ini_set('session.cookie_lifetime', time() + $this->CookieLifeTime);
			
			session_set_cookie_params($this->CookieLifeTime);
			session_start();
			//standart values
			$_SESSION['logedin'] = false;
			$_SESSION['activated'] = false;
			$_SESSION['type'] = "user";
		}
	}
	
	//makeSessionUsable > login
    public function makeSessionUsable() {
      //checkSession() if allready loged in
        // or modify session (rewrite session variable valide checkValidation())
      //not allready loged in
        //check email or username | password
          //write session variables (loggedin, checkValidationSession() username, email, usrType, )
          //write in DB last logged in and IP
          //return error
      //return true false
	

	$_SESSION['username'] = $this->username;
	$_SESSION['email'] = $this->email;
	$_SESSION['logedin'] = true;
	$_SESSION['type'] = "user";
	//$_SESSION['activated'] = checkValidationDB();
  
	  
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
      //if checkSession true then
        //destroy session
        //return true
      //else
      //return false
    }


	//check Session > check login
    public function checkSession() {
        //check session variable loggded in
        //return true false
    }

	//remove user
    public function removeUser() {
        //drop user OR set user inactive
        //reutn true if user dropped or not exsisted
        //return false if user not droped
    }

	//runs every time the reference is droped
	public function __destruct() {
		mysql_close($this->db_handler);
		echo "db disconnected: " . $this->db_server;
	}
   
   


} //end class user





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