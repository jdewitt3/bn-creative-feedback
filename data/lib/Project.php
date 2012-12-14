<?php
include("API.php");
class Project {   
	private $api = null;
	
	function Project() {
		$api = new API();
		$api->dbconnect();
		$api->encrypt = true;
    }
		
	function GetProjects($userid) {
		return $api->getProjects($userId);
	}
	
	// returns id of new project (-1 if failed)
    function Create($clientId, $name) { 
        return $api->CreateProject($username, $password);
    }
} 
?>