<?php
include_once('../Private/functions.php');
include_once('../Assets/adminheader.php');

?>
<div id="signup">
        <form action="../Private/addeventproc.php" method="post">
            <label for="eventName">Event Name</br>
            <input type="text" name="eventName"> </label></br></br>
            <label for="eventlocation">Event Location</br>
            <input type="text" name="eventLocation"> </label></br></br>
            <label for="eventprice">Event Price</br>
            <input type="text" name="eventPrice"></label></br></br>
            
            
           
            <label for="eventdescription">Event Description</br>

            <textarea name="eventDescription" rows="4" cols="50">
            </textarea>
           
            <br>
            <input style='background-color:rgb(53, 86, 148); color:white;' type="submit" name="submit" value="Add event">
            </form>
    </div>
    

<?php include_once('../Assets/footer.php'); ?>