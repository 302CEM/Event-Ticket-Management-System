<?php
require_once('../Private/functions.php');
require_once('../Classes/dbClass.php');
require_once('../Assets/adminheader.php');

?>
<?php

/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//index.php
$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';
$admingmail='';
$admingmailpass='';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["admingmail"]))
 {
  $error .= '<p><label class="text-danger">Admin please enter your gmail account</label></p>';
 }
 else
 {
  $admingmail = clean_text($_POST["admingmail"]);
  if(!filter_var($admingmail, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
    
 if(empty($_POST["admingmailpass"]))
 {
  $error .= '<p><label class="text-danger">Password is required</label></p>';
 }
 else
 {
  $admingmailpass = clean_text($_POST["admingmailpass"]);
 }
    
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
    
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
    
 if(empty($_POST["subject"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["subject"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }
 if($error == '')
 {
  
  require 'C:/xampp/htdocs/Agile/vendor/autoload.php';
  $mail = new PHPMailer();
  $mail->isSMTP();        //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts
  $mail->Port = '587';        //Sets the default SMTP server port
  $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = ($_POST["admingmail"]);     //Sets SMTP username
  $mail->Password = ($_POST["admingmailpass"]);     //Sets SMTP password
  $mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = "weiyinlee1202@gmail.com";     //Sets the From email address for the message
  $mail->FromName = "From";    //Sets the From name of the message
  $mail->AddAddress($_POST["email"], $_POST["name"]);//Adds a "To" address
  $mail->AddCC($_POST["email"], $_POST["name"]); //Adds a "Cc" address
  $mail->WordWrap = 200;       //Sets word wrapping on the body of the message to a given number of characters
  $mail->isHTML(true);       //Sets message type to HTML    
  $mail->Subject = $_POST["subject"];    //Sets the Subject of the message
  $mail->Body = $_POST["message"];    //An HTML or plain text message body
  if($mail->Send())        //Send an Email. Return true on success or false on error
  {
   $error = '<label class="text-success">Email sent!</label>';
  }
  else
  {
   $error = '<label class="text-danger">There is an Error</label>';
  }
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
  $admingmail='';
  $admingmailpass='';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Send an Email to Notify Customer</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <div class="row">
    <div class="col-md-8" style="margin:0 auto; float:none;">
     <h3 align="center">Send an Email to Notify Customer</h3>
     <br />
     <?php echo $error; ?>
     <form method="post">
      <div class="form-group">
        <label>Enter Admin Gmail</label>
        <input type="text" name="admingmail" class="form-control" placeholder="Enter Admin Gmail" value="<?php echo $admingmail; ?>" />
        </div>
        <div class="form-group">
        <label>Enter Admin Gmail Password</label>
        <input type="password" name="admingmailpass" class="form-control" placeholder="Enter Password" value="<?php echo $admingmailpass; ?>" />
        </div>
        <div class="form-group">
        <label>Enter Name</label>
        <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
        </div> 
        <div class="form-group">
        <label>Enter Email</label>
        <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
        </div>
        <div class="form-group">
        <label>Enter Subject</label>
        <input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="<?php echo $subject; ?>" />
        </div>
        <div class="form-group">
        <label>Enter Message</label>
        <textarea name="message" class="form-control" placeholder="Enter Message"><?php echo $message; ?></textarea>
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="submit" value="Submit" class="btn btn-info" />
      </div>
     </form>
    </div>
   </div>
  </div>
 </body>
</html>

<?php include_once('../Assets/footer.php'); ?>