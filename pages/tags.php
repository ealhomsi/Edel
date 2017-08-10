<?php
	//init
	session_start();
	include  "../php/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tags</title>
    <!-- all required includes -->
    <?php include '../template/includes-non-index.html' ?>

    <style>

		@media screen and (max-width: 1000px){
			.move{
				margin-top: -2em;
			}

		}
		@media screen and (max-width: 450px){
			.move{
				margin-top: -5em;
			}

		}

		@media screen and (max-width: 600px) {

		}

    	#icons img {

					position: absolute;
					width:40px;
					margin: 2em 0em 1em 2em;
    	}

    	.tags {
    		display: inline-block;
    		background-color: #2dd0c6;
    		color: white;
    		border-radius: 3em;
    		padding: 0.4em 3em;
    		margin: 0.5em 0.3em;
    		opacity: 0.99;


    	}

    	#tagsContainer {
    		width: 100%;
            display:block;
    	}




    </style>
</head>

<body>
    <!-- navbar -->
    <?php include '../template/navbar-non-index.php' ?>


    <!-- big screen -->
    <div id="splashScreen" style="height: auto;">
        <h2 id="slogan"> Choose a tag from a variety of categories </h2>
        <br>
        <p style="color: white; text-align:center;"> The following categories will help you navigate directly to your point of interest </p>
		<br><br><br>
        <div id="icons" style="margin: auto; width: 100%; display:absolute; text-align: center;">



					<div style="float:left; width:20%"><img src="../images/home-icon.png">
        	<svg height="100" width="100">
  				<circle cx="50" cy="50" r="40" stroke="white" stroke-width="3" fill="white" />
			</svg>
		</div>
			<div class="move" style="float:left; width:20%">
			<img src="../images/business-affiliate-network.png">
        	<svg height="100" width="100">
  				<circle cx="50" cy="50" r="40" stroke="white" stroke-width="3" fill="white" />
			</svg>
		</div>
			<div style="float:left; width:20%">
			<img src="../images/medical-kit.png">
        	<svg height="100" width="100">
  				<circle cx="50" cy="50" r="40" stroke="white" stroke-width="3" fill="white" />
			</svg>
		</div>

			<div class="move" style="float:left; width:20%">

			<img src="../images/map.png">
        	<svg height="100" width="100">
  				<circle cx="50" cy="50" r="40" stroke="white" stroke-width="3" fill="white" />
			</svg>
		</div>
			<div style="float:left; width:20%">

			<img src="../images/translation.png">
        	<svg height="100" width="100">
  				<circle cx="50" cy="50" r="40" stroke="white" stroke-width="2" fill="white" />
			</svg>
		</div>

        </div>
	   <br>
       <br>
		<br>
			<br>
	 <br>
		 <br>
    </div>


    <!-- page content -->
    <div id="tagsContainer"  style="max-width:2000px; margin-top:46px" class="w3-content w3-container w3-padding-64 w3-center w3-meduim">
    	<h3 style="margin:1em;"> Tags: </h3>
			<p style="color: white; text-align:center;"> For more precise topics pick one of these tags </p>

    	<ul>
    		<?php
    			$tagsArray = listOfAllTags();
    			foreach($tagsArray as $oneTag) {
    				echo '<a href="tagPages.php?tagID=' . $oneTag[1]  .'">';
    				echo '<li class="tags">' . $oneTag[0] . '</li>';
    				echo '</a>';
    			}
    		?>
    	</ul>
    </div>

   <!-- Login -->
    <?php include '../template/login-non-index.html' ?>
    <!-- Register -->
    <?php include '../template/register-non-index.html' ?>

    <!-- add script -->
    <script src="../js/register-modal.js"> </script>

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
	    // Automatic Slideshow - change image every 4 seconds
	    var myIndex = 0;
	    carousel();

	    function carousel() {
	        var i;
	        var x = document.getElementsByClassName("mySlides");
	        for (i = 0; i < x.length; i++) {
	            x[i].style.display = "none";
	        }
	        myIndex++;
	        if (myIndex > x.length) {
	            myIndex = 1
	        }
	        x[myIndex - 1].style.display = "block";
	        setTimeout(carousel, 4000);
	    }

	    // Used to toggle the menu on small screens when clicking on the menu button
	    function myFunction() {
	        var x = document.getElementById("navDemo");
	        if (x.className.indexOf("w3-show") == -1) {
	            x.className += " w3-show";
	        } else {
	            x.className = x.className.replace(" w3-show", "");
	        }
	    }

	    // When the user clicks anywhere outside of the modal, close it
	    var modal = document.getElementById('ticketModal');
	    window.onclick = function(event) {
	        if (event.target == modal) {
	            modal.style.display = "none";
	        }
	    }

    </script>
</body>

<script>
    //registering handlers
    registerBody();
    colorBlack();
</script>
</html>
