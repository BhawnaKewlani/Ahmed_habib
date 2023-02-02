<?php

	$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("ah-bib", $con);

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];


	$sql=mysql_query("INSERT INTO comment (name, email, content) VALUES ('$name','$email','$message')");
  header("location: contact.php");
mysql_close($con)


?>

