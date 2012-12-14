<?php
include("database.php");
$log = new logmein();
$log->logout();
header( 'Location: '.$log->path().'/index.php' );
?>