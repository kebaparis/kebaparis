<?php

class user {

//register user
   public function register() {
      //if faillure = registrationPossible()
        //write new user in DB
        //sendValidationEmail();
      //else put out faillure
   }
   
//check registration possible
   public function registrationPossible() {
      //check time between last registration from IP (too many sign ups from yout ip)
      //username allredy used
      //email allredy user
      
      //return exact faillure
   
   }

//check validation in DB
    public function checkValidationDB() {
      //lookup in DB if valide
      //return true of false
    }   

//send validation Email
    public function sendValidationEmail() {
    //if checkRegistrationDB();
      //if not valide jet
        //if not sent to much Emails then
          // increment Email Sent count
          //send Mail with link from DB
          //or send new one and write in DB
          //return true if sent
      //else return false if not sent

}

//write validation
    public function writeValidation() {
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
    public function checkRegistration() {
      //lookup in DB if user exists
      //return true or false
    }

//create session > login
    public function createSession() {
      //checkSession() if allready loged in
        // or modify session (rewrite session variable valide checkValidation())
      //not allready loged in
        //check email or username | password
          //write session variables (loggedin, checkValidation() username, email, usrType, )
          //write in DB last logged in and IP
          //return error
      //return true false
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
      else
      //return false
    }


//check Session > check login
    public function checkSession() {
        //check session variable loggded in
        //return true false
    }

//remove user
    public function() {
        //drop user OR set user inactive
        //reutn true if user dropped or not exsisted
        //return false if user not droped
    }




   public function __construct( <...> ) {
      $this->_Link = mysql_connect( <...> );
   }


   public function __destruct() {
      mysql_close( $this->_Link );
   }

} //end class user
?>