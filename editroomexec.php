<?php
session_start();

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("ah-bib", $con);
$roomid = $_POST['roomid'];
$roomtype=$_POST['roomtype'];
$roomrate=$_POST['roomrate'];
$description=$_POST['description'];
$qty=$_POST['qty'];

mysql_query("UPDATE room SET type='$roomtype', rate='$roomrate', description='$description', qty='$qty' WHERE room_id='$roomid'");
header("location: room.php");
mysql_close($con);
?>