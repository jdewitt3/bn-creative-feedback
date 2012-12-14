<?php
include("database.php");
$log = new logmein();     //Instentiate the class
$log->dbconnect();        //Connect to the database

if($_REQUEST['action'] == "login") {
	$log->login($_REQUEST['username'], $_REQUEST['password']);
}
header( 'Location: http://localhost/HAXKR/index.php' );
?>