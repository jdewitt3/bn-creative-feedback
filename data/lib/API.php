<?php
//For security reasons, don't display any errors or warnings. Comment out in DEV.
error_reporting(0);
//start session
session_start();
class API {
	function path() {
		return 'http://localhost/data/';
	}
	
    //database setup
    var $hostname_logon = 'localhost';        //Database server LOCATION
    var $database_logon = 'creativefeedback'; //Database NAME
    var $username_logon = 'designie';		  //Database USERNAME
    var $password_logon = 'bnhack';			  //Database PASSWORD
 
    //table fields
    var $user_table  = 'users';          //Users table name
    var $user_column = 'user_email';      //USERNAME column
    var $pass_column = 'user_password';       //PASSWORD column
    var $user_level  = 'usertypeid';     //USERTYPE column
 
    //encryption
    var $encrypt = false;       //set to true to use md5 encryption for the password
 
    //connect to database
    function dbconnect(){
        $connections = mysql_connect($this->hostname_logon, $this->username_logon, $this->password_logon) or die ('Unabale to connect to the database');
        mysql_select_db($this->database_logon) or die ('Unable to select database!');
        return;
    }
 
    //login function
    function login($username, $password){
        //check if encryption is used
        if($this->encrypt == true){
            $password = md5($password);
        }
		
        //execute login via qry function that prevents MySQL injections
        $result = $this->qry("SELECT * FROM ".$this->user_table." WHERE ".$this->user_column."='?' AND ".$this->pass_column." = '?';" , $username, $password);
        $row=mysql_fetch_assoc($result);
        if($row != "Error"){
            if($row[$this->user_column] !="" && $row[$this->pass_column] !=""){
                //register sessions
                $_SESSION['loggedin'] = $row[$this->pass_column];
                $_SESSION['userlevel'] = $row[$this->user_level];
				$_SESSION['useremail'] = $row[$this->user_column];
				$_SESSION['userid'] = $row['id'];
                return true;
            }else{
                session_destroy();
                return false;
            }
        }else{
            return false;
        }
    }
 
    //prevent injection
    function qry($query) {
      $args  = func_get_args();
      $query = array_shift($args);
      $query = str_replace("?", "%s", $query);
      $args  = array_map('mysql_real_escape_string', $args);
      array_unshift($args,$query);
      $query = call_user_func_array('sprintf',$args);
      $result = mysql_query($query) or die(mysql_error());
          if($result){
            return $result;
          }else{
             $error = "Error";
             return $result;
          }
    }
 
    //logout function
    function logout(){
        session_destroy();
        return;
    }
 
    //check if loggedin
    function logincheck($logincode){
        //exectue query
        $result = $this->qry("SELECT * FROM ".$this->user_table." WHERE ".$this->pass_column." = '?';" , $logincode);
        $rownum = mysql_num_rows($result);
        //return true if logged in and false if not
        if($row != "Error"){
            if($rownum > 0){
                return true;
            }else{
                return false;
            }
        }
    }
}
?>