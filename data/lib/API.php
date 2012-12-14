<?php
//start session
session_start();
class API {	
    //database setup
    var $hostname_logon = 'localhost';        //Database server LOCATION
    var $database_logon = 'creativefeedback'; //Database NAME
    var $username_logon = 'designie';		  //Database USERNAME
    var $password_logon = 'bnhack';			  //Database PASSWORD	
 
    //encryption
    var $encrypt = false;       //set to true to use md5 encryption for the password
 
    //connect to database
    function dbconnect() {
        $connections = mysql_connect($this->hostname_logon, $this->username_logon, $this->password_logon) or die ('Unabale to connect to the database');
        mysql_select_db($this->database_logon) or die ('Unable to select database!');
        return;
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
 
    //login function
    function login($username, $password){
        //check if encryption is used
        if($this->encrypt == true){
            $password = md5($password);
        }
		
        //execute login via qry function that prevents MySQL injections
        $result = $this->qry("SELECT * FROM users WHERE user_email='?' AND user_password = '?';" , $username, $password);
        $row=mysql_fetch_assoc($result);
        if($row != "Error"){
            if($row['user_email'] !="" && $row['user_password'] !=""){
                //register sessions
                $_SESSION['loggedin'] = $row['user_password'];
                $_SESSION['userlevel'] = $row['usertypeid'];
				$_SESSION['useremail'] = $row['user_email'];
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
 
    //logout function
    function logout(){
        session_destroy();
        return;
    }
 
    //check if loggedin
    function logincheck($logincode){
        $result = $this->qry("SELECT * FROM users WHERE user_password='?';" , $logincode);
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
	
	// converts result to array to pass back ( column => value )
	function resultToArray($result) {				
		$rows = array();
		while($r = mysql_fetch_assoc($result)) {
			$rows[] = $r;
		}
		return $rows;
	}
	
	// converts result to an associative array to pass back ( id => name )
	function resultToAssociativeArray($result) {				
		$rows = array();
		while($r = mysql_fetch_assoc($result)) {
			$rows[$r['id']] = $r['name'];
		}
		return $rows;
	}
	
	function getClients($userId) {
	    return resultToAssociativeArray($this->qry("SELECT * FROM clients WHERE `userid`='?';" , $userId));
	}
	
	function getApplications($clientId) {
        return resultToAssociativeArray($this->qry("SELECT * FROM applications WHERE `clientid`='?';" , $clientId));
	}
		
	function getProjects($applicationId) {
        return resultToAssociativeArray($this->qry("SELECT * FROM projects WHERE `applicationid`='?';" , $applicationId));
	}
	
	function getAssets($projectId) {
        return resultToArray($this->qry("SELECT * FROM images WHERE `projectid`='?';" , $projectId));
	}	
	
	function addAsset($userId, $projectId, $name, $version) {
		return $api->qry("INSERT INTO `images`(`id`, `userid`, `projectid`, `name`, `upload_time`) VALUES (null,?,?,'?',null)", $userId, $projectId, $name);
	}
	
	function addComment($userId, $imageId, $comment) {
		return $this->qry("INSERT INTO `comments`(`id`, `userid`, `imageid`, `comment`, `create_time`, `modify_time`) VALUES (null,?,?,?,null,null)", $userId, $imageId, $comment);
	}
	
	function editComment($commentId, $comment) {
		return $this->qry("UPDATE `comments` SET `comment`=?,`modify_time`=CURRENT_TIMESTAMP WHERE `id`=?" , $comment, $commentId);
	}
}
?>