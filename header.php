<?php

// This page is a header template for client side
// pages which is included on every user page in
// the project.


include_once('../Private/functions.php');
$msg = '';
$fileName = basename($_SERVER['PHP_SELF']);
$signup = '../Public/signup.php';
$loginform = '../Public/loginform.php';

// Checking if the user is logged in by checking if the user id
// was stored, and for sure it means that the user is logged in and
// still in the session, in that case the user gets a friendly message
// as [You're logged in as whaterver the user name is], and that message
// will be printed all over the pages on the client side.



if(isset($_SESSION['userId'])){
  $userId = $_SESSION['userId'];
  $result = get_user_by_id($userId);
  $msg = "<div id='logreg'>";
  $msg .= "<h5> You're logged in as " . "<span class='name'> $result </span>" . "</h5></br>";
  $msg .= "<form action='../Private/logout.php' method='post'> </br>";
  $msg .= "<input type='submit' style='background-color:rgb(53, 86, 148); color:white;position:absolute;top:45px;right:103px;' name='logout' value='Logout'>";
  $msg .= "</form>";
  $msg .= "</div>";
  // Checking the file path, if the path was neither
  // signup page nor user login page, then the user
  // gets these two links bellow [Signup , Loging].

}elseif($fileName !== strtolower($signup) && $fileName !== strtolower($loginform)){
  $msg  = "<div id='logreg'>";
  $msg .= "<h5><a href='signup.php'>Register</a></h5>&nbsp&nbsp";
  $msg .= "<h5><a href='loginform.php'>Login</a></h5>";
  $msg .= "</div>";


}else{
  redirect_to('../Public/err.php');

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


<header>
  <div class="main">
    <div class="logo">
      <img src="../pic/eventlogo2.png" alt="logo" width="150" height="80" />
    </div><br>
    <ul>
      <li><a href="../Public/HomePage.php">Home</a></li>
      <li><a href="../Public/vieweventforguest.php">Events</a></li>
      <li><a href="../Public/Contact.php">Contact us</a></li>
      <li><a href="../Public/aboutus.php">About us</a></li>
<?php

// Checking if the user is logged in, if yes, then the user gets
// another link appended to his page, in that case it'll be My Tickets
// page, which will hold information about each user's ticket/s history.


if(isset($_SESSION['userId'])){
  echo "<li> <a href='data.php'>Book Ticket</a></li>";
  echo "<li> <a href='Mypages.php'>My Tickets</a></li>";
}?>
</ul>
</div>
</header>
<div class="content">
