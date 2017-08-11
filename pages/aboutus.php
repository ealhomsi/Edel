img_avatar2`<?php
//init
session_start();
include  "../php/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>EDEL</title>
  <?php include '../template/includes-non-index.html' ?>
</head>

<body>
  <!-- navbar -->
  <?php include '../template/navbar-non-index.php' ?>


  <div class="w3-container w3-content w3-center w3-padding-64" id="band">
    <h2 class="w3-wide">Who is EDEL?</h2>
    <p class="w3-opacity"><i>Meet our team </i></p>
    <div class="w3-row w3-padding-32">

      <div class="row">
        <div class="col-sm-3 floatLeft width25to50">
          <img class="pic" src="../images/img_avatar2.png" style="width:100px; margin:3.4em" alt="picture">
          <svg height="200" width="200">
            <circle cx="100" cy="100" r="80" stroke="white" stroke-width="2" fill="#7595cd" />
          </svg>
          <p class="centerText">Insert Name:</p>
          <p class="centerText">Insert Description:  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>

        <div class="col-sm-3 floatLeft width25to50">
          <img class="pic" src="../images/img_avatar2.png" style="width:100px; margin:3.4em" alt="picture">
          <svg height="200" width="200">
            <circle cx="100" cy="100" r="80" stroke="white" stroke-width="2" fill="#7595cd" />
          </svg>

          <p class="centerText">Insert Name</p>
          <p class="centerText">Insert Description:  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>

        <div class="col-sm-3 floatRight width25to50">
          <img class="pic" src="../images/img_avatar2.png" style="width:100px; margin:3.4em" alt="picture">
          <svg height="200" width="200">
            <circle cx="100" cy="100" r="80" stroke="white" stroke-width="2" fill="#7595cd" />
          </svg>
          <p class="centerText">Insert Name</p>
          <p class="centerText">Insert Description:  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>

        <div class="col-sm-3 floatRight width25to50">
          <img class="pic" src="../images/img_avatar2.png" style="width:100px; margin:3.4em" alt="picture">
          <svg height="200" width="200">
            <circle cx="100" cy="100" r="80" stroke="white" stroke-width="2" fill="#7595cd" />
          </svg>
          <p class="centerText">Insert Name</p>
          <p class="centerText">Insert Description:  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>

      </div>
    </div>
  </div>


  <div id="abBoot1" >
    <svg class="shape1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 40" id="Background2"><title>testshape</title>
      <polygon class="shape3" points="448 130 0 125 0 0 448 0 448 200" />
      <div class="row">

        <div class="w3-row w3-padding-32">

          <p id="quote"> <strong> "RELEVENT FANCY QUOTE" <strong></p>
            <p class="quoter"><strong> <i> - Relevant person </i></strong></p>



          </div>

        </div>
      </svg>
      <!-- End Page Content -->
    </div>


    <div class="w3-container w3-content w3-center w3-padding-24 maxWidth800" id="abBand">

      <h3 class="blackheader">Our goal </h3>

      <h4 id="ABsubSlogan2"> Ask Jay if left/right split is better or above under. Lorem ipsum dolor sit amet,ADD LINK TO VIDEO!!!!<br>
        Lorem ipsum dolor sit amet,ADD LINK TO VIDEO!!!!<br>
        Lorem ipsum dolor sit amet,ADD LINK TO VIDEO!!!!<br>
        Lorem ipsum dolor sit amet,ADD LINK TO VIDEO!!!!<br>
        Lorem ipsum dolor sit amet,ADD LINK TO VIDEO!!!!<br>
        Lorem ipsum dolor sit amet,ADD LINK TO VIDEO!!!!<br>
        Lorem ipsum dolor sit amet,ADD LINK TO VIDEO!!!!<br>
      </h4>
    </div>


    <div id="abBoot2" >
      <svg class="shape1" xmlns="http://www.w3.org/2000/svg" viewBox="0 50 448 190" id="Background2"><title>testshape</title>
        <polygon class="shape3" points="448 200 0 215 0 0 448 0 448 200" />
        <div class="row">

          <p id="boot3"> <strong> CONTACT <strong></p>
            <p class="p2"><strong>If you have any question or comments you would like to share with us, feel free to reach out to us!</strong></p>
            <div class="w3-row w3-padding-32">

              <div class="w3-col m6 floatLeft fortyto100">
                <form action="/action_page.php" target="_blank">
                  <div class="w3-row-padding div2">
                    <div class="w3-half">
                      <input class="name w3-input w3-border" type="text" placeholder="Name" required name="Name">
                    </div>
                    <div class="w3-half">
                      <input class="email w3-input w3-border" type="text" placeholder="Email" required name="Email">
                    </div>
                    <input class="message w3-input w3-border" type="text" placeholder="Message" required name="Message">

                    <button class="send w3-button w3-black w3-section w3-left" type="submit">SEND</button>
                  </div>
                </form>

                <div>
                </div>
              </div>

              <div class="contactInfo col-sm-4 floatRight fortyto100 margin3em">

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
