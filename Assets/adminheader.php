<?php

// This page is a header template that works for
// avoiding repeating the same processes over all
// admin pages.


include_once('../Private/functions.php');


if(!isset($_SESSION['adminId'])){

    redirect_to('../Admin/admin.php');
}
$msg = '';
if(isset($_SESSION['adminId'])){
  $adminId = $_SESSION['adminId'];
  $result = get_admin_by_id($adminId);

  $msg = "<div id='logreg'>";
  $msg .= "<h5> You're logged in as " ."<span class='name'> $result</span>" . "</h5></br>";
  $msg .= "<form action='../Private/logout.php' method='post'> </br>";
  $msg .= "<input type='submit' style='background-color:rgb(53, 86, 148); color:white;position:absolute;top:45px;right:130px;' name='logout' value='Logout'>";
  $msg .= "</form>";
  $msg .= "</div>";

}

?>
<!DOCTYPE HTML>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
<link href="../Assets/style.css" rel="stylesheet">
<title></title>

</head>
<body>


<?php echo $msg; ?>
<div id="nav">
<ul>
<li><a href="../Admin/addevent.php">Add event</a></li>
<li><a href="../Admin/checkin.php">Validate ticket</a></li>
<li><a href="../Admin/ticketinfo.php">Ticket info</a></li>
<li><a href="../Admin/viewevent.php">Event info</a></li>


</ul>
</div>
