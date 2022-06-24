<html>

<head>
  <title>ThaiCreate.Com</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
ini_set('display_errors', 1);
error_reporting(~0);

include_once('../../server.php');
$result = mysqli_query($conn, "SELECT * FROM tb_product");

?>
<table width="450" border="1">
  <tr>
    <td width="101">Picture</td>
    <td width="101">ProductID</td>
    <td width="82">ProductBrand</td>
    <td width="82">ProductName</td>
    <td width="50">Price</td>
    <td width="50">Quantity</td>
    <td width="100">Cart</td>
  </tr>
  <?php
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  ?>
    <tr>
      <form action="order.php" method="post">
        <td><img src="backend/upload/ <?php echo $row["image"]; ?>"></td>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["brand"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["pice"]; ?></td>
        <td><?php echo $row["quantity"]; ?></td>
        <td>
          <input type="hidden" name="txtId" value="<?php echo $row["id"]; ?>" size="2">
          <select name="txtQty">
            <?php for ($qty = 1; $qty <= $row["quantity"]; $qty++) {
            ?>
              <option value="<?php echo $qty; ?>"><?php echo $qty; ?></option>
            <?php
            }
            ?>
          </select>
          <input type="submit" value="Add">
        </td>
      </form>
    </tr>
  <?php
  }
  ?>
</table>
<br><br><a href="show.php">View Cart</a> | <a href="clear.php">Clear Cart</a>
<?php
mysqli_close($conn);
?>
</body>

</html>

<?php /* This code download from www.ThaiCreate.Com */ ?>