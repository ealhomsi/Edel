`<?php
//init
session_start();
include  "../php/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>EDEL</title>
  <?php include '../template/includes-non-index.html' ?>

  <style>
    body {
      font-family: "Raleway";
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <?php include '../template/navbar-non-index.php' ?>

  <div id="boot2" >
    <svg class="shape1" xmlns="http://www.w3.org/2000/svg" viewBox="0 50 448 160" id="Background2"><title>testshape</title>
      <polygon class="shape3" points="448 200 0 215 0 0 448 0 448 200" />
      <div class="row">

        <h2 id="boot3">CONTACT</h2>
        <p class="w3-left p2"><strong>If you have any question or comments you would like to share with us, feel free to reach out to us!</strong></p>
        <div class="w3-row w3-padding-32">

          <div class="w3-col m6 floatLeft fortyto100">
            <form action="/action_page.php" target="_blank">
              <div class="w3-row-padding div2">
                <div class="w3-half">
                  <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                </div>
                <div class="w3-half">
                  <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                </div>
                <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message" style="height:15em;">

              </div>
              <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
            </form>

            <div>
            </div>
          </div>

          <div class="col-sm-4 floatRight fortyto100 margin3em">

            <p class="p3"> <i class="fa fa-map-marker"></i> Montreal, Qc </p>
            <br>


            <p class="p3"> <i class="fa fa-phone width30px"></i> Phone: +00 1 (514)555-5555 </p>
            <br>


            <p class="p3"> <i class="fa fa-envelope width30px"> </i>Email: mail@mail.com </p>
            <br>


          </div>
        </div>

      </div>
    </svg>
    <!-- End Page Content -->
  </div>

  <!-- Subscribe Section -->
  <div class="w3-container w3-content w3-padding-64 maxWidth800">
    <h2 class="w3-wide w3-center">Never Miss A Thing </h2>
    <p class="w3-opacity w3-center">For regular updates about our products, subscribe to our newsletter</p>

    <button class="w3-button w3-black w3-section w3-right floatLeft" type="submit" >SUBSCRIBE</button>

  </div>
  <!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
<script>
//registering handlers
registerBody();
colorBlack();
</script>
</html>
