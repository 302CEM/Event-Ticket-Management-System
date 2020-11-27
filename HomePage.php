<?php
include_once('../Private/functions.php');
include_once('../Assets/header.php');

 ?>
    <main>
        <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext"></div>
          <img src="../pic/event1.jpg" style="width:100%" >
        </div>

        <div class="mySlides fade">
          <div class="numbertext"></div>
          <img src="../pic/tommorow.jpg" style="width:100%">
          <div class="text">Begin Your Adventure</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext"></div>
          <img src="../pic/type.jpg" style="width:100%">
          <div class="text">Party Venues</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <br>

        <div style="text-align:center">
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>

        <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 3000); // Change image every 2 seconds
        }
        </script>
    </main>


    <?php include_once('../Assets/footer.php'); ?>
