<?php
include("API.php");
$api = new API();     //Instentiate the class
$api->dbconnect();        //Connect to the database

if($_REQUEST['action'] == "login") {
	$api->login($_REQUEST['username'], $_REQUEST['password']);
}
header( 'Location: '.$api->path().'/index.php' );
?>