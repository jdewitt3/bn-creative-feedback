<?php
include("database.php");
$log = new logmein();
$log->logout();
header( 'Location: http://localhost/HAXKR/index.php' );
?>