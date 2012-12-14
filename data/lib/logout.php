<?php
include("API.php");
$api = new API();
$api->logout();
header( 'Location: '.$api->path().'/index.php' );
?>