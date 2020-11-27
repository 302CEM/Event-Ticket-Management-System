<?php

require_once('../Assets/header.php');
require_once('../Classes/ticketClass.php');

$ticket= new Ticket;


if(!isset($_SESSION['userId'])){
redirect_to('loginform.php');
}

if(!isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
    }
   $userfullname =  get_user_by_id($userId);
    $header = '';
    $tickets = get_tickets_by_user_id($userId);
    if($tickets){
        $header  =  "<div id='booking'>";
        $header .= "<h1> Here's Your booking history</h1>";
        $header .= "</div>";

        echo $header;
    foreach ($tickets as $ticket) {
        $ticketsDiv = "<div class='ticketsdiv'>";
        $ticketsDiv .= "<h2><span class='h2'>Ticket Information</span></h2>";
        $ticketsDiv .= "<h5>Ticket Id :" . " $ticket[id]</h5>";
        $ticketsDiv .= "<h5>Ticket holder :" . "<span class='name'>" . " $userfullname</span></h5>";
        $ticketsDiv .= "<h5>Ticket pincode :" . " $ticket[ticket_pin]</h5>";
        $ticketsDiv .= "<h5>Ticket status :" . " $ticket[status]</h5>";

        $ticketsDiv .= "</div>";
        
echo $ticketsDiv;
    } }else{echo "<div id='err'><h4>Seems like your booking history is empty :/</h4>";}
require_once('../Assets/footer.php');

?>