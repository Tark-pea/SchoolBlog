<?php
  $url = '/home/';
  // Connect to the database
  $connection = mysqli_connect("localhost", "root", "", "npfhdatabase");

  // Get the comment from the form submission
  $comment = mysqli_real_escape_string($connection, $_POST['comment']);
  $story_id = 1;
  $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);

  // Insert the comment into the database
  $query = "INSERT INTO comments (comment, story_id, user_id) VALUES ('$comment', '$story_id', '$user_id')";
  mysqli_query($connection, $query);

  // Redirect the user back to the story page
  //header("Location: story.php?id=$user_id");
  header( "Location: $url" );
?>
