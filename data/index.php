<?php 
include("lib/database.php");
$log = new logmein();     //Instentiate the class
$log->dbconnect();        //Connect to the database

if($log->logincheck($_SESSION['loggedin']) == false) {
	header( 'Location: '.$log->path().'/Views/login.php' );
}

echo "Hello ".$_SESSION['useremail'];
echo "<br />";
echo "<a href='".$log->path()."Views/upload.php'>Upload Image</a>";
echo "<br />";
echo "<a href='".$log->path()."lib/logout.php'>Logout</a>";
echo "<br />";

?>