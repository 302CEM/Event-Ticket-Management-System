<?php

require_once('../Private/functions.php');
require_once('../Classes/dbClass.php');
require_once('../Assets/adminheader.php');
?>

<table border='3' style="border:3px solid black;margin-left:auto;margin-right:auto;width: 50%; height: 10% ">

    

  <tbody>
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
      echo "<tr>";

          echo "<td style=text-align:center>" . $row['id'] . "</td>";

          echo "<td style=text-align:center>" . $row['event_id'] . "</td>";

          echo "<td style=text-align:center>" . $row['ticket_pin'] . "</td>";

          echo "<td style=text-align:center>" . $row['ticket_holder'] . "</td>";

          echo "<td style=text-align:center>" . $row['status'] . "</td>";
          echo "</tr>";

          }
    echo "</table>";
  }
  else{
    echo "0 result";
  }

  $conn -> close();
?>
      </tbody>
</table>
<?php include_once('../Assets/footer.php'); ?>

