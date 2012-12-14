<?php
include("API.php");
class Project {   
	private $api = null;
	
	function Project() {
		$api = new API();
		$api->dbconnect();
		$api->encrypt = false;
    }

	function GetClients($userId) {
		return $api->GetClients($userId);
	}

	function GetApplications($clientId) {
		return $api->getApplications($clientId);
	}
		
	function GetProjects($applicationId) {
		return $api->getApplications($applicationId);
	}	
} 
?>