<?php
include("API.php");
class Image {
	private $api = null;
	private $types = array('image/jpeg', 'image/gif', 'image/png');
	private $target = "../upload/";
	
	function Image() {
		$api = new API();
		$api->dbconnect();
		$api->encrypt = true;
    }
	
	function GetImages($userid) {
		return $api->getImages($userId);
	}
	
	// returns id of new project (-1 if failed)
    function AddComment($userId, $imageId, $comment) { 
        return $api->addComment($username, $password);
    }
	
	function Upload($userId, $file) {
		//$userid = $_SESSION['userid'];	
		
		$fileName = basename($file['name']);
		$target = $target.$fileName; 

		if (!in_array($file['type'], $types)) {
			return false;
			//die("Only image types: png,jpeg,gif are allowed");
		}

		if(move_uploaded_file($file['tmp_name'], $target)) 
		{ 
			return $api->addImage($userId, $fileName);
		} 
		return false;		
	}
} 
?>