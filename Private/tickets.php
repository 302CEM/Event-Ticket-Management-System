<pre>
<?php 


// This script handels making tickets and stores ticket
// information on database.

include('../Classes/dbClass.php');
include('../Classes/ticketClass.php');
include('functions.php');

if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
    
}

echo "$userId</br>";

  


foreach($_POST['option'] as $key  => $value){

    echo $key .'->'. $value. '<br>';
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

    echo 'succes';

}