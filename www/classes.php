<?php

class user {

public $username;
public $password;
public $email;
public $valide;
public $EmailCount;
public $session_id;

private $CookieLifetimeTime;

//db
private $db_handler;
private $db_server;
private $db_user;
private $db_password;
private $db_name;

	//runs every time a new reference is created
	public function __construct($newUsername, $newPassword) {

		//create usless session
		$this->createSession();
		
		include 'db_config.php';
		
		$this->CookieLifetimeTime = 60*60*24*50;

		$this->db_handler = mysql_connect($this->db_server, $this->db_user, $this->db_password) or die ("connect to db failed!");
		mysql_select_db($this->db_name, $this->db_handler) or die ("select of db failed!");
		echo "db conected: " . $this->db_server . "</br>";
		
		$this->username = $newUsername;
		$this->password = $newPassword;
		echo "class constructed: " . $this->username . "</br>";
		echo time();
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
   }

	//check validation in DB
    public function checkValidationDB() {
      //lookup in DB if valide
      //return true of false
    }   

	//send validation Email
    private function sendValidationEmail() {
    //if checkRegistrationDB();
      //if not valide jet
        //if not sent to much Emails then
          // increment Email Sent count
          //send Mail with link from DB
          //or send again write in DB
          //return true if sent
      //else return false if not sent

}

	//write validation
    private function writeValidation() {
      //write Validation in DB
    }

	//check validation link <> user
    public function checkValidationLink() {
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
			ini_set('session.gc_maxlifetime', time() + $this->CookieLifetimeTime + 60);
			ini_set('session.cookie_lifetime', time() + $this->CookieLifetimeTime);
			
			session_set_cookie_params($this->CookieLifetimeTime);
			session_start();
			//standart values
			$_SESSION['logedin'] = false;
			$_SESSION['valide'] = false;
			$_SESSION['type'] = "user";
		}
	}
	
	//create session > login
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
	$_SESSION['email'] = $this->username;
	$_SESSION['logedin'] = true;
	$_SESSION['type'] = "user";
	//$_SESSION['valide'] = checkValidationDB();

	  
	  
	  
	  
	  
	  
	  
    }
    
	//check validation in Session
    public function checkValidationSession() {
      //lookup in Session if valide
      //return true of false
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
?>