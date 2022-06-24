<?php
session_start();
?>
<html>

<head>
  <title>ThaiCreate.Com</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php

if (!isset($_SESSION["intLine"])) {
  echo "Cart Empty";
  exit();
}

include_once("../../server.php");

?>
<table width="400" border="1">
  <tr>
    <td width="101">Id</td>
    <td width="82">ProductName</td>
    <td width="82">pice</td>
    <td width="79">Qty</td>
    <td width="79">Total</td>
  </tr>
  <?php
  $Total = 0;
  $SumTotal = 0;

  for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
    if ($_SESSION["strId"][$i] != "") {
      $strSQL = "SELECT * FROM tb_product WHERE id = '" . $_SESSION["strId"][$i] . "' ";
      $objQuery = mysqli_query($conn, $strSQL);
      $objResult = $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
      $Total = $_SESSION["strQty"][$i] * $objResult["pice"];
      $SumTotal = $SumTotal + $Total;
  ?>
      <tr>
        <td><?= $_SESSION["strId"][$i]; ?></td>
        <td><?= $objResult["brand"]; ?></td>
        <td><?= $objResult["name"]; ?></td>
        <td><?= $objResult["pice"]; ?></td>
        <td><?= $objResult["quantity"]; ?></td>
        <td><?= $_SESSION["strQty"][$i]; ?></td>
        <td><?= number_format($Total, 2); ?></td>
      </tr>
  <?php
    }
  }
  ?>
</table>
Sum Total <?php echo number_format($SumTotal, 2); ?>
<br><br>
<form name="form1" method="post" action="save_checkout.php">
  <table width="304" border="1">
    <tr>
      <td width="71">Name</td>
      <td width="217"><input type="text" name="txtName"></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txtAddress"></textarea></td>
    </tr>
    <tr>
      <td>Tel</td>
      <td><input type="text" name="txtTel"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="txtEmail"></td>
    </tr>
  </table>
  <input type="submit" name="Submit" value="Submit">
</form>
<?php
mysqli_close($conn);
?>
</body>

</html>

<?php /* This code download from www.ThaiCreate.Com */ ?>