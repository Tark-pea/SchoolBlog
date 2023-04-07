<?php
session_start();
if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true){
	header("location: /login/");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "npfhdatabase";

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$story_id = $_GET['id'];


//$approve_query = "UPDATE storys SET status = 1 WHERE id = $story_id";
//mysqli_query($conn, $approve_query);

$story_query = "SELECT * FROM storys WHERE id = $story_id";
$story_result = mysqli_query($conn, $story_query);
    

 //   if (!$story_result) {
 //       echo "Could not successfully run query ($story_query) from DB: " . mysqli_error();
 //       exit;
 //   }
    
 //   if (mysqli_num_rows($story_result) == 0) {
 //       echo "No rows found, nothing to print so am exiting";
 //       exit;
 //   }

    // While a row of data exists, put that row in $row as an associative array
    // Note: If you're expecting just one row, no need to use a loop
    // Note: If you put extract($row); inside the following loop, you'll
    //       then create $userid, $fullname, and $userstatus
 //   while ($row = mysqli_fetch_assoc($story_result)) {
 //       echo $row["id"];
 //       echo $row["title"];
 //       echo $row["name"];
  //      echo $row["story"];
  //  }
$story_result = mysqli_fetch_assoc($story_result);
$next_id_query = "SELECT MAX(id) + 1 FROM savedstories";
$next_id_result = mysqli_query($conn, $next_id_query);
$next_id = mysqli_fetch_array($next_id_result)[0];
//$story_url = "/view/story$next_id";
//echo "nextid: " . $next_id;

//$save_story_query = "INSERT INTO savedstories (id, title, author, story) VALUES ($next_id, '{$row["title"]}', '{$row["name"]}', '{$row["story"]}')";
//$save_story_query = "INSERT INTO savedstories (id, title, author, story) VALUES ($next_id, '{$story_result["title"]}', 2, 2)";
$save_story_query = "INSERT INTO savedstories (id, title, author, story) VALUES ($next_id, '{$story_result["title"]}', '{$story_result["name"]}', '{$story_result["story"]}')";
mysqli_query($conn, $save_story_query);
//if (!mysqli_query($conn, $save_story_query)) {
//    echo "Error: " . mysqli_error($conn);
//}
$delete_story = "DELETE FROM storys WHERE id =$story_id";
mysqli_query($conn, $delete_story);
if (!$story_result) { die("Story Result Query failed: " . mysqli_error($conn)); }
if (!$next_id_result) { die("Next ID Query failed: " . mysqli_error($conn)); }


header('Location: approved.php');
?>
