<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "ah-bib";

$link = mysql_connect($host,$user,$pass) or die("could not connect to mySql");

mysql_select_db($db,$link) or die("could not connect to database ");


	$scode = $_POST['scode'];
	$sitno = $_POST['sitno'];
	$halls = $_POST['halls'];

$query = "update sits set `sitno`='".$sitno."', `hall`='".$halls."', `code`='".$scode."', `payment`='complete' where `name`='".$sitno."'";

if (!mysql_query($query,$link))
  {
  die('<h1>Sorry, the sit has already taken</h1> plase change another: ');
  }
else
{
 echo "<h1>Sit successfully booked</h1> The detail are bellow:<br /><br /> Hall Name: ".$halls."<br> Sit No: ".$sitno."<br> Code: ".$scode." <br /><br />We're welcoming you!";
}
?>