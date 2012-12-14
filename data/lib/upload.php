<?php 
include("API.php");
$api = new API();     //Instentiate the class
$api->dbconnect();        //Connect to the database
$api->encrypt = true;     //set to true if password is md5 encrypted. Default is false.
if($api->logincheck($_SESSION['loggedin']) == false) header( 'Location: '.$api->path().'/index.php' );
$userid = $_SESSION['userid'];

$types = array('image/jpeg', 'image/gif', 'image/png');  
$target = "../upload/"; 
$file = basename($_FILES['uploaded']['name']);
$target = $target.$file; 

if (!in_array($_FILES['uploaded']['type'], $types)) {
	die("Only image types: png,jpeg,gif are allowed");
}

if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
{ 
	$api->qry("INSERT INTO `images`(`id`, `userid`, `name`, `upload_time`) VALUES (null,?,'?',null)", $userid, $file);
	header( 'Location: '.$api->path().'/index.php' );
} 
else 
{ 
	echo "Sorry, there was a problem uploading your file."; 
} 
 ?>