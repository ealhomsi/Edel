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
function querrySomething($id, $column) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Partners WHERE part_id='".$id. "'";
	$result = $conn->query($dbQuery);

	// checking for errors
	if(!$result) {
		echo "Error: " . $dbQuery . "<br>" . $conn->error;
		die();
	}

	//if $result is successful
	$row = $result->fetch_array();  //by now they should have the same email address

	if(!$row) {
		die('user was not found');
	}

	// free the results array
	$result->close();
	
	return $row[$column];
}

//getting all uploaded documents
function listPosts($id) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Posts WHERE part_id='".$id. "'";
	$result = $conn->query($dbQuery);

	$row = $result->fetch_array();
    $i = 0;
    while($row) {
    	$i++;
    	$postID = $row['post_id'];
    	$name = $row['post_text'];

    	echo "Post number " . $i . "<br>";
    	echo "post id " . $row['post_id'] . "<br>";
    	echo "post type " . $row['post_type'] . "<br>";
    	echo "post date uploaded " . $row['post_date_uploaded'] . "<br>";
    	echo "part id " . $row['part_id'] . "<br>";
    	echo '<a href="php/download.php?id=' . $postID . '">'. $name . '</a> <br>';
    	echo "post text " . $row['post_text'] . "<br>";
    	echo "<br> <br>";
    	$row = $result->fetch_array();
    }
}

//test
?>
