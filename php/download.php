<?php

if(isset($_GET['id'])) 
{
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// if id is set then get the file with the id from database
	$id = $_GET['id'];

	// making the querry
	$dbQuery = "SELECT post_document_name, post_document_type, post_document_size, post_document_content FROM Posts WHERE post_id='".mysqli_real_escape_string($conn,$id). "'";
	$result = $conn->query($dbQuery);
	
	// checking for errors
	if(!$result) {
		echo "Error: " . $dbQuery . "<br>" . $conn->error;
		die();
	}

	$row = $result->fetch_array();

	//document does not exist
	if(!$row) {
		echo "Wrong ID was specified the document does not exsit in the database";
		die();
	}

	
	list($name, $type, $size, $content) = $row;

	header("Content-length: $size");
	header("Content-type: $type");
	header("Content-Disposition: attachment; filename=$name");
	echo $content;
	exit;
} else {
	die("no id was set for the download page");
}

?>