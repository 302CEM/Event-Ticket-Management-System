<?php
include_once('../Private/functions.php');
include_once('../Assets/adminheader.php');

// the page that will take care of ticket validation.
?>
<!doctype html>
<html>
<head>
<title> Check in </title>
<link href="../style.css" rel="stylesheet">
</head>
<body>
<div id="ticketchecker">
<h4> Enter a pincode for validation </h4>
<form action="../private/ticketCheck.php" method="get">
<input style="width:300px;height:25px;margin-top: 20px;margin-bottom: 20px;" type="text" name="pin">
<input style='background-color:rgb(53, 86, 148); color:white;width:70px;height:30px;margin-left:125px;'   type ="submit" name="submit" value="Check In">
</form>
</div>

<?php include_once('../Assets/footer.php'); ?>
