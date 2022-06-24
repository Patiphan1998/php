<?php
ob_start(); 
session_start();

if (!isset($_SESSION["intLine"])) {
	if (isset($_POST["txtId"])) {
		$_SESSION["intLine"] = 0;
		$_SESSION["strId"][0] = $_POST["txtId"];
		$_SESSION["strQty"][0] = $_POST["txtQty"];

		header("location:../../cart.php");
	}
} else {
	$key = array_search($_POST["txtId"], $_SESSION["strId"]);
	if ((string)$key != "") {
		$_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + $_POST["txtQty"];
	} else {
		$_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		$intNewLine = $_SESSION["intLine"];
		$_SESSION["strId"][$intNewLine] = $_POST["txtId"];
		$_SESSION["strQty"][$intNewLine] = $_POST["txtQty"];
	}

	header("location:../../cart.php");
}
?>

<?php /* This code download from www.ThaiCreate.Com */ ?>