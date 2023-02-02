<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "ah-bib";

$link = mysql_connect($host,$user,$pass) or die("could not connect to mySql");

mysql_select_db($db,$link) or die("could not connect to database ");


	$result1 = mysql_query("SELECT confirmation FROM reservation where email='mohdsunusi4@gmail.com'");
while($row = mysql_fetch_array($result1))
  {

  $rate=$row['confirmation'];


  }




echo '<script type="text/javascript">
function validateForm()
{

var a=document.forms["confirmationCode"]["code"].value;

  alert("Your confirmation Code is: " + a);



}
</script>';


echo'<form name="confirmationCode" action="#" method="POST" onsubmit="validateForm()">
<input type="hidden" name="code" value="'.$rate.'">

<input type="submit" value="Submit">
</form>';

?>