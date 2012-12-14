<?php 
include("database.php");
$log = new logmein();     //Instentiate the class
$log->dbconnect();        //Connect to the database

if($log->logincheck($_SESSION['loggedin']) == false) {
	$log->loginform();
	die();
}

echo "Hello ".$_SESSION['useremail'];
echo "<br />";
echo "<a href='http://localhost/HAXKR/upload.html'>Upload Image</a>";
echo "<br />";
echo "<a href='http://localhost/HAXKR/logout.php'>Logout</a>";
echo "<br />";

?>