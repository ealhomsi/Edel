<?php
//init
session_start();
include  "php/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>EDEL</title>
	<?php include './template/includes.html' ?>
</head>

<body>
	<!-- navbar -->
	<?php include 'template/navbar.php' ?>


	<!-- Navbar on small screens -->
	<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
		<a href="#band" class="w3-bar-item w3-button w3-padding-large">BAND</a>
		<a href="#tour" class="w3-bar-item w3-button w3-padding-large">TOUR</a>
		<a href="#contact" class="w3-bar-item w3-button w3-padding-large">CONTACT</a>
		<a href="#" class="w3-bar-item w3-button w3-padding-large">MERCH</a>
	</div>

	<!-- big screen -->
	<div id="splashScreen">
		<img src="https://storage.moqups.com/repo/iNXjFx1a/images/iPCgz6naJD.png" id="imgSplashScreen">

		<h2 id="slogan"> Built for Refugees and Asylum Seekers </h2>

		<h4 id="subSlogan"> Get the answers you need in a simple and efficient way </h4>

	</div>

	<!-- phone in hand -->
	<div >
		<img id="phoneInHand" src="images/phoneInHand.png">
	</div>

	<!-- Login -->
	<?php include './template/login.html' ?>
	<!-- Register -->
	<?php include './template/register.html' ?>

	<!-- add script -->
	<script src="js/register-modal.js"> </script>





	<!-- Page content -->
	<div class="w3-content" class="newStyle">
		<!-- The Band Section -->
		<div class="w3-container w3-content w3-center w3-padding-64" id="band">
			<h2 class="w3-wide">EDEL</h2>
			<p class="w3-opacity"><i>Find what you need when you need it</i></p>
			<p style="text-align:center"> We have gather here the information and tools you need for a smooth transition into your new home. </p>
			<p style="text-align:center"> Choose from a variety of topics such as: </p>
			<div class="w3-row w3-padding-32">

				<div class="row">
					<div class="col-sm-4" style="float:left">
						<!--p style="text-align: center">Housing</p-->
						<img src="images/circle.png" alt="Random Name" style="position: absolute; margin-left:4em">
						<img src="images/home.png" alt="Random Name"   style="position: absolute; width:60px; padding:8x; margin-left:4em">
					</div>

					<div class="col-sm-4" style="">
						<!--p style="text-align: center">Health Care</p-->
						<img src="images/circle.png" alt="Random Name" style="position: absolute; margin-left:4em">
						<img src="images/kit.png" alt="Random Name"    style="position: absolute; width:60px; padding:8px; margin-left:4em">
					</div>

					<div class="col-sm-4" style="float:right">
						<!--p style="text-align: center">Education</p-->
						<img src="images/circle.png" alt="Random Name" style="position: absolute; margin-left:4em">
						<img src="images/books.png" alt="Random Name"  style="position: absolute; width:60px; padding:8px; margin-left:4em">
					</div>
				</div>
			</div>
		</div>


		<div class="row" style="width: 100%; height: 27em">
			`<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 208" style="position: absolute; left:0; width: 100%"><title>testshape</title>
				<polygon points="448 140 0 130 0 0 448 0 448 140" style="fill:#7595cd; width: 100%"/> </svg>

			<div class="row">

				<div class="col-sm-5" style="float:left">
					<img src="images/Desktop.png" alt="desktop" style=" width: 65%; margin-top:2em">
					<img src="images/phone.png" alt="mobile" style="width: 45%; margin-top:7em; margin-left:-5em">
				</div>

				<div class="col-sm-5" style="float:right">
					<h2 style="color: white; text-align: center; margin: auto 0; margin-top:3em; width: 100%; font-weight: bold; opacity: 0.99;"> Perfect for plannig ahead or using on the go</h2>

					<h4 id="subSlogan"> Whether you are at home or on the street, access your account from the platform of your liking.
						Our chatbot and  forums can be accessed by web or by using our mobile application</h4>

					</div>
				</div>
			</div>


			<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">


				<div class="col-sm-5" style="float:left">
					<h2 style="color: black; text-align: center; margin: auto 0; width: 100%; font-weight: bold; opacity: 0.99;">
						Connect with a community of peers and experts</h2>

						<h4 id="subSlogan" style="color:black"> With this tool, you can get directed to the proper organisations that seek to help you.
							To find out why NGO's recommend our service <a href="pages/aboutUs.php"> click here!</a> </h4>

						</div>

						<div class="col-sm-5" style="float:right">

						</div>

					</div>


					<div class="row" style="width: 100%; height: 40em">
						<img src="images/background2.png" style="position: absolute; left:0; width: 100%; height: 40em; z-index:-1">
						<div class="row">

							<h2 style="color:white; margin-top:4.5em; margin-left:2em">CONTACT</h2>
							<p class="w3-left" style="margin-left:4.4em; color: white;  "><strong>If you have any question or comments you would like to share with us, feel free to reach out to us!</strong></p>
							<div class="w3-row w3-padding-32">

								<div class="w3-col m6"  style="float:left">
									<form action="/action_page.php" target="_blank">
										<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
											<div class="w3-half">
												<input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
											</div>
											<div class="w3-half">
												<input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
											</div>
										</div>
										<input class="w3-input w3-border" type="text" placeholder="Message" required name="Message" style="height:15em">
										<button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
									</form>

									<div>
									</div>
								</div>

								<div class="col-sm-4" style="float:right; margin:3em">

									<p style="color: white;  margin: auto 0; font-weight: bold"> <i class="fa fa-map-marker" style="width:30px"></i> Montreal, Qc </p>
										<br>


										<p style="color: white;  margin: auto 0; font-weight: bold"> <i class="fa fa-phone" style="width:30px"></i> Phone: +00 1 (514)555-5555 </p>
											<br>


											<p style="color: white; margin: auto 0; font-weight: bold"><i class="fa fa-envelope" style="width:30px"> </i>Email: mail@mail.com </p>
												<br>


											</div>
										</div>
									</div>
									<!-- End Page Content -->
								</div>

								<!-- Subscribe Section -->
								<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
									<h2 class="w3-wide w3-center">Never Miss A Thing </h2>
									<p class="w3-opacity w3-center">For regular updates about our products, subscribe to our newsletter</p>

									<button class="w3-button w3-black w3-section w3-right" type="submit" style="float:left">SUBSCRIBE</button>

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
							window.addEventListener("scroll", update);
							</script>
							</html>
