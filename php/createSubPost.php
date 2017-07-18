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
    $postType =  "";
    $postText = "";
 
    $postFatherID = $_POST['fatherPostID'];
    // fetch credentials thorugh post
    if(isset($_POST["reply".$postFatherID])){
        $postText = $_POST["reply".$postFatherID];
    }
     
    //error no login
    if(!isset($_SESSION["userName"])){
        die("please login or register first");
    }


    //create mysql time
    $phptime = date( 'Y-m-d H:i:s');
    echo $phptime;
    //building querry to the database
    $dbQuery = "INSERT INTO Posts (user_id, post_type, post_date, post_text, post_rating) VALUES ('" . $_SESSION['userID'] . "', '" . $postType ."', FROM_UNIXTIME('" . $phptime ."'), '". $postText  ."', 1)";
            

    //inserting
    $conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');
    $result = $conn->query($dbQuery);

    if(!$result) {
        die("something went wrong" . $conn->error);
    }

    //closing connection
    $conn->close();


    //building querry to the database
    $lastID = querryLastPost('post_id');
    echo "<br> " . $lastID ."<br>" . $postFatherID . "<br>"; 
    $dbQuery = 'INSERT INTO ChildrenPosts (father_post_id, child_post_id) VALUES (' . $postFatherID . ' , ' . $lastID . ')';
            

    //inserting
    $conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');
    $result = $conn->query($dbQuery);

    if(!$result) {
        die("something went wrong" . $conn->error);
    }

    //closing connection
    $conn->close();


    header("Location: https://192.168.1.116/new/pages/newsfeed.php"); /* Redirect browser */
        
}

//calling main()
main();
  
?>
