<?php 
include("database.php");
$log = new logmein();     //Instentiate the class
$log->dbconnect();        //Connect to the database
$log->encrypt = true;     //set to true if password is md5 encrypted. Default is false.
if($log->logincheck($_SESSION['loggedin']) == false) header( 'Location: http://localhost/HAXKR/index.php' );
$userid = $_SESSION['userid'];

$types = array('image/jpeg', 'image/gif', 'image/png');  
$target = "upload/"; 
$file = basename($_FILES['uploaded']['name']);
$target = $target.$file; 

if (!in_array($_FILES['uploaded']['type'], $types)) {
	die("Only image types: png,jpeg,gif are allowed");
}

if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
{ 
	$log->qry("INSERT INTO `images`(`id`, `userid`, `name`, `upload_time`) VALUES (null,?,?,null)", $userid, $file);
	header( 'Location: http://localhost/HAXKR/index.php' );
} 
else 
{ 
	echo "Sorry, there was a problem uploading your file."; 
} 
 ?>