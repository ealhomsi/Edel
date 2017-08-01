<?php 
    //init
    session_start(); 
    include  "../php/functions.php";
    $postID = $_GET['postID'];
    if(!isset($_GET['postID'])) {
        die("please give post ID");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post ID-> <?php echo $postID; ?>  </title>
    <link rel="stylesheet" href="../css/loginPop.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Demo for the tutorial: Styling and Customizing File Inputs the Smart Way" />
    <meta name="keywords" content="cutom file input, styling, label, cross-browser, accessible, input type file" />
    <meta name="author" content="Osvaldas Valutis for Codrops" />
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="../css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../css/component.css" />
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/forum.css" />
</head>

<body>
    <!-- Navbar -->
    <div id="NavBarShit" class="w3-top" style="background-color: black;">
        <div class="w3-bar w3-card-2" id="navbarStyle">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="../index.php" class="w3-bar-item w3-button w3-padding-large" id="logo">EDEL</a>
            <a href="../index.php" class="w3-bar-item w3-button w3-padding-large menushit ">HOME</a>
            <a href="newsfeed.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small menushit">FORUM</a>
            <a href="tags.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small menushit selectedMenu">TAGS</a>
            <a href="aboutus.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small menushit">ABOUT US</a>
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
                            <p> hello ' . $_SESSION['userName'] .  '</p>
                          </div>';
                    echo "<a href=\"../php/logout.php\" > <button class=\"buttonsMenu\" style=\"width:auto; position:relative; float:right; display:inline-block; \">Logout</button> </a>";

                    echo "<a href=\"profile.php\" > <button class=\"buttonsMenu\" style=\"width:auto; position:relative; float:right; display:inline-block; \">Profile</button> </a>";
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

    
    
    <br>

     <!-- Querry the database for all posts listed in those tags-->
    <div class="w3-content" style="max-width:2000px;margin-top:46px">
        <br>
        <br>
        <?php
          function listPosts($id, $level) {

            if($id == "null") {
                $result = getSpecificPost($_GET['postID']);
            } else {
                $result = listChildrenPosts($id);
            }
            foreach ($result as $value) {
              if($id == "null") {
                printPostResponsive($value);
              } else {
                printPostResponsive2($value, $level);
              }
              listPosts($value["post_id"], $level+1);
            }
          }

          listPosts("null", 0);
        ?>
    </div>

    <!-- Login -->
    <?php include '../template/login-non-index.html' ?>
    <!-- Register -->
    <?php include '../template/register-non-index.html' ?>

    <!-- add script -->
    <script src="../js/register-modal.js"> </script>

    <!-- Footer -->
    
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
</body>

<script>
    //registering handlers
    registerBody();
    window.addEventListener("scroll", update);
</script>
</html>
