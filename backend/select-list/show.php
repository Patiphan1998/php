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
<form action="update.php" method="post">
	<table width="400" border="1">
		<tr>
			<td width="101">Id</td>
			<td width="82">name</td>
			<td width="82">pice</td>
			<td width="79">Qty</td>
			<td width="79">Total</td>
			<td width="10">Del</td>
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
					<td><?= $objResult["name"]; ?></td>
					<td><?= $objResult["pice"]; ?></td>
					<td>
						<select name="txtQty<?php echo $i; ?>">
							<?php

							for ($qty = 1; $qty <= 20; $qty++) {
								$sel = "";
								if ($_SESSION["strQty"][$i] == $qty) {
									$sel = "selected";
								}
							?>
								<option value="<?php echo $qty; ?>" <?php echo $sel; ?> > <?php echo $qty; ?></option>
							<?php
							}
							?>
						</select>
					</td>
					<td><?= number_format($Total, 2); ?></td>
					<td><a href="delete.php?Line=<?= $i; ?>">x</a></td>
				</tr>
		<?php
			}
		}
		?>
	</table>
	<br>
	<table width="400" border="0">
		<tr>
			<td><input type="submit" value="Update"></td>
			<td align="right">Sum Total <?php echo number_format($SumTotal, 2); ?></td>
		</tr>
	</table>
</form>
<br><a href="product.php">Go to Product</a>
<?php
if ($SumTotal > 0) {
?>
	| <a href="checkout.php">CheckOut</a>
<?php
}
?>
<?php
mysqli_close($conn);
?>
</body>

</html>

<?php /* This code download from www.ThaiCreate.Com */ ?>