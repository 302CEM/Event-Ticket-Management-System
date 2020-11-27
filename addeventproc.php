<?php

// Adding a new event to the database.


// This script is used for [addevent.php] page.

require_once('functions.php');
require_once('../Classes/dbClass.php');


$db = new DB;
if(isset($_POST['submit'])){

    $eventName = $_POST['eventName'];
    $location = $_POST['eventLocation'];
    $price = $_POST['eventPrice'];
    $description = $_POST['eventDescription'];
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

}
$sql = "INSERT INTO events (event_Name, event_location, event_price, event_description,eventimg)
VALUES ('$eventName', '$location','$price', '$description','$file')";
$stmt = $db->pdo->prepare($sql);
$stmt->execute();
if($stmt)
{
echo '<script>alert("Event added successfully")</script>';
}
else
{
  echo 'There was some error';
}
