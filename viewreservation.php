<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>AH-BIB Online Conference Hall Reservation System</title>
<style type="text/css">
.style2 {
	font-size: 24px;
	font-weight: bold;
}
</style>
</head>

<body>
<div align="center"><span class="style2">AH-BIB Online Conference Hall Reservation System</span><br />
  Developed By: Ahmed Habib<br />
  Powered By: Hafed Poly<br />
  P.M.B: 5004, Kazaure<br />
  Mobile: +2348135067070<br />
Email: sunusi.mohd95@yahoo.com</div>
<p>&nbsp;</p>

  <div class="paperl">
  <?php
if (isset($_GET['id'])){
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





$member_id = $_GET['id'];
			$result = mysql_query("SELECT * FROM reservation WHERE confirmation = '$member_id'");

while($row = mysql_fetch_array($result))
  {
  echo '<br />';
  echo '<b>'.'Booker Personnal Information'.'</b>';
  echo '<br />';
  echo "FirstName: ".$row['firstname']. "<br />";
  echo "LastName: ".$row['lastname']. "<br />";
  echo "Address: ".$row['province']. "<br />";
  echo "City: ".$row['city']. "<br />";
  echo "Zip: ".$row['zip']. "<br />";
  echo "Country: ".$row['country']. "<br />";
  echo "Email: ".$row['email']. "<br />";
  echo "Telephone/Cellphone Number: ".$row['contact']. "<br />";
  echo '<br />';


 echo '<br>';
  echo '<b>'.'Reservation Details'.'</b>'.'<br />';
  echo "Arrival Date: ".$row['arrival']. "<br />";
  echo "Departure Date: ".$row['departure']. "<br />";
  echo "Confirmation Code: ".$row['confirmation']. "<br />";
  echo "Number of night stay: ".$row['result'];
  echo '<br />';
  echo '<br />';
  echo '<b>'.'Rate Information'.'</b>'.'<br />';
  $q=$row['room_id'];
  $result1 = mysql_query("SELECT * FROM room WHERE room_id = '$q'");

while($row1 = mysql_fetch_array($result1))
  {
  echo "Hall Type: ".$row1['type']. "<br />";
  echo "Hallm Rate: Naira";
$sd=$row1['rate'];

	echo formatMoney($sd, true);
echo  "<br />";
  }

  echo 'Total Payable amount: Naira';
  $dfg=$row['payable'];
echo formatMoney($dfg, true);
echo '<br /><br />';
echo '<b>'.'Payment Information'.'</b>'.'<br />';
$item=$row['confirmation'];
$result3 = mysql_query("SELECT * FROM payment_notification WHERE item_number = '$item'");

while($row3 = mysql_fetch_array($result3))
  {
echo "Payer Email: ".$row3['payer_email']. "<br />";
  echo "Transaction ID.: ".$row3['txn_id']. "<br />";
echo "Currency: ".$row3['currency']. "<br />";
  echo "Amount: Naira";
$fg=$row3['amount'];
echo formatMoney($fg, true);
echo "<br />";
  echo "Status: ".$row3['status']. "<br />";

  }







  }

mysql_close($con);
}
?>



</div>

<p>&nbsp; </p>
</body>
</html>
