<?php
include("API.php");
class Session {     
	private $api = null;
	
	function Session() {
		$api = new API();
		$api->dbconnect();
		$api->encrypt = true;
    }
	
    function Login($username, $password) { 
        return $api->login($username, $password);
    } 
	
	function IsLoggedin($logincode) {
		return $api->logincheck($logincode);
	}
	
	function Logout() {
		return $api->logout();
	}
} 
?>