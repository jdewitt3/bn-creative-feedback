<?php 
include("lib/API.php");
$api = new API();     //Instentiate the class
$api->dbconnect();        //Connect to the database

if($api->logincheck($_SESSION['loggedin']) == false) {
	header( 'Location: '.$api->path().'/Views/login.php' );
}

echo "Hello ".$_SESSION['useremail'];
echo "<br />";
echo "<a href='".$api->path()."Views/upload.php'>Upload Image</a>";
echo "<br />";
echo "<a href='".$api->path()."lib/logout.php'>Logout</a>";
echo "<br />";

?>