<html>
<head>
<title>ThaiCreate.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
include_once("../../server.php");

$strSQL = "SELECT * FROM orders WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>

 <table width="304" border="1">
    <tr>
      <td width="71">OrderID</td>
      <td width="217">
	  <?=$objResult["OrderID"];?></td>
    </tr>
    <tr>
      <td width="71">Name</td>
      <td width="217">
	  <?=$objResult["Name"];?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?=$objResult["Address"];?></td>
    </tr>
    <tr>
      <td>Tel</td>
      <td><?=$objResult["Tel"];?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?=$objResult["Email"];?></td>
    </tr>
    <tr>
      <td>User ID</td>
      <td><?=$objResult["user_id"];?></td>
    </tr>
  </table>

  <br>

<table width="400"  border="1">
  <tr>
    <td width="101">id</td>
    <td width="82">name</td>
    <td width="82">pice</td>
    <td width="79">quantity</td>
    <td width="79">Total</td>
  </tr>
<?php

$Total = 0;
$SumTotal = 0;
$SumTotal2 = 0;
$sh_cost = 300;

$strSQL2 = "SELECT * FROM orders_detail WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery2 = mysqli_query($conn,$strSQL2);

while($objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC))
{
		$strSQL3 = "SELECT * FROM tb_product WHERE id = '".$objResult2["ProductID"]."' ";
		$objQuery3 = mysqli_query($conn,$strSQL3);
		$objResult3 = $objResult = mysqli_fetch_array($objQuery3,MYSQLI_ASSOC);
		$Total = $objResult2["Qty"] * $objResult3["pice"];
		$SumTotal = $SumTotal + $Total;
    $SumTotal2 = $SumTotal + $sh_cost;

	  ?>
	  <tr>
		<td><?=$objResult2["ProductID"];?></td>
		<td><?=$objResult3["name"];?></td>
		<td><?=$objResult3["pice"];?></td>
		<td><?=$objResult2["Qty"];?></td>
		<td><?=number_format($Total,2);?></td>
	  </tr>
	  <?php
 }
  ?>
</table>
Sum Total <?php echo number_format($SumTotal2,2);?>

<?php
mysqli_close($conn);
?>
</body>
</html>

<?php /* This code download from www.ThaiCreate.Com */ ?>