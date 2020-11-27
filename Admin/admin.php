<?php
include_once('../Private/functions.php');

?>
<!DOCTYPE html>
<head>
  <title>Admin Login page</title>
  <link href="../Assets/style.css" rel="stylesheet">
</head>
<body>

<div id="adminlogin">
<form action="../Private/login.php" method="post">
<label for="email">Email:&nbsp &nbsp  &nbsp   &nbsp
<input type="text" name="email" placeholder="e.g. mail@mail.com"></label> </br></br>
<label for="password">Password:&nbsp
<input type="password"  name="password" placeholder="Enter your password!" value="<?php
echo $_COOKIE['password']; ?>"></label> </br></br></br>
<div class="lower">
<div class="inline-field"><label for="checkbox"> <input type="checkbox" name="remember"
<?php if(isset($_COOKIE['user'])) {
      echo 'checked="checked"';
  }
  else {
      echo '';
  }
  ?>>Keep me logged in</label>
<input type="submit" name="login" value="Login">
</div>


<?php include_once('../Assets/footer.php'); ?>
