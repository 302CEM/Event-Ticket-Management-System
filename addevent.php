<?php
include_once('../Private/functions.php');
include_once('../Assets/adminheader.php');

?>

<div id="signup" src="https://code.jquery.com/jquery-3.4.0.min.js">
        <form action="../Private/addeventproc.php" method="post" enctype="multipart/form-data">
            <label for="eventName">Event Name</br>
            <input type="text" name="eventName"> </label></br></br>
            <label for="eventlocation">Event Location</br>
            <input type="text" name="eventLocation"> </label></br></br>
            <label for="eventprice">Event Price</br>
            <input type="text" name="eventPrice"></label></br></br>



            <label for="eventdescription">Event Description</br>

            <textarea name="eventDescription" rows="4" cols="50">
            </textarea>

            <br></br>
            <label for="eventimage">Event Image</br>
            <input type="file" name="image" id="image"/></label></br></br>


            <input style='background-color:rgb(53, 86, 148); color:white;' type="submit" name="submit" value="Add event">
            </form>
    </div>
<script>
$(document).ready(function(){
  $('#submit').click(function(){
        var image_name = $('image').val();
        if(image_name == '')
        {
          alert("Please Select Image");
          return false;
        }
        else {
          var extension = $('#image').val().split('.').pop().toLowerCase();
          if(jQuery.inArray(extension,['gif','png','jpg','jpeg']) == -1){
            alert('Invalid Image File');
            $('#image').val('');
            return false;
          }
        }
  });
});
</script>

<?php include_once('../Assets/footer.php'); ?>
