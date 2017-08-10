`<?php
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

	<!-- big screen -->
	<div id="splashScreen">
		<img src="https://storage.moqups.com/repo/iNXjFx1a/images/iPCgz6naJD.png" id="imgSplashScreen">

		<h2 id="slogan"> Built for Refugees and Asylum Seekers </h2>

		<h4 id="subSlogan"> Get the answers you need in a simple and efficient way </h4>

	</div>

	<!-- phone in hand -->
	<div >
		<img class="width100" src="images/phoneInHand.png">
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
			<p class="centered"> We have gather here the information and tools you need for a smooth transition into your new home. </p>
			<p class="centered"> Choose from a variety of topics such as: </p>
			<div class="w3-row w3-padding-32">

				<div class="row">
					<div class="col-sm-4 floatLeft width33">
						<p class="centerText">Housing</p>
						<img class="pic" src="images/home.png" alt="Random Name">
						<svg height="100" width="100">
							<circle cx="50" cy="50" r="40" stroke="white" stroke-width="2" fill="#7595cd" />
						</svg>
					</div>

					<div class="col-sm-4 floatLeft width33">
						<p class="centerText"="text-align: center">Health Care</p>
						<img class="pic" src="images/kit.png" alt="Random Name">
						<svg height="100" width="100">
							<circle cx="50" cy="50" r="41" stroke="white" stroke-width="2" fill="#7595cd" />
						</svg>
					</div>

					<div class="col-sm-4 floatRight width33">
						<p class="centerText"="text-align: center">Education</p>
						<img class="pic" src="images/books.png" alt="Random Name">
						<svg height="100" width="100">
							<circle cx="50" cy="50" r="40" stroke="white" stroke-width="2" fill="#7595cd" />
						</svg>
					</div>

				</div>
			</div>
		</div>


		<div class="contentBox">
			<svg class="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 100" ><title>testshape</title>
				<polygon class="shape2" points="448 140 0 130 0 0 448 0 448 140"> </svg>

				<div class="row">

					<div class="col-sm-5 fiftyto100 floatLeft">
						<img src="images/Desktop+.png" alt="desktop" id="deskcell">
					</div>

					<div class="col-sm-5 fiftyto100 floatRight">
						<p id="header2"> Perfect for plannig ahead or using on the go</p>

						<p id="subSlogan"> Whether you are at home or on the street, access your account from the platform of your liking.
							Our chatbot and  forums can be accessed by web or by using our mobile application</p>

						</div>
					</div>
				</div>


				<div class="w3-container w3-content w3-center w3-padding-64 maxWidth800" id="band">


					<div class="col-sm-5 floatLeft">
						<h2 class="blackeade">
							Connect with a community of peers and experts</h2>

							<h4 id="subSlogan2"> With this tool, you can get directed to the proper organisations that seek to help you.
								To find out why NGO's recommend our service <a href="pages/aboutUs.php"> click here!</a> </h4>

							</div>

							<div class="col-sm-5" id="boot1">

							</div>

						</div>


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
						window.addEventListener("scroll", update);
						</script>
						</html>
