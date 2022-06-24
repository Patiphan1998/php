<?php
ob_start();
session_start();
	
  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strId"][$i] != "")
	  {
			$_SESSION["strQty"][$i] = $_POST["txtQty".$i];
	  }
  }
	
	header("location: ../../cart.php");

?>

<?php /* This code download from www.ThaiCreate.Com */ ?>