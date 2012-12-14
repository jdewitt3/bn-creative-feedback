<?php
$log = new logmein();     //Instentiate the class
$log->dbconnect();        //Connect to the database
if($log->logincheck($_SESSION['loggedin']) == false) header( 'Location: http://localhost/HAXKR/index.php' );

$con = mysql_connect("localhost","designie","bnhack");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("creativefeedback", $con);

$result = mysql_query("SELECT * FROM comments");

while($row = mysql_fetch_array($result))
  {
  echo $row['FirstName'] . " " . $row['LastName'];
  echo "<br />";
  }

mysql_close($con);
?>