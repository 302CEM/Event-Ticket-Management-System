<?php

// the page that will will get ticket information.
// getting a specific ticket information happens
// when the admin provide a ticket id in the search field. 

require_once('../Private/functions.php');
require_once('../Classes/dbClass.php');
require_once('../Assets/adminheader.php');

$db = new DB;

if(isset($_GET['id'])){
$id =  $_GET['id'];
$stmt = $db->pdo->query("SELECT id, event_id, ticket_pin, ticket_holder, status FROM tickets where id = $id LIMIT 1");
$stmt->execute();
$ticket = $stmt->fetch(PDO::FETCH_NUM);

$ticketId = $ticket[0];
$eventId = $ticket[1];
$ticketPin = $ticket[2];
$ticketOwner = $ticket[3];
$status = $ticket[4];

}elseif(!isset($id)){
    $id = '';
}else{
    echo 'error';
}
 ?>
<div id="ticketinfo">
<h4> Enter a ticket id </h4>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
<input style='width:300px;height:25px;' type="text" name="id">
<input style='background-color:rgb(53, 86, 148); color:white;width:60px;height:30px;'   type ="submit" name="submit" value="check in">
<div>
<?php if(isset($ticket)) {
      echo "<h2 style='color:#2f52a3'>" ."Detailed Information</h2>";
      echo "<hr>";
    echo "<h4>Order Ticket id :" . "&nbsp&nbsp" . " $ticketId</h4>";
    echo "<h4>Event id : " . "&nbsp&nbsp" . " $eventId</h4>";
    echo "<h4>Pincode : " . "&nbsp&nbsp" . " $ticketPin </h4>";
    echo "<h4> Status:";
     if($status == 'pending'){
    echo "<span style='color:red'>" . "&nbsp&nbsp" . "$status </span> </h4>";}
    else{ echo " <span style='color:green'>" . "&nbsp&nbsp". "$status </h4>";}
     echo "<h4>Ticket Onwer : $ticketOwner </h4></br>";
  } ?>
</div>
</form>
</div>
<?php include_once('../Assets/footer.php'); ?>
