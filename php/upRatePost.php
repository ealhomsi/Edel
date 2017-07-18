<?php 
//init
session_start(); 
include  "functions.php";

if(!isset($_SESSION['userID'])) 
    die("LOGIN / REGISTER FIRST!!!");
?>

<?php
//this file does just the uploading routine
//upload routine and listing files of some organiztion.
function main() {
    // fetch credentials through post   
    $postID = "";

    // fetch credentials thorugh GET
    if(isset($_GET['ratedPostID'])){
        $postID = $_GET['ratedPostID'];
    } else {
        die("ratedPostID was not set");
    }
     
    //error no login
    if(!isset($_SESSION["userName"])){
        die("please login or register first");
    }


    //create mysql time
    $phptime = date( 'Y-m-d H:i:s');
    echo $phptime . "<br>";
    echo $postID;
    $voteValue = 1;
    //building querry to the database
    $dbQuery = "INSERT INTO Votes (user_id, post_id, vote_date, vote_value) VALUES ('" . $_SESSION['userID'] . "', '" . $postID ."', FROM_UNIXTIME('" . $phptime ."'), ". $voteValue  .")";
            

    //inserting
    $conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');
    $result = $conn->query($dbQuery);

    if(!$result) {
        die("something went wrong inseting a new vote " . $conn->error);
    }

    //closing connection
    $conn->close();


    //get the post current rating
    $rating = querrySomethingFromPosts($postID, 'post_id', 'post_rating');
    $rating = $rating + $voteValue;

    echo "<br>" . $rating . "<br>";
    //update the rating on the post
    $dbQuery = 'UPDATE  Posts SET post_rating='. $rating .  ' WHERE post_id=' . $postID ;
            

    //updating
    $conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');
    $result = $conn->query($dbQuery);

    if(!$result) {
        die("something went wrong with updating " . $conn->error);
    }

    //closing connection
    $conn->close();


    header("Location: https://192.168.1.116/new/pages/newsfeed.php"); /* Redirect browser */
        
}

//calling main()
main();
  
?>
