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
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get stories from the database
$sql = "SELECT * FROM storys";
$result = mysqli_query($conn, $sql);
$comSql = "SELECT * FROM comments";
$comResult = mysqli_query($conn, $comSql);
?>
<html>
<head>
  <title>Admin Page</title>
  <link rel="stylesheet"  href="adminCSS.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<nav>
	  <ul>
		<li><a href="/home"><i class="fa fa-home"> </i> Home</a></li>	
		<li><a href="/about"><i class="fa fa-info-circle"> </i> About</a></li>
		<li><a href="/write"><i class="fa fa-file"> </i> Write</a></li>
		<li><a href="/view"><i class="fa fa-globe"> </i> View</a></li>
		<li><a href="/contact"><i class="fa fa-envelope-o"> </i> Contact</a></li>
	  </ul>
	</nav>
	<h1>Welcome to the Admin Page</h1>
    <p>You are logged in as an admin.</p>
    <a href="logout.php">Logout</a>
    
    <style>table {
    width: 100%;
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #ddd;
  }</style>
  <h2>Submitted Stories For Approval</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <!--<th>Author</th>-->
        <th>Story</th>
        <th>Actions</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row["id"]; ?></td>
          <td><?php echo $row["title"]; ?></td>
          <!--<td><?php echo $row["name"]; ?></td>-->
          <td><?php echo $row["story"]; ?></td>
          <td>
            <a href="approve_story.php?id=<?php echo $row["id"]; ?>">Approve</a>
            |
            <a href="delete_story.php?id=<?php echo $row["id"]; ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>
      <!--
    </table>
     
    <h2>Comments</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Story ID</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Actions</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($comResult)) { ?>
        <tr>
          <td><?php echo $row["id"]; ?></td>
          <td><?php echo $row["story_id"]; ?></td>
          <td><?php echo $row["user_id"]; ?></td>
          <td><?php echo $row["comment"]; ?></td>
          
          
          <td>
            <a href="approve_comment.php?id=<?php echo $row["id"]; ?>">Approve</a>          
            |
            <a href="delete_comment.php?id=<?php echo $row["id"]; ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </table>-->
</body>
</html>
<?php

mysqli_close($conn);
?>
