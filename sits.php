<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "ah-bib";

mysql_connect($host,$user,$pass) or die("could not connect to mySql");

$link = mysql_select_db($db) or die("could not connect to database ");

$result = mysql_query("SELECT name FROM sits");


while($row2 = mysql_fetch_array($result))
  {

echo "<option>".$row2['name']."</option>";
echo "<br />";

  }



?>