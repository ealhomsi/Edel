<?php 
//init
session_start(); 
include  "functions.php";
?>


<?php
function main() {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// fetch credentials through post	
	$email =  "";
	$password = "";
	if(isset($_POST["userEmail"])){
		$email = $_POST["userEmail"];
	}
	if(isset($_POST["userPassword"])) {
		$password = $_POST["userEmail"];
	}

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}


	// making the querry
	$dbQuery = "SELECT * FROM Partners WHERE part_email='".$email. "'";
	$result = $conn->query($dbQuery);

	// checking for errors
	if(!$result) {
		echo "Error: " . $dbQuery . "<br>" . $conn->error;
	}

	// clear the session
	unset($_SESSION["partName"]);
	unset($_SESSION["partID"]);

	//if $result is successful
	$row = $result->fetch_array();  //by now they should have the same email address

	if(!$row) {
		die('user was not found');
	}

	if(verifyPassword($password, $row['part_hashed_password'], $row['part_salt'])) {
		echo 'welcome partner ' . $row['part_name'] . ' your email is: ' . $row['part_email'] . '<br>';
		$_SESSION['partName'] = $row['part_name'];
		$_SESSION['partID'] = $row['part_id'];
		sleep(3);
		header("Location: https://localhost/new/index.php"); /* Redirect browser */
		exit();

	} else {
		echo 'password mismtach for partner: ' . $row['part_name'] . '<br>';
	}
	
	// free the results array
	$result->close();
}


//calling the main function
main();
?>