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
     //error no login
    if(!isset($_SESSION["userName"])){
        die("please login or register first");
    }


    //building querry to the database
    $dbQuery = "INSERT INTO Posts (user_id, post_type, post_date_uploaded, post_text) VALUES ('" . $_SESSION['userID'] . "', '" . $type ."', '" . $mysqltime ."', '" . $fileContent ."', '" . $_POST['docDescription'] ."', '" . $_FILES["fileToUpload"]["type"] . "', '" . $fileSize . "', '" . $fileName  ."')";
            

                //inserting
                $conn = new mysqli('localhost','boubou','boubou','edel') or die('Error connecting to MySQL server.');
                $result = $conn->query($dbQuery);

                if(!$result) {
                    die("something went wrong" . $conn->error);
                }
            } else {
                echo "the file is an image however was not uploaded";
                $uploadOk = 0;
            }
        }else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if($uploadOk) {
        echo "<br>Upload was successful!";
    } else {
        echo "<br>Upload failed!";
        
    }

    sleep(3);
    header("Location: https://localhost/new/profile.php"); /* Redirect browser */
        
}

//calling main()
main();
  
?>
