<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("ah-bib", $con);


$result3 = mysql_query("SELECT reservation_id FROM reservation");

while($row = mysql_fetch_array($result3))
  {
  $reservationid=$row['reservation_id'];
  }
$result4 = mysql_query("SELECT no_room FROM reservation WHERE reservation_id='".$reservationid."'");

while($row = mysql_fetch_array($result4))
  {
  $noroom=$row['no_room'];
  }


echo $reservationid.'<br>';
echo $noroom;
?>