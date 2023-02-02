<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AH-BIB Online Conference Hall Reservation System</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<!--sa error trapping-->
<script type="text/javascript">
function validateForm()
{

var y=document.forms["room"]["no_rooms"].value;

if ((y==null || y==""))
  {
  alert("all field are required!");
  return false;
  }

}
</script>
<!--sa minus date-->
<script type="text/javascript">
	// Error checking kept to a minimum for brevity

	function setDifference(frm) {
	var dtElem1 = frm.elements['start'];
	var dtElem2 = frm.elements['end'];
	var resultElem = frm.elements['result'];

// Return if no such element exists
	if(!dtElem1 || !dtElem2 || !resultElem) {
return;
	}

	//assuming that the delimiter for dt time picker is a '/'.
	var x = dtElem1.value;
	var y = dtElem2.value;
	var arr1 = x.split('/');
	var arr2 = y.split('/');

// If any problem with input exists, return with an error msg
if(!arr1 || !arr2 || arr1.length != 3 || arr2.length != 3) {
resultElem.value = "Invalid Input";
return;
	}

var dt1 = new Date();
dt1.setFullYear(arr1[2], arr1[1], arr1[0]);
var dt2 = new Date();
dt2.setFullYear(arr2[2], arr2[1], arr2[0]);

resultElem.value = (dt2.getTime() - dt1.getTime()) / (60 * 60 * 24 * 1000);
}
</script>



<!--sa input that accept number only-->
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>

<!--end sa nivo slider--><?php

	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];

?>

<style type="text/css">
<!--
.style2 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</head>

<body>

<!-- TOP -->
<div id="top1"><a href="index.php"><img src="images/logo.jpg" border="0" style="margin-top:27px; margin-left:20px;" /></a></div>
<div id="top">

<ul class="menu">
<li class="home"><a href="index.php">Home</a></li>
<li class="about"><a href="about.php">About</a></li>
<li class="contacts"><a href="contact.php">Contacts</a></li>
<li class="renting"><a href="gallery.php">GALLERY</a></li>
<li class="selling"><a href="rates.php">RATES</a></li>


</ul>


</div>




<!-- HEADER -->
<!-- CONTENT -->
<div id="content">

<div id="leftPan">

<div id="services">
<h2>RESERVATION DETAILS </h2>
<p>
  <ul>
      Check In Date :<?php echo $arival; ?><br />
      Check Out Date :<?php echo $departure; ?>  <br />
	  Sit(s) : <?php echo $adults; ?><br />
	  selected :<?php echo $child; ?><br />

 </ul>
    </p>
</p>
</div>

<div id="services">
<iframe src="https://www.facebook.com/plugins/like.php?href=tameraplazainn.x10.mx"
        scrolling="no" frameborder="0"
        style="border:none; width:180px; height:250px"></iframe>
</div>



</div>
<div id="featured"><br />
 <div>
 <form action="personnalinfo.php" method="post" onsubmit="return validateForm()" name="room">
  <input name="start" type="hidden" value="<?php echo $arival; ?>" />
  <input name="end" type="hidden" value="<?php echo $departure; ?>" />
  <input name="adult" type="hidden" value="<?php echo $adults; ?>" />
  <input name="child" type="hidden" value="<?php echo $child; ?>" />
  <span class="style2">NUMBER OF HALL/HALLS:</span>
  <INPUT id="txtChar" onkeypress="return isNumberKey(event)" type="text" name="no_rooms" class="ed">
 </div><br />
 <?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("ah-bib", $con);
function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}


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


$result = mysql_query("SELECT * FROM room");

while($row = mysql_fetch_array($result))
  {
  $a=$row['room_id'];
  $query = mysql_query("SELECT sum(qty_reserve) FROM roominventory where arrival <= '$arival' and departure >= '$departure' and room_id='$a'");
while($rows = mysql_fetch_array($query))
  {
  $inogbuwin=$rows['sum(qty_reserve)'];
  }
  $angavil = $row['qty'] - $inogbuwin;


echo '<table width="490" border="0">';
  echo '<tr>';
    echo '<td colspan="2">&nbsp;<span class="style2">'.$row['type'].'</span></td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td width="150" rowspan="5">'. '<img width=150 height=105 alt="Unable to View" src="' . $row["image"] . '"/>'.'</td>';
    echo '<td width="340">';
	$rt=$row['rate'];
	echo 'Naira ';
	echo formatMoney($rt, true);
	echo '</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.'Hall Description: '.$row['description'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.'Maximum sit Capacity: '.$row['max_child'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.'Maximum sits Capacity: '.$row['max_adult'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>';


	if ($angavil > 0){

	echo '<input name="roomid" type="image" value="' .$row["room_id"]. '" src="images/reseve.jpg" alt="Reserve" align="middle" width="60" height="30" onclick="setDifference(this.form);" />';
					}
  if ($angavil <= 0){
	echo '<span class="style5">'.'Not Available'.'</span>'.'<br>';
	echo '<span class="style5">'.'Available in '.$noroom.' Days</span>';
				    }


	echo '</td>';
  echo '</tr>';
echo '</table>';






}

mysql_close($con);
?>





  <input type="hidden" name="result" id="result" />
</form>
</div>
<div class="clear"></div>

</div>

<!-- FOOTER -->

<div id="footer">

<img src="images/call.jpg" alt="" width="156" height="37" />

<p><a href="index.php">HOME</a> |<a href="about.php"> ABOUT US </a>|<a href="contact.php"> CONTACTS </a>|<a href="gallery.php"> GALLERY </a>|<a href="rates.php"> ROOM RATES </a></p>
</div>

<!-- BOTTOM -->

<div id="bottom">

<p>Copyright &copy; Tamera Plaza Inn. Designed by <a href="#" target="_blank">begie</a></p>
</div>
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</body>
</html>
