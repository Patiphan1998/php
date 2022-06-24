<?php
ob_start();
session_start();

if (isset($_GET["Line"])) {
	$Line = $_GET["Line"];
	$_SESSION["strId"][$Line] = "";
	$_SESSION["strQty"][$Line] = "";
}
header("location: ../../cart.php");
?>

<?php /* This code download from www.ThaiCreate.Com */ ?>