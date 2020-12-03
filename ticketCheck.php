<?php


// This script is used for checking tickets and just used on one page
// checkin.php, which is can be accessed by admin only.

require_once('../Classes/dbClass.php');

$db = new DB;

if(isset($_GET['pin'])){
    $pin = $_GET['pin'];

}


// the function checks if the pin exists in the database, and
// returns TRUE or FALSE.

function isPin($pin)
{
    $pdo = $GLOBALS['db']->pdo;
    $stmt = $pdo->query("SELECT ticket_pin FROM tickets WHERE ticket_pin = $pin");
    $stmt->execute();
    $rowcount = $stmt->rowCount();
    $pinExist = ($rowcount = 1);
    if ($pinExist) {
        $data = $stmt->fetchColumn();
                if($data){
                    return TRUE;
                }else{ return FALSE;}

                }

}

// Getting the user id for a specific pin, and returns the user id
// on success.

function getUserID($pin)
    {
        $pdo = $GLOBALS['db']->pdo;
        $stmt = $pdo->query("SELECT ticket_holder FROM tickets WHERE ticket_pin = $pin");
        $stmt->execute();
        $rowcount = $stmt->rowCount();
        $data = ($rowcount == 1);

        if ($data) {
            $data = $stmt->fetchColumn();

               }


        return $data;
    }

 //  Ticket activation function which activate the ticket if the
 //  user has the pincode for the ticket in the databas.
$ticketHolder = getUserID($pin);

function activateAccount($id)
{
    $pdo = $GLOBALS['db']->pdo;
    $pin = $GLOBALS['pin'];
    $ticketHolder = $GLOBALS['ticketHolder'];


    $stmt = $pdo->query("UPDATE tickets SET status = 'Used' WHERE ticket_holder = $ticketHolder AND ticket_pin = $pin");
    $stmt->execute();
    if ($stmt) {
        return true;
    }else{

    return FALSE;
}
}




if(isPin($pin)){
    getUserID($pin);
    activateAccount($ticketHolder);

    echo "The Status has been changed";
    echo "<br><a href='../Admin/ticketinfo.php'>Click here to return</a>";
}else{
    echo "the provided pin does NOT exist in the database";
}
