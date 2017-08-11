<!-- Navbar -->
<div id="navbar-container" class="w3-top">
    <nav class="w3-bar w3-card-2 navbar navbar-default" id="navbar-background">
        <div id="logo"> <a href="#" class="w3-bar-item w3-button w3-padding-large col-sm-4" id="logo">EDEL</a> </div>


        <ul id="menu-bar" class="row">
            <li id="first-menu"> <a id= "barThing" class="w3-bar-item w3-button w3-padding-large  w3-hide-large w3-right col-sm-1" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a> </li>
            <li id="second-menu"> <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-small selectedMenu col-sm-1">HOME</a> </li>
            <li id="third-menu"> <a href="pages/newsfeed.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium col-sm-1">FORUM</a> </li>
            <li id="forth-menu"> <a href="pages/tags.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium col-sm-1 ">TAGS</a> </li>
            <li id="last-menu"> <a href="pages/aboutus.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium col-sm-1 ">ABOUT US</a> </li>

             <?php
                $result = '';
                if(isset($_SESSION['userName'])) {
                    $userName = $_SESSION['userName'];
                    $result = <<< EOT
                    <li>
                    <a class="w3-bar-item w3-button w3-padding-large col-sm-1  w3-hide-small w3-hide-medium action-button" href="php/logout.php">
                        <span> Logout </span>
                    </a> </li>


                    <li>
                    <a  href="pages/profile.php" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-padding-large col-sm-1  action-button">
                        <span> Profile </span>
                    </a> </li>

                    <li>
                    <a class='w3-bar-item w3-padding-large w3-hide-medium w3-button w3-hide-small w3-hide-medium col-sm-1' style="float:right;" href="pages/profile.php">
                        <p style="color:white;"> hello  <span id="user-name-id"> $userName </span> </p>
                    </a> </li>
EOT;

                } else {
                    $result = <<< EOT

                    <li>
                    <a class="w3-bar-item w3-button w3-padding-large col-sm-1 action-button w3-hide-small w3-hide-medium" onclick="document.getElementById('id01').style.display='block'">
                        <span> Login </span>
                    </a> </li>

                    <li>
                    <a class="w3-bar-item w3-button w3-padding-large col-sm-1 action-button w3-hide-small w3-hide-medium" onclick="document.getElementById('id02').style.display='block'">
                        <span> Sign up </span>
                    </a> </li>
EOT;
                }
                echo $result;
            ?>

            <li>
            <div>
                <a href="javascript:void(0)" class="col-sm-1 w3-padding-large w3-hover-gray w3-hide-small w3-hide-medium w3-right "><i class="fa fa-search"></i></a>
            </div> </li>

        </ul>
    </nav>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large  w3-top">
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
  <a href="pages/newsfeed.php" class="w3-bar-item w3-button w3-padding-large">FORUM</a>
  <a href="pages/tags.php" class="w3-bar-item w3-button w3-padding-large">TAGS</a>
  <a href="pages/aboutus.php" class="w3-bar-item w3-button w3-padding-large">ABOUT US</a>

  <?php
     $result = '';
     if(isset($_SESSION['userName'])) {
         $userName = $_SESSION['userName'];
         $result = <<< EOT
         <a class="w3-bar-item w3-button w3-padding-large" href="php/logout.php">
             <span> LOGOUT </span>
         </a>

         <a  href="pages/profile.php" class="w3-bar-item w3-button w3-padding-large">
             <span> PROFILE </span>
         </a>
EOT;
     } else {
         $result = <<< EOT

         <a class="w3-bar-item w3-button w3-padding-large" onclick="document.getElementById('id01').style.display='block'">
             <span> LOGIN </span>
         </a>

         <a class="w3-bar-item w3-button w3-padding-large" onclick="document.getElementById('id02').style.display='block'">
             <span> SIGN UP </span>
         </a>
EOT;
     }
     echo $result;
 ?>
</div>


<script>
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
