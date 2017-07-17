<?php 
//init
session_start(); 
include  "../php/functions.php";

if(!isset($_SESSION['userID'])) 
    die("you should login/register first");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Profile <?php echo $_SESSION['userName'] ?> </title>
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
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>


<body>
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card-2">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
            <a href="#" onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding-large w3-hide-small">NEW POST</a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hide-small">N/A</a>
            <a href="newsfeed.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">NEWS FEED</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="#" class="w3-bar-item w3-button">Merchandise</a>
                    <a href="#" class="w3-bar-item w3-button">Extras</a>
                    <a href="#" class="w3-bar-item w3-button">Media</a>
                </div>
            </div>

            <?php
            if(isset($_SESSION['userName'])) {
                    echo '<div  style="width:auto; position:relative; float:right; display:inline-block" >
                            <p> hello ' . $_SESSION['userName'] . '</p>
                        </div>';
                        echo "<a href=\"../php/logout.php\" > <button href style=\"width:auto; position:relative; float:right; display:inline-block; \">Logout</button> </a>";
                    } else {
                        echo "<button onclick=\"document.getElementById('id01').style.display='block'\" style=\"width:auto; position:relative; float:right; display:inline-block; \">Login</button>";
                    }
                    ?>

                    <div>
                        <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>


            <!-- Querry the database for all documents uploaded so far -->
            <div class="w3-content" style="max-width:2000px;margin-top:46px">
                <h2> Your uploaded posts:</h2>
                <?php
                    function listingUserPostsGivenID($id) {
                        $result = listPostsUser($id);
                        
                        echo "<br> you have " . sizeof($result) . " posts: <br>";
                        //getting all posts
                        foreach ($result as $value) {
                            formatPost($value, "");
                        }
                    }
                    listingUserPostsGivenID($_SESSION['userID']);
                ?>
                
            </div>

    <!-- New Post -->
    <div id="id01" class="modal">
        <form class="modal-content animate" action="../php/createPost.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="../images/img_avatar2.png" alt="Avatar" class="avatar">
            </div>
            <div class="container">
                <label><b>Post Type</b></label>
                <input type="text" placeholder="Describe the new subEdel" name="postType" required>
                <label><b>Post Text</b></label>
                <input type="text" style="height:9em;" placeholder="text 255 chars left" name="postText" required>
                <button type="submit">Submit</button>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw" style="float:right;">Register <a style="color: blue;" onclick="document.getElementById('id02').style.display='block'" > here!</a></span>
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

</html>
