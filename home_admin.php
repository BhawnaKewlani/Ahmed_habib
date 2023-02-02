<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>AH-BIB Online Conference Hall Reservation System</title>
<link href="css/ble.css" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>

  <!--sa validate from-->
<script type="text/javascript">
function validateForm()
{

var y=document.forms["login"]["user"].value;
var a=document.forms["login"]["password"].value;
if ((y==null || y==""))
  {
  alert("you must enter your username");
  return false;
  }
  if ((a==null || a==""))
  {
  alert("you must enter your password");
  return false;
  }


}
</script>
<link rel="stylesheet" href="./febe/style.css" type="text/css" media="screen" charset="utf-8">

    <script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/application.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
<?php
if ($_SESSION['SESS_FIRST_NAME']=="admin"){
	echo '<ul class="menu">';
  echo '<li class="a"><a href="viewcommne.php"><img src="images/viewcomment.png" alt="view" /></a></li>';
  echo '<li class="monitor"><a href="home_admin.php"><img src="images/monitor.png" alt="monitor" /></a></li>';
  echo '<li class="c"><a href="reports.php"><img src="images/report.png" alt="report" /></a></li>';
  echo '<li class="d"><a href="roominventory.php"><img src="images/inventory.png" alt="inventory" /></a></li>';
  echo '<li class="e"><a href="room.php"><img src="images/maintenance.png" alt="maintenance" /></a></li>';
  echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
 echo '</ul>';
 }
 ?>
<?php
if ($_SESSION['SESS_FIRST_NAME']=="frontdesk"){
echo '<ul class="menu">';
  echo '<li class="a"><a href="viewcommne.php"><img src="images/viewcomment.png" alt="view" /></a></li>';
  echo '<li class="monitor"><a href="home_admin.php"><img src="images/monitor.png" alt="monitor" /></a></li>';
  echo '<li class="c"><a href="reports.php"><img src="images/report.png" alt="report" /></a></li>';
  echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
  echo '</ul>';

 }
 ?>
<div style="width:600px; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%;">
  <br /><label style="margin-left:12px;">Filter</label> <input type="text" name="filter" value="" id="filter" /><br />

  <table cellpadding="1" cellspacing="1" id="resultTable">
          <thead>
            <tr bgcolor="#33FF00" style="margin-bottom:10px;" >
              <th>Name</th>
              <th>Arrival</th>
              <th>Departure</th>
			  <th>Hall Type</th>
              <th>Payment Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
         <?php
			   $con = mysql_connect("localhost","root","");
								if (!$con)
								  {
								  die('Could not connect: ' . mysql_error());
								  }

								mysql_select_db("ah-bib", $con);

								$result2 = mysql_query("SELECT * FROM payment_notification where status = 'Completed'");


								while($row = mysql_fetch_array($result2))
								  {
								  $itemno=$row['item_number'];


								$resultw = mysql_query("SELECT * FROM reservation where confirmation = '$itemno'");


								while($rows = mysql_fetch_array($resultw))
								  {

								 echo '<tr>';
    								echo '<td class="contacts">'.$rows['firstname'].' ' .$row['lastname'].'</td>';
    								echo '<td class="contacts">'.$rows['arrival'].'</td>';
									echo '<td class="contacts">'.$rows['departure'].'</td>';
									echo '<td class="contacts">';
																	$r=$rows['room_id'];
																	$result1 = mysql_query("SELECT * FROM room WHERE room_id = '$r'");
																	while($row1 = mysql_fetch_array($result1))
																	{
																	echo $row1['type'];
																	}
									echo '</td>';
									echo '<td class="contacts">';
									echo $row['status'];
									echo '</td>';
									echo '<td class="contacts">'.'<a href=out.php?id=' . $rows["confirmation"] . '>' . 'Check Out' . '</a>'.'</td>';
  								echo '</tr>';
									}
								 }

			  ?>
          </tbody>
  </table>


</div>
</body>
</html>
