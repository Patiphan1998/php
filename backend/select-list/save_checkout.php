<?php
session_start();

include_once("../../server.php");

$Total = 0;
$SumTotal = 0;
$SumTotal2 = 0;
$sh_cost = 300;


$strSQL = "
	INSERT INTO orders (OrderDate,Name,Address,Tel,Email,user_id,confirm_order)
	VALUES
	('" . date("Y-m-d H:i:s") . "','" . $_POST["txtName"] . "','" . $_POST["txtAddress"] . "' ,'" . $_POST["txtTel"] . "','" . $_POST["txtEmail"] . "','" . $_POST["txtUser_id"] . "',0) 
  ";
$objQuery = mysqli_query($conn, $strSQL);
if (!$objQuery) {
	echo $conn->error;
	exit();
}

$strOrderID = mysqli_insert_id($conn);

for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
	if ($_SESSION["strId"][$i] != "") {
		$strSQL = "
				INSERT INTO orders_detail (OrderID,ProductID,Qty,user_id)
				VALUES
				('" . $strOrderID . "','" . $_SESSION["strId"][$i] . "','" . $_SESSION["strQty"][$i] . "','" . $_POST["txtUser_id"] . "') 
			  ";
		mysqli_query($conn, $strSQL);
	}
}

unset($_SESSION["intLine"]);
unset($_SESSION["strId"][$i]);

mysqli_close($conn);

header("location: ../../my-account.php?id=" . $_POST["txtUser_id"] . "");
