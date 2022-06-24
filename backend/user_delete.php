<?php
//including the database connection file
include("../server.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM tb_user WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location: user_show.php");
?>

