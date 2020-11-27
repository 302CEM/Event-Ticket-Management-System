<?php
include('../Classes/dbClass.php');
require_once('../Classes/eventClass.php');
include_once('../Assets/header.php');
$user_choice = $_POST['sort_method'];
$event = new Event;
$db = new DB;
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Events</title>
</head>

<body>


    <div>
        <div>
        <h3>Result after sorting
        <?php
        $events_query = '';
            if (!$user_choice)
            {

                echo "by date</h3>";
            }
            else if ($user_choice == 1)
            {
                $events_query = "SELECT * FROM events ORDER BY $event->name";
                echo "alphabetically by name</h3>";
            }
            else if ($user_choice == 2)
            {
                $events_query = "SELECT * FROM events ORDER BY $event->id";
                echo "by event ID</h3>";
            }
           $events_result = $db->pdo->query($events_query)->fetchAll(PDO::FETCH_ASSOC); ?>

           <?php foreach($events_result as $event)
					 { ?>
           <div id="eventscontainer">
            <div class="events">

                <h3><a href="event.php?event_id=<?php echo $event['event_id']; ?>"><?php echo $event['event_name']; ?></a></h3>
								<p> Event ID : <?php echo $event['event_id']; ?></p>
                <p> Event Location : <?php echo $event['event_location']; ?></p>
                <p> Event Description : <?php echo $event['event_description']; ?></p>
                <p> Event Price : RM <?php echo $event['event_price']; ?></p>

									<p>
										Event Image Reference:
										<?php
											echo '<img src="data:image/jpeg;base64,' . base64_encode($event['eventimg']) . '" height="80px" width="150px"/>';										?>
									</p>


            </div>
            </div>
           <?php } ?>

					 </body>

	<?php
	require_once('../Assets/footer.php');
	?>
