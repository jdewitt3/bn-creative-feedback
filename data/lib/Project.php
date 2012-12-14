<?php
include("API.php");
class Project {   
	private $api = null;
	
	function Project() {
		$api = new API();
		$api->dbconnect();
		$api->encrypt = false;
    }		

	function GetApplications($clientId) {
		return $api->getApplications($clientId);
	}
		
	function GetProjects($applicationId) {
		return $api->getApplications($applicationId);
	}	
	
    function Create($clientId, $name) { 
        return $api->CreateProject($username, $password);
    }
} 
?>