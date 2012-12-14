<?php
include("database.php");
$log = new logmein();     //Instentiate the class
$log->dbconnect();        //Connect to the database
if($log->logincheck($_SESSION['loggedin']) == false) header( 'Location: http://localhost/HAXKR/index.php' );

/*
function GetUsers() {
	$result = $log->qry("SELECT * FROM users");

	echo "Users:<br />";
	while($row = mysql_fetch_array($result))
	{
		echo $row['email'] . " " . $row['last_login'];
		echo "<br />";
	}
}*/



echo "k";
	$result = $log->qry("SELECT * FROM users");

echo "Users:<br />";
while($row = mysql_fetch_array($result))
{
	echo $row['email'] . " " . $row['last_login'];
	echo "<br />";
}

?>