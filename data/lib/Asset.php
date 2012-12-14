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
	
	function GetImages($userId) {
		return $api->getImages($userId);
	}
	
	function GetComments($imageid) {
		return $api->getComments($imageid);
	}
	
	function AddTag($userId, $imageId, $name, $comment, $x, $y) {
        return $api->AddTag($userId, $imageId, $name, $comment, $x, $y);
	}
	
	// returns id of new project (-1 if failed)
    function AddComment($userId, $imageId, $comment) { 
        return $api->addComment($userId, $imageId, $comment);
    }
	
	function AddAsset($userId, $projectId, $file) {
		//$userId = $_SESSION['userId'];	
		
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