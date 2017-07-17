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
	$user =  "";
	$password = "";
	$imei = "";
	$name = "";
	// fetch credentials thorugh post
	if(isset($_POST["userEmail"])){
		$user = $_POST["userEmail"];
	}
	if(isset($_POST["userPassword"])) {
		$password = $_POST["userPassword"];
	}
	if(isset($_POST["userImei"])) {
		$imei = $_POST["userImei"];
	}
	if(isset($_POST["userName"])) {
		$name = $_POST["userName"];
	}

	//create pp keys
	$keys = createPPKeys();

	//create hashed password
	$salt = generateSalt();
	$hash = hashPassword($password, $salt);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	// making the querry
	$dbQuery = "INSERT INTO Users (user_name, user_imei, user_email, user_hashed_password, user_salt, user_private_key, user_public_key)
VALUES ('" . $name . "', '" . $imei ."', '" . $user ."', '" . $hash ."', '" . $salt ."', '" . $keys['pri'] ."', '" . $keys['pub'] ."')";
	$result = $conn->query($dbQuery);

	// checking for errors
	if(!$result) {
		echo "Error: " . $dbQuery . "<br>" . $conn->error;
	}

	// clear the session
	unset($_SESSION["userName"]);
	unset($_SESSION["userID"]);

	
	//finding out the user id
	$dbQuery = "SELECT * FROM Users WHERE user_email='".$user. "' AND user_name='".$name . "'";
	$result = $conn->query($dbQuery);

	//error in the querry
 	if(!$result) {
 		die($conn->error);
 	}

	//if $result is successful
	$row = $result->fetch_array();  //by now they should have the same email address

	if(!$row) {
		die('FATAL: User was not found');
	}

	//set things
	$_SESSION['userID'] = $row['user_id'];
	$_SESSION['userName'] = $name;

	// free the results array
	$result->close();

	//forward back to the index page
	header("Location: https://localhost/new/index.php"); /* Redirect browser */
	exit();
}

//calling the main function
main();

?>