<?php

// This script is used for ticketinfo.php page,
// which shows the ticket info based on given 
// ticket id, this is used just by admin.


require_once('functions.php');
require_once('../Classes/dbClass.php');

$ticket = '';
$db = new DB;

if(isset($_GET['id'])){
$id =  $_GET['id'];
$stmt = $db->pdo->query("SELECT id, event_id, ticket_pin, ticket_holder, status FROM tickets where id = $_GET[id] LIMIT 1");
$stmt->execute();
$ticket = $stmt->fetch(PDO::FETCH_NUM);

if($ticket){
$ticketId = $ticket[0];
$eventId = $ticket[1];
$ticketPin = $ticket[2];
$ticketOwner = $ticket[3];
$status = $ticket[4];
}
}else{
    echo 'error';
}



