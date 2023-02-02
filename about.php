<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AH-BIB Online Conference Hall Reservation System</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />


<!--sa nivo slider-->
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<!--sa calendar-->
	<script type="text/javascript" src="js/datepicker.js"></script>
        <link href="css/demo.css"       rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
//<![CDATA[

/*
        A "Reservation Date" example using two datePickers
        --------------------------------------------------

        * Functionality

        1. When the page loads:
                - We clear the value of the two inputs (to clear any values cached by the browser)
                - We set an "onchange" event handler on the startDate input to call the setReservationDates function
        2. When a start date is selected
                - We set the low range of the endDate datePicker to be the start date the user has just selected
                - If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

        * Caveats (aren't there always)

        - This demo has been written for dates that have NOT been split across three inputs

*/

function makeTwoChars(inp) {
        return String(inp).length < 2 ? "0" + inp : inp;
}

function initialiseInputs() {
        // Clear any old values from the inputs (that might be cached by the browser after a page reload)
        document.getElementById("sd").value = "";
        document.getElementById("ed").value = "";

        // Add the onchange event handler to the start date input
        datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
}

var initAttempts = 0;

function setReservationDates(e) {
        // Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
        // until they become available (a maximum of ten times in case something has gone horribly wrong)

        try {
                var sd = datePickerController.getDatePicker("sd");
                var ed = datePickerController.getDatePicker("ed");
        } catch (err) {
                if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
                return;
        }

        // Check the value of the input is a date of the correct format
        var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

        // If the input's value cannot be parsed as a valid date then return
        if(dt == 0) return;

        // At this stage we have a valid YYYYMMDD date

        // Grab the value set within the endDate input and parse it using the dateFormat method
        // N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
        var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

        // Set the low range of the second datePicker to be the date parsed from the first
        ed.setRangeLow( dt );

        // If theres a value already present within the end date input and it's smaller than the start date
        // then clear the end date value
        if(edv < dt) {
                document.getElementById("ed").value = "";
        }
}

function removeInputEvents() {
        // Remove the onchange event handler set within the function initialiseInputs
        datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
}

datePickerController.addEvent(window, 'load', initialiseInputs);
datePickerController.addEvent(window, 'unload', removeInputEvents);

//]]>
</script>

<!--sa error trapping-->
<script type="text/javascript">
function validateForm()
{
var x=document.forms["index"]["start"].value;
if (x==null || x=="")
  {
  alert("you must enter your check in Date(click the calendar icon)");
  return false;
  }
var y=document.forms["index"]["end"].value;
if (y==null || y=="")
  {
  alert("you must enter your check out Date(click the calendar icon)");
  return false;
  }
}
</script>
<!--end sa nivo slider-->
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {
	font-size: 1.4em;
	font-weight: bold;
	color: #FFFFFF;
}
-->
</style>
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
</head>

<body>

<!-- TOP -->
<div id="top1"><a href="index.php"><img src="images/logo.PNG" border="0" style="margin-top:5px; margin-left:20px;" /></a></div>
<div id="top">

<ul class="menu">
<li class="home"><a href="index.php">Home</a></li>
<li class="about1"><a href="about.php">About</a></li>
<li class="contacts"><a href="contact.php">Contacts</a></li>
<li class="renting"><a href="gallery.php">GALLERY</a></li>
<li class="selling"><a href="rates.php">RATES</a></li>


</ul>


</div>




<!-- HEADER -->

<div id="header">

<div id="formPan">
<h2 class="style2">HALL BOOKING AREA </h2>

<form method="post" action="testing.php" name="index" onsubmit="return validateForm()">
<div style="margin-top:20px; margin-left:10px;">
 <table width="186" border="0">
  <tr>
    <td width="69"><div align="right">
      <label>Start Date : </label>
    </div></td>
    <td width="101"><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="start" id="sd" value="" maxlength="10" readonly="readonly" /></td>
  </tr>
  <tr>
    <td><div align="right">
      <label>End Date : </label>
    </div></td>
    <td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="end" id="ed" value="" maxlength="10" readonly="readonly" /></td>
  </tr>
  <tr>
    <td><div align="right">
      <label>Sit(s) : </label>
    </div></td>
    <td><select name="adult" class="ed" >
      <option>10</option>
      <option>20</option>
      <option>40</option>
      <option>50</option>
      <option>60</option>
      <option>70</option>
      <option>80</option>
      <option>90</option>
      <option>100</option>
      <option>150</option>
      <option>200</option>
      </select></td>
  </tr>
  <tr>
    <td><div align="right">
      <div align="right">
        <label>Select : </label>
      </div>
    </div></td>
    <td><select name="child" class="ed">
      <option>Air condition</option>
      <option>Fans</option>
      <option>Speaker </option>
      <option>Internet </option>
      <option>All</option>
    </select></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input name="Input" type="submit" value="Check Availability" id="button" /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right"><a rel="facebox" href="modifyindex.php">Modify</a> / <a href="cancelindex.php">Cancel</a> Reservation </div></td>
    </tr>
    <center><a href="confirm.php"> Confirm Your Offline Payment</a></center>
</table>
 </div>
</form>
</div>

<div id="mainimgPan">
  <div id="mainimg">
<div id="slider" class="nivoSlider" style="float:right;">
                <img src="images/toystory.jpg" alt="" />
                <img src="images/up.jpg" alt="" />
                <img src="images/walle.jpg" alt="" />
                <img src="images/nemo.jpg" alt=""/>
                <img src="images/slide1.jpg" alt=""/>
				<img src="images/slide2.jpg" alt=""/>
				<img src="images/slide3.jpg" alt=""/>
                <img src="images/slide4.jpg" alt=""/>
      </div>
</div>


</div>
</div>

<!-- CONTENT -->

<div id="content">

<div id="leftPan">

<div id="services">
<h2><strong>SET BOOKING AREA</strong></h2>

<p>
<form method="post" action="sitbooking.php" name="index" >
<div style="margin-top:20px; margin-left:10px;">
 <table width="186" border="0">

  <tr>
    <td><div align="right">
      <label>Your Code : </label>
    </div></td>
    <td><input type="text"  name="scode" ></td>
  </tr>
  <tr><td><div align='right'>
          <label>Sit : </label>
      </div></td><td><select name='sitno' >
  			<?php require("sits.php");?>
  		</select></td></tr>
<tr>
    <td><div align="right">
      <label>Hall : </label>
    </div></td>
    <td><select name="halls" class="ed" >
      <option>Standard Single</option>
      <option>Standard Double</option>
      <option>Superior Hall</option>
       </select></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input name="Input" type="submit" value="Check Availability" id="button" /></td>
  </tr>
  </table>
 </div>
</form>


</p>
</div>


<div id="services">
<iframe src="https://www.facebook.com/plugins/like.php?href=tameraplazainn.x10.mx"
        scrolling="no" frameborder="0"
        style="border:none; width:180px; height:250px"></iframe>
</div>

</div>
<div id="rightPan">

<div id="welcome">
<div><img src="images/HISTORY.jpg" /></div>
<br />
<div align="justify"><img src="photos/About02.jpg" width="306" height="192" style="float:right; padding-left: 5px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;On this small plot of land  in the middle of a bustling city called Bacolod,  in the Negros Occidental province of the Philippines, lies home to the  family of Jose and Teodula Tamera. Located on 79 Lacson Street, this place was  especially home to one of their sons, Robin Tamera.<br /><br />
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;After years of decadence in this little spot called home, Robin found himself  working in Ontario, Canada. It was there that the  inspiration to keep the property's memories alive was sparked. He had a desire  to keep this lot not only as a memorial keepsake for himself, siblings, and  relatives, but first and foremost as a reminder of his parents' love and care.<br /> <br />
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="photos/flame.png" width="212" height="250" style="float:left; padding-right: 5px;" />Thus, after years of investment and construction, Robin's desire became a reality as The Tamera Plaza Inn became not only a place to stay, but a memorial and tribute to the Tamera Family. Robin Tamera's concept was to open a very humble place for all to stay in Bacolod City, whether they were local or foreign visitors. He wanted a hotel that incorporated and adapted all of the finest amenities that other places in the world could offer.<BR /><BR />

                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tamera Plaza Inn prides itself on cleanliness and superb customer service. It's policy is to consistently provide quality service that meets or exceeds their customer's expectations. The staff of Tamera Plaza Inn strives to achieve excellence in the industry, and to continually improve the effectiveness of its' management system.<br />

      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Therefore, to our guests, enjoy your stay, and if you need something that we missed, please let us know, and we will do our best to provide it to you.<br><br><center>Welcome! Enjoy not only our quality service but also enjoy the hospitality of Bacolod City.</center><br><center>MABUHAY!</div>










</div>
<div id="fcontainer"></div>
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
