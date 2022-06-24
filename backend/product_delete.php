<?php
include("../server.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM tb_product WHERE id=$id");

header("Location: index.php");
?>

