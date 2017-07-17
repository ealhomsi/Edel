<?php 
//init the news feed page
session_start(); 
include  "../php/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>News Feed</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    body {
        font-family: "Lato", sans-serif
    }
    
    .mySlides {
        display: none
    }   
	</style>
</head>

<body>
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card-2">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
            <a href="upload.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small">UPLOAD</a>
            <a href="userlogin.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOGIN</a>
            <a href="register.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small">REGISTER</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="#" class="w3-bar-item w3-button">Merchandise</a>
                    <a href="#" class="w3-bar-item w3-button">Extras</a>
                    <a href="#" class="w3-bar-item w3-button">Media</a>
                </div>
            </div>

            <div class="floatRight">
                <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
            </div>
        </div>
    </div>
    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
        <a href="#band" class="w3-bar-item w3-button w3-padding-large">BAND</a>
        <a href="#tour" class="w3-bar-item w3-button w3-padding-large">TOUR</a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large">CONTACT</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">MERCH</a>
    </div>
    <!-- Page content -->
    <br> <br>
   	<h2>News Feed</h2>
   	<!-- starting listing the news feed -->
   	<?php
   		function listPosts($id, $level) {
   			$result = listChildrenPosts($id);
   			foreach ($result as $key => $value) {
   				formatPost($value, $level);
   				listPosts($value['post_id'], "-----" . $level);
   			}
   		}

      // listing all posts
   		listPosts("null", "");
   	?>
</body>

</html>

