<?php

require_once('../Private/functions.php');
require_once('../Classes/dbClass.php');
require_once('../Assets/adminheader.php');
?>


<table>
  <tr>
    <th>Id</th>
    <th>Event ID</th>
    <th>Ticket Pin</th>
    <th>Ticket Holder</th>
    <th>Status</th>
  </tr>
  <?php
  $conn = mysqli_connect("localhost","root","","eventbooking");
  if($conn-> connect_error){
    die("Connection failed".$conn-> connect_error);
  }

  $sql = "SELECT id,event_id,ticket_pin,ticket_holder,status from tickets";
  $result = $conn ->query($sql);

  if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
      echo "<tr><td>".$row["id"]."</td><td>".$row["event_id"]."</td><td>".$row["ticket_pin"]."</td><td>".$row["ticket_holder"].
      "</td><td>".$row["status"]."</td></tr>";
    }
    echo "</table>";
  }
  else{
    echo "0 result";
  }

  $conn -> close();
?>
</table>
<?php include_once('../Assets/footer.php'); ?>
