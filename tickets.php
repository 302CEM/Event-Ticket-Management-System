<!DOCTYPE html>
<html>
<head>
  <title>Make Payment</title>
</head>
<body>
<pre>
<?php
// This script handels making tickets and stores ticket
// information on database.
error_reporting(E_ERROR | E_PARSE);
include('../Classes/dbClass.php');
include('../Classes/ticketClass.php');
include('functions.php');

if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
    echo "<p>User ID: $userId</p>";
}
else {
  echo 'no user found!';
}
    foreach($_POST['option'] as $key  => $value){
        echo "<p>Ticket ID: $key -> $value </p>";
      }
    $db = new DB;
    $ticket = new Ticket;

    $eventId = 1;
    function generatePIN($digits = 4){
        $i = 0;
        $pin = "";
        while($i < $digits){

            $pin .= mt_rand(0, 9);
            $i++;
        }
        return $pin;
    }

    foreach($_POST['option'] as $key  => $value){

        for ($i = 1; $i <= $value; $i++) {
            $pin = generatePIN();  // 1234

                    $sql = "INSERT INTO tickets (event_id, ticket_pin, ticket_holder) VALUES (?, ?, ?)";
                    $stmt= $db->pdo->prepare($sql);
                    $stmt->execute([$key, $pin, $userId]);
        }

    }
if($stmt){

    echo 'Checkout Successfully';
}
else{
  echo 'Please login before checkout the current event, Thank you';
}?>

<div class="container">
<div class="row">

<div class="col-xs-12 col-md-4">
<!-- CREDIT CARD FORM STARTS HERE -->
<div class="panel panel-default credit-card-box"><div class="panel-heading display-table" ><div class="row display-tr" >
<h3 class="panel-title display-td" >Payment Details</h3>
<div class="display-td" >                            
<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
</div></div></div>
<div class="panel-body"><form role="form" id="payment-form"><div class="row"><div class="col-xs-12"><div class="form-group">
<label for="cardNumber">CARD NUMBER</label>
<div class="input-group">
<input type="tel"
class="form-control"
name="cardNumber"
placeholder="Valid Card Number"
autocomplete="cc-number"
required autofocus 
/>
<span class="input-group-addon"><i class="fa fa-credit-card"></i></span></div></div></div></div>
<div class="row">
<div class="col-xs-7 col-md-7"><div class="form-group">
<label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
<input type="tel" 
class="form-control" 
name="cardExpiry"
placeholder="MM / YY"
autocomplete="cc-exp"
required 
/></div></div>
<div class="col-xs-5 col-md-5 pull-right"><div class="form-group">
<label for="cardCVC">CV CODE</label>
<input type="tel" 
    class="form-control"
    name="cardCVC"
    placeholder="CVC"
    autocomplete="cc-csc"
    required/></div></div></div>
<div class="row"><div class="col-xs-12">
    <button onclick="myFunction()">Submit Payment</button>
    <script>function myFunction(){alert('Payment made Successfully')}</script>
</div></div>
<div class="row" style="display:none;">
<div class="col-xs-12">
<p class="payment-errors"></p>
</div></div>
</form>
</div>
</div>            
<!-- CREDIT CARD FORM ENDS HERE -->
</div></div></div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<?php require_once('../Assets/footer.php'); ?>

