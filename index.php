<?php 
	//init
	session_start(); 
	include  "php/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>EDEL</title>
     <link rel="stylesheet" href="css/loginPop.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/homeNavBar.js"> </script>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <!-- Navbar -->
    <div id="NavBarShit" class="w3-top">
        <div class="w3-bar w3-card-2" id="navbarStyle">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large" id="logo">EDEL</a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large menushit selectedMenu">HOME</a>
            <a href="pages/newsfeed.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small menushit">FORUM</a>
            <a href="pages/tags.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small menushit">TAGS</a>
            <a href="pages/aboutus.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small menushit">ABOUT US</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button menushit" title="More">MORE <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4 contentbar">
                    <a href="#" class="w3-bar-item w3-button">Merchandise</a>
                    <a href="#" class="w3-bar-item w3-button">Extras</a>
                    <a href="#" class="w3-bar-item w3-button">Media</a>
                </div>
            </div>


            <div>
                <a href="javascript:void(0)" class="w3-padding-large w3-hover-gray w3-hide-small w3-right menushit"><i class="fa fa-search"></i></a>
            </div>

            <?php
                if(isset($_SESSION['userName'])) {
                    echo '<div  style="width:auto; position:relative; float:right; display:inline-block" >
                            <p> hello ' . $_SESSION['userName'] . ' id = ' . $_SESSION['userID'] . '</p>
                          </div>';
                    echo "<a href=\"php/logout.php\" > <button class=\"buttonsMenu\" style=\"width:auto; position:relative; float:right; display:inline-block; \">Logout</button> </a>";

                    echo "<a href=\"pages/profile.php\" > <button class=\"buttonsMenu\" style=\"width:auto; position:relative; float:right; display:inline-block; \">Profile</button> </a>";
                } else {
                    echo "<button  class=\"buttonsMenu menushit\" onclick=\"document.getElementById('id01').style.display='block'\" style=\"width:auto; position:relative; float:right; display:inline-block; \">Login</button>";
                    echo "<button  class=\"buttonsMenu menushit\" onclick=\"document.getElementById('id02').style.display='block'\" style=\"width:auto; float:right; display:inline-block; margin-left:9.5em; \">Sign up</button>";
                }
                 
            ?>      
        </div>
    </div>
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
      
        <h2 id="slogan"> Build for Refugees and Asylum Seekers </h2>

        <h4 id="subSlogan"> Get answers fast and confidentially </h4>
        <div class="downloadApp">
            <img class="downloadAppImages" src="https://storage.moqups.com/repo/iNXjFx1a/images/jsgz4kcW2q.png">
            <img class= "downloadAppImages" src="https://storage.moqups.com/repo/iNXjFx1a/images/A6v9HOv8On.png">
        </div>
    </div>

    <!-- phone in hand -->
    <div >
        <img id="phoneInHand" src="images/phoneInHand.png">
    </div>

    <!-- Login -->
    <div id="id01" class="modal">
        <form class="modal-content animate" action="php/verifyCredentials.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
            </div>
            <div class="container">
                <label><b>Username</b></label>
                <input type="email" placeholder="Enter Email" name="userEmail" required>
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="userPassword" required>
                <button type="submit">Login</button>
                <input type="checkbox" checked="checked"> Remember me
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw" style="float:right;">Register <a style="color: blue;" onclick="document.getElementById('id02').style.display='block'" > here!</a></span>
            </div>
        </form>
    </div>
    <!-- Register -->
    <div id="id02" class="modal">
        <form class="modal-content animate" action="php/registerUser.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
            </div>
            <div class="container">

                <label><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="userName" required>

                <label><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="userEmail" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="userPassword" required>

                <label><b>IMEI</b></label>
                <input type="text" placeholder="Enter Imei" name="userImei" required>

                <button type="submit">Register</button>
                <input type="checkbox" checked="checked"> Remember me
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
        </form>
    </div>

    <!-- hide and show stuff -->
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        var modal2 = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal2) {
                modal.style.display = "none";
            }
        }
    </script>
    <!-- Page content -->
    <div class="w3-content" class="newStyle">
        <!-- The Band Section -->
        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
            <h2 class="w3-wide">EDEL</h2>
            <p class="w3-opacity"><i>We love refugees</i></p>
            <p class="w3-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie arcu volutpat est interdum, at egestas orci facilisis. Praesent vitae est vel nibh finibus consequat eget non erat. Cras vulputate tincidunt mauris nec facilisis. Integer mollis maximus tristique. Proin ac libero a orci ornare suscipit. Sed tempor nunc eu nisl venenatis, ac feugiat sem maximus. Maecenas enim lorem, pulvinar elementum dolor et, feugiat faucibus massa. Phasellus eu gravida quam, non euismod diam.</p>
            <div class="w3-row w3-padding-32">
                <div class="w3-third">
                    <p>Name</p>
                    <img src="images/here.png" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
                </div>
                <div class="w3-third">
                    <p>Name</p>
                    <img src="images/here.png" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
                </div>
                <div class="w3-third">
                    <p>Name</p>
                    <img src="images/here.png" class="w3-round" alt="Random Name" style="width:60%">
                </div>
            </div>
        </div>
        <!-- The Tour Section -->
        <div class="w3-black" id="tour">
            <div class="w3-container w3-content w3-padding-64" style="max-width:800px; width:100%;">
                <h2 class="w3-wide w3-center">SOMETHING</h2>
                <p class="w3-opacity w3-center"><i>Remember to book your tickets!</i></p>
                <br>
                <ul class="w3-ul w3-border w3-white w3-text-grey">
                    <li class="w3-padding">September <span class="w3-tag w3-red w3-margin-left">Sold out</span></li>
                    <li class="w3-padding">October <span class="w3-tag w3-red w3-margin-left">Sold out</span></li>
                    <li class="w3-padding">November <span class="w3-badge w3-right w3-margin-right">3</span></li>
                </ul>
                <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
                    <div class="w3-third w3-margin-bottom">
                        <div class="w3-container w3-white">
                            <p><b>New York</b></p>
                            <p class="w3-opacity">Fri 27 Nov 2016</p>
                            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                            <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Buy Tickets</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <div class="w3-container w3-white">
                            <p><b>Paris</b></p>
                            <p class="w3-opacity">Sat 28 Nov 2016</p>
                            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                            <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Buy Tickets</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <div class="w3-container w3-white">
                            <p><b>San Francisco</b></p>
                            <p class="w3-opacity">Sun 29 Nov 2016</p>
                            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                            <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Buy Tickets</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ticket Modal -->
        <div id="ticketModal" class="w3-modal">
            <div class="w3-modal-content w3-animate-top w3-card-4">
                <header class="w3-container w3-teal w3-center w3-padding-32">
                    <span onclick="document.getElementById('ticketModal').style.display='none'" class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
                    <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
                </header>
                <div class="w3-container">
                    <p>
                        <label><i class="fa fa-shopping-cart"></i> Tickets, $15 per person</label>
                    </p>
                    <input class="w3-input w3-border" type="text" placeholder="How many?">
                    <p>
                        <label><i class="fa fa-user"></i> Send To</label>
                    </p>
                    <input class="w3-input w3-border" type="text" placeholder="Enter email">
                    <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
                    <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
                    <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
                </div>
            </div>
        </div>
        <!-- The Contact Section -->
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
            <h2 class="w3-wide w3-center">CONTACT</h2>
            <p class="w3-opacity w3-center"><i>Fan? Drop a note!</i></p>
            <div class="w3-row w3-padding-32">
                <div class="w3-col m6 w3-large w3-margin-bottom">
                    <i class="fa fa-map-marker" style="width:30px"></i> Chicago, US
                    <br>
                    <i class="fa fa-phone" style="width:30px"></i> Phone: +00 151515
                    <br>
                    <i class="fa fa-envelope" style="width:30px"> </i> Email: mail@mail.com
                    <br>
                </div>
                <div class="w3-col m6">
                    <form action="/action_page.php" target="_blank">
                        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                            </div>
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                            </div>
                        </div>
                        <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
                        <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
                    </form>
                </div>
            </div>
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
    window.addEventListener("scroll", update);
</script>
</html>
