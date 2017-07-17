<?php
// this is a library of common functions

//function that generates private and public keys
function createPPKeys() {
	$config = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 1024,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
	);
    
	// Create the private and public key
	$res = openssl_pkey_new($config);

	// Extract the private key from $res to $privKey
	openssl_pkey_export($res, $privKey);

	// Extract the public key from $res to $pubKey
	$pubKey = openssl_pkey_get_details($res);
	$pubKey = $pubKey["key"];

	$results = array (
		"pub" => $pubKey,
		"pri" => $privKey
		);

	return $results;
}


//function that generates salt
function generateSalt() {
	$numberOfDesiredBytes = 16;
	$salt = random_bytes($numberOfDesiredBytes);
	return $salt;
	}

//function that hashes passwords
function hashPassword($password, $salt) {
	$result = password_hash($password . $salt, PASSWORD_DEFAULT);
	return $result;
}

//function thatverifies passwords
function verifyPassword($password, $hash, $salt) {
	//verify a password
	return password_verify($password . $salt, $hash);
}

//signing file contents
function signFile($fileContent, $privKey) {
	//compute signature
	//openssl_sign($fileContent, $signature, $privKey);

	//return $signature;

	return $fileContent;
}

//getting something from database
function querrySomethingFromUsers($search, $which, $column) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Users WHERE ". $which ." = '".$search. "'";
	$result = $conn->query($dbQuery);

	// checking for errors
	if(!$result) {
		echo "Error: " . $dbQuery . "<br>" . $conn->error;
		die();
	}

	//if $result is successful
	$row = $result->fetch_array();  //by now they should have the same email address

	if(!$row) {
		die('FATAL: user was not found');
	}

	// free the results array
	$result->close();
	
	return $row[$column];
}

//getting something from database
function querryLastPost($column) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Posts ORDER BY post_id DESC LIMIT 1";
	$result = $conn->query($dbQuery);

	// checking for errors
	if(!$result) {
		echo "Error: " . $dbQuery . "<br>" . $conn->error;
		die();
	}

	//if $result is successful
	$row = $result->fetch_array();  //by now they should have the same email address

	if(!$row) {
		die('FATAL: user was not found');
	}

	// free the results array
	$result->close();
	
	return $row[$column];
}

//getting all Posts related to a specific post id
//input $id is really the father post id gotton from the relation ship
function listChildrenPosts($id) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT post_id, post_type, post_date, user_id, post_rating, post_text FROM Posts INNER JOIN ChildrenPosts ON ChildrenPosts.child_post_id = Posts.post_id WHERE father_post_id='".$id. "'";

	if($id == "null") {
		$dbQuery = "SELECT post_id, post_type, post_date, user_id, post_rating, post_text FROM Posts INNER JOIN ChildrenPosts ON ChildrenPosts.child_post_id = Posts.post_id WHERE father_post_id is null";
	}
	$result = $conn->query($dbQuery);
	
	// filling up the listing array
	$listing = array();
	$i = 0;
	$row = $result->fetch_array();
    while($row) {
    	$listing[$i] = $row;
    	$i++;
    	$row = $result->fetch_array();
    }

    //closing the connection 
    $conn->close();

    return $listing;
}

//format post
function formatPost($row, $level) {
	//printing the title and by which user
	echo "<strong>";
	echo $level . "<h4 style='display:inline;'>" . $row['post_type'] . "</h4> by <i> user id " . $row['user_id'] . " </i> <br>"; 
	echo "</strong>";

	//printing the text
	echo $level . "" . $row['post_text'];
	echo "<br>";

	$currentPostID = $row['post_id'];
	//printing the reply to this button
	echo '<form method=post action="../php/createSubPost.php">';
	echo $level . "<input style='display:inline;' type=text name='reply". $currentPostID ."'><br>";
	echo '<input type=text value=' .$currentPostID . ' name="fatherPostID" style="display:none;">';
	echo $level . "<input style='display:inline;' type='submit' value='reply'>";
	echo "<br>";
	echo '</form>';	
}

//print normal post
function printPost($row) {
	$level = "";
	//printing the title and by which user
	echo "<strong>";
	echo $level . "<h4 style='display:inline;'>" . $row['post_type'] . "</h4> by <i> user id " . $row['user_id'] . " </i> <br>"; 
	echo "</strong>";

	//printing the text
	echo $level . "" . $row['post_text'];
	echo "<br>";
}

//getting all uploaded posts
function listPostsUser($id) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Posts WHERE user_id='".$id. "'";
	$result = $conn->query($dbQuery);

	$row = $result->fetch_array();
    $i = 0;
    $listing = array();
    while($row) {
    	$listing[$i] = $row;
    	$i++;
    	$row = $result->fetch_array();
    }
    //closing the connection 
    $conn->close();

    return $listing;
}

?>