<?php
if(isset($_SESSION['userId'])){

  header('Location:index.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login and Registration Form</title>
<meta charset="UTF8">
<link rel="stylesheet" href="../Public/style.css">
<link rel="stylesheet" href="../Public/font-awesome/css/font-awesome.css">

</head>
<body>
<div id="userlogin" class="hero">
  <div class="form-box">
    <div class="button-box">
      <div id="btn"></div>
      <button type="button" class="toggle-btn" onclick="login()">Log In</button>
      <button type="button" class="toggle-btn" onclick="register()">Register</button>

    </div>

    <div class="social-icons">
        <img src="fb.png">
        <img src="tw.png">
        <img src="gp.png">
    </div>

  <form action="../Private/login.php" method="post" id="login" class="input-group">
    <div class="input-field">
        <i class="fa fa-user"></i>
        <input type="email" placeholder="e.g. mail@mail.com" name="email" required >
      </div>

      <div class="input-field">
        <i class="fa fa-lock"></i>
        <input type="password" placeholder="Enter your Password" name="password" id="passLogin" value="<?php
        echo (isset($_COOKIE['password']))? $_COOKIE:''; ?>" required>
        <span class="eye" onclick="myFunction()">
          <i id="hide1" class="fa fa-eye"></i>
          <i id="hide2" class="fa fa-eye-slash"></i>
        </span>
      </div>

          <input type="checkbox" class="check-box1" name="remember"
          <?php if(isset($_COOKIE['user'])) {
            echo 'checked="checked"';
          }
          else {
            echo '';
          }
          ?>>

      <span class="rmbr">Remember Password</span>




      <button type="submit" name="login" value="Login" class="submit-btn">Log In</button>
        <br>
          <p>No account? <a href="signup.php">Create one!</a></p>
        </br>





      </form>

      <form id="register" class="input-group" action="../Private/register.php" method="post">
            <div class="input-field">
              <input type="text" placeholder="User ID" name = "firstName" required>
            </div>

            <div class="input-field">
              <input type="text" placeholder="Name"  name = "lastName" required>
            </div>

            <div class="input-field">
              <input type="text" placeholder="Gender" name = "country" required>
            </div>

            <div class="input-field">
              <input type="phone" placeholder="Phone no" name = "city" required>
            </div>

            <div class="input-field">
              <input type="email" placeholder="Email" name = "email" required>
            </div>

            <div class="input-field">
              <input type="password" placeholder="Enter Password" name = "password" required>

            </div>

            <input type="checkbox" class="check-box2"><span class="rmbr2">I Agree the Term and Conditions Agreement </span>
            <button id="signup" type="submit" class="submit-reg" name="submit" value="Submit">Register</button>
      </form>


  </div>
</div>

        <script>
          var x = document.getElementById("login");
          var y = document.getElementById("register");
          var z = document.getElementById("btn");

        function register(){
          x.style.left = "-400px";
          y.style.left = "50px";
          z.style.left = "110px";
        }
        function login(){
          x.style.left = "50px";
          y.style.left = "450px";
          z.style.left = "0";
        }

        function myFunction(){
            var a = document.getElementById("passLogin");
            var b = document.getElementById("hide1");
            var c = document.getElementById("hide2");

            if(a.type === 'password'){
              a.type = "text";
              b.style.display = "block";
              c.style.display = "none";
            }
            else {
              a.type = "password";
              b.style.display = "none";
              c.style.display = "block";
            }
          }

      </script>

  </body>
  </html>
