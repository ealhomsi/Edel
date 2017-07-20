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

//getting something from database Users
function querrySomethingFromUsers($search, $which, $column) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Users WHERE ". mysqli_real_escape_string($conn,$which) ." = '".mysqli_real_escape_string($conn,$search). "'";
	$result = $conn->query($dbQuery);

	// checking for errors
	if(!$result) {
		echo "Error: " . $dbQuery . "<br>" . $conn->error;
		die();
	}

	//if $result is successful
	$row = $result->fetch_array();  //by now they should have the same email address

	if(!$row) {
		die('FATAL: user was not found find this' . $seatch . ' which is ' . $which .  ' and give me back '. $column);
	}

	// free the results array
	$result->close();
	
	return $row[$column];
}

//getting something from database Posts
function querrySomethingFromPosts($search, $which, $column) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Posts WHERE ". mysqli_real_escape_string($conn,$which) ." = '".mysqli_real_escape_string($conn,$search) . "'";
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

//getting something from database Posts
function querrySomethingFromTags($search, $which, $column) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Tags WHERE ". mysqli_real_escape_string($conn,$which) ." = '".mysqli_real_escape_string($conn,$search) . "'";
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

//getting something from database
function querryLastTag($column) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Tags ORDER BY tag_id DESC LIMIT 1";
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
	$dbQuery = "SELECT post_id, post_type, post_date, user_id, post_rating, post_text FROM Posts INNER JOIN ChildrenPosts ON ChildrenPosts.child_post_id = Posts.post_id WHERE father_post_id='".mysqli_real_escape_string($conn,$id). "'";

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

//this function would return the last result
// 0 means that the user did nothing yet to the post
// 1 means that the user did upvote the post
//-1 means that the user down vote the post
function checkUserStatus($postID, $userID) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// querry the 
	// making the querry
	$dbQuery = "SELECT * From Votes WHERE post_id=".mysqli_real_escape_string($conn,$postID). " AND user_id=". mysqli_real_escape_string($conn,$userID);

	$result = $conn->query($dbQuery);
	
	$row = $result->fetch_array();

    //closing the connection 
    $conn->close();

    if($row) {
    	//the vote was already registered
    	return $row['vote_value'];
    }
    return 0;
}

//delete the user pariticpation on a specific post
function deleteUserParticipation($postID, $userID, $value) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "DELETE From Votes WHERE post_id=".mysqli_real_escape_string($conn,$postID). " AND user_id=". mysqli_real_escape_string($conn,$userID);

	$result = $conn->query($dbQuery);
	
	// checking for errors
	if(!$result) {
		echo "Error: " . $dbQuery . "<br>" . $conn->error;
		die();
	}

    //closing the connection 
    $conn->close();

    //get the rating
   	$rating = querrySomethingFromPosts($postID, 'post_id', 'post_rating');
   	$rating = $rating + $value;

   	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
    $dbQuery = 'UPDATE  Posts SET post_rating='. mysqli_real_escape_string($conn,$rating) .  ' WHERE post_id=' . mysqli_real_escape_string($conn,$postID) ;

	$result = $conn->query($dbQuery);
	
	// checking for errors
	if(!$result) {
		echo "Error: " . $dbQuery . "<br>" . $conn->error;
		die();
	}

    //closing the connection 
    $conn->close();
}

//format post
function formatPost($row, $level) {
	//printing the title and by which user
	echo "<strong>";
	echo $level . "<h4 style='display:inline;'>" . $row['post_type'] . "</h4> by <i> user id " . $row['user_id'] . " </i> <br>"; 
	echo "</strong>";

	//printing the text
	echo $level . '<a href="../php/upRatePost.php?ratedPostID='. $row['post_id'] . '"> <img style="width:1em;" src="../images/arrowUp.png"> </a>';
	echo '<span>' . $row['post_rating'] . '</span>';

	echo '<a href="../php/downRatePost.php?ratedPostID='. $row['post_id'] . '"> <img style="width:1em;" src="../images/arrowDown.png"> </a>';
	echo "".$row['post_text'];
	echo "<br>";

	$currentPostID = $row['post_id'];


	//add a list of tags
	$tagsArray = listOfTags($currentPostID);
	$tagsNames = array();
	$i = 0;

	foreach($tagsArray as $value) {
		$tagsNames[$i] = $value[0];
		$i++;
	}
	$tagsLine = implode(", ", $tagsNames);
	echo $level . "tags: " . $tagsLine . " <br> ";

	//printing the reply to this button
	echo '<form method=post action="../php/createSubPost.php">';
	echo $level ."<input style='display:inline;' type=text name='reply". $currentPostID ."'><br>";
	echo '<input type=text value=' .$currentPostID . ' name="fatherPostID" style="display:none;">';
	echo $level . "<input style='display:inline;' type='submit' value='reply'>";
	echo "<br>";
	echo '</form>';	
}

//print hirearchy post 
function printPost2($row, $level) {
	$width = 80 - ($level * 5);
	#this is where we print the post
	$rating = $row['post_rating'];
	$postID = $row['post_id'];
	$postText = $row['post_text'];
	$postUserID = $row['user_id'];
	
	if($level > 3) {
		$level = 3;
	}

	$indentDate=  array(47, 35, 27, 17)[$level];

	$indentName = array(42, 32, 23, 12)[$level];
	$userName = querrySomethingFromUsers($postUserID, 'user_id' , 'user_name');
	$date = $row['post_date'];
$result= <<< EOT
	<div class="printPost2" style="text-indent: ${level}em; width: ${width}%; ">
		<div class="leftPrintPost2">
			<div class="upArrow2"> <a href="../php/upRatePost.php?ratedPostID=$postID"> <img style="width:1em;" src="../images/arrowUp.png"> </a> </div>
			<div class="rating2" style="font-size:1em;"> <span> $rating </span> </div>
			<div class="downArrow2"> <a href="../php/downRatePost.php?ratedPostID=$postID"> <img style="width:1em;" src="../images/arrowDown.png"> </a> </div>
		</div>

		<!-- content -->
		<div class="rightPrintPost2">
			<div class="contentPrintPost2" style="width:100%; height:3em;">
				<p> $postText </p>
			</div>

			
EOT;
$result .= <<< EOT

				<div class="dateAndBy2" style="left:${indentDate}em; ">
					<span> $date </span> 
				</div>
				<div class="userName2" style="left:${indentName}em; ">
					<span > asked by $userName </span>
				</div>
		</div>

	
	</div>
EOT;

	echo $result;
	echo "<br>";
}

//print normal post
function printPost($row) {
	#this is where we print the post
	$rating = $row['post_rating'];
	$postID = $row['post_id'];
	$postText = $row['post_text'];
	$postUserID = $row['user_id'];
	$userName = querrySomethingFromUsers($postUserID, 'user_id' , 'user_name');
	$date = $row['post_date'];
$result= <<< EOT
	<div class="printPost">
		<div class="leftPrintPost">
			<div class="upArrow"> <a href="../php/upRatePost.php?ratedPostID=$postID"> <img style="width:1.5em;" src="../images/arrowUp.png"> </a> </div>
			<div class="rating"> <span> $rating </span> </div>
			<div class="downArrow"> <a href="../php/downRatePost.php?ratedPostID=$postID"> <img style="width:1.5em;" src="../images/arrowDown.png"> </a> </div>
		</div>

		<!-- content -->
		<div class="rightPrintPost">
			<div class="contentPrintPost">
				<p> $postText </p>
			</div>

			<div class="followupPrintPost">
				<div class="tags"> 
EOT;


    			$tagsArray = listOfTags($postID);
    			foreach($tagsArray as $oneTag) {
    				$result .= '<a href="tagPages.php?tagID=' . $oneTag[1]  .'">';
    				$result .='<li class="tags">' . $oneTag[0] . '</li>';
    				$result .=  '</a>';
    			}
$result .= <<< EOT
				</div>
				<div style="float:right; position: absolute; left:70em;">
					<div class="dateAndBy">
						<span> $date </span> 
					</div>
					<div class="userName">
						<span > asked by $userName </span>
					</div>
				</div>
				
			</div>
		</div>

	
	</div>
EOT;

	echo $result;
	echo "<br>";
}

//getting all uploaded posts
function listPostsUser($id) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Posts WHERE user_id='".mysqli_real_escape_string($conn,$id). "'";
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


//insertTag
function insertTag($value) {
	//being consistent
	$value = strtolower($value); 
	if($value == "") {
		$value = "empty";
	}


	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Tags WHERE tag_name='".mysqli_real_escape_string($conn,$value). "'";
	$result = $conn->query($dbQuery);

	$row = $result->fetch_array();

    //closing the connection 
    $conn->close();	

   	if($row) {
   		return $row['tag_id'];
   	} 
    
    //if it does not exist insert it
    //connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "INSERT INTO Tags (tag_name) VALUES ('".mysqli_real_escape_string($conn,$value). "')";
	$result = $conn->query($dbQuery);

	if(!$result) {
		die("error inserting a new tag of " . $value . " with this error " . $conn->error);
	}

    //closing the connection 
    $conn->close();	

    //now get the last id and return it
    $lastID = querryLastTag('tag_id');
    return $lastID;
}

//tag a post
function tagAPost($postID, $arrayOfTags) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');


	//multiple inserts
	foreach($arrayOfTags as $value) {		
		// making the querry
		$dbQuery = "INSERT INTO TagPosts (tag_id, post_id) VALUES (" . mysqli_real_escape_string($conn,$value) . " ," . mysqli_real_escape_string($conn,$postID) . ")";
		$result = $conn->query($dbQuery);

		if(!$result) {
			die("error inserting a new tagpost of " . $value . " with this error " . $conn->error);
		}
	}
	//closing the connection 
	$conn->close();	
}

//get a list of tags
function listOfTags($postID) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM TagPosts INNER JOIN Tags ON TagPosts.tag_id = Tags.tag_id WHERE post_id='".mysqli_real_escape_string($conn,$postID). "'";
	$result = $conn->query($dbQuery);

	if(!$result) {
			die("error listing tagpost of " . $value . " with this error " . $conn->error);
		}
	//checking the result array for results
	$row = $result->fetch_array();

	//tag names array
	$tagNames = array();
	$i = 0;
	while($row) {
		$tagNames[$i] = array("#".$row['tag_name'], $row['tag_id']);
		$i++;
		$row = $result->fetch_array();
	}
	
	//closing the connection 
	$conn->close();	

	//return stuff
	return $tagNames;
}


//get a list of posts following a tag
function listOfPostsRelatedToATag($tagID) {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM TagPosts INNER JOIN Posts ON TagPosts.post_id = Posts.post_id WHERE TagPosts.tag_id='".mysqli_real_escape_string($conn,$tagID). "'";
	$result = $conn->query($dbQuery);

	if(!$result) {
			die("error listing tagpost of " . $tagID . " with this error " . $conn->error);
		}
	//checking the result array for results
	$row = $result->fetch_array();

	//tag names array
	$posts = array();
	$i = 0;
	while($row) {
		$posts[$i] = $row;
		$i++;
		$row = $result->fetch_array();
	}
	
	//closing the connection 
	$conn->close();	

	//return stuff
	return $posts;
}

//return a list of all tags
function listOfAllTags() {
	//connecting to the database
	$conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');

	// making the querry
	$dbQuery = "SELECT * FROM Tags";
	$result = $conn->query($dbQuery);

	if(!$result) {
			die("error listing tagpost of " . $value . " with this error " . $conn->error);
		}
	//checking the result array for results
	$row = $result->fetch_array();

	//tag names array
	$tags = array();
	$i = 0;
	while($row) {
		$tags[$i] = array("#". $row['tag_name'], $row['tag_id']);
		$i++;
		$row = $result->fetch_array();
	}
	
	//closing the connection 
	$conn->close();	

	//return stuff
	return $tags;
}
?>