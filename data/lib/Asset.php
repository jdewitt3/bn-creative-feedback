<?php
include("API.php");
class Asset {
	private $api = null;
	private $types = array('image/jpeg', 'image/gif', 'image/png');
	private $target = "../upload/";
	
	function Asset() {
		$api = new API();
		$api->dbconnect();
		$api->encrypt = false;
    }
	
	function GetImages($userid) {
		return $api->getImages($userId);
	}
	
	// returns id of new project (-1 if failed)
    function AddComment($userId, $imageId, $comment) { 
        return $api->addComment($userId, $imageId, $comment);
    }
	
	function AddAsset($userId, $projectId, $file) {
		//$userid = $_SESSION['userid'];	
		
		$fileName = basename($file['name']);
		$target = $target.$fileName; 

		if (!in_array($file['type'], $types)) {
			return false;
			//die("Only image types: png,jpeg,gif are allowed");
		}

		if(move_uploaded_file($file['tmp_name'], $target)) 
		{ 
			return $api->addAsset($userId, $projectId, $fileName);
		} 
		return false;		
	}
} 
?>