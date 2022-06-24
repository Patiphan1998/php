<?php
ini_set('display_errors', 1);
error_reporting(~0);

$strKeyword = null;

if (isset($_POST["txtKeyword"])) {
	$strKeyword = $_POST["txtKeyword"];
}
?>

<?php
include_once("server.php");
$result = mysqli_query($conn, "SELECT * FROM tb_product WHERE Name LIKE '%" . $strKeyword . "%' ");

?>

<!-- Featured Product Start -->
<div class="featured-product product">
	<div class="container-fluid">
		<div class="section-header">
			<h1>สินค้าพิเศษ</h1>
		</div>
		<div class="row align-items-center product-slider product-slider-4">
			<?php while ($row = mysqli_fetch_array($result)) {
				$qty = 1;
				if ($row["status"] == 1) {
			?>
					<div class="col-lg-3">
						<div class="product-item" style="width: 240px;">
							<div class="product-title">
								<a href="#"><?php echo $row["name"];  ?></a>
								<div class="ratting">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
							<div class="product-image">
								<a href="product-detail.html">
									<img style="width: 100%;height: 350px;" src="backend/upload/<?php echo $row["image"] ?>" alt="Product Image">
								</a>
								<div class="product-action">
									<a href="product-detail.php?id=<?= $row["id"]; ?>"><i class="fa fa-search"></i></a>
								</div>
							</div>
							<div class="product-price">
								<form action="backend/select-list/order.php" method="post">
									<h3><?php echo $row["pice"]; ?><span>฿</span></h3>
									<input type="hidden" name="txtId" value="<?php echo $row["id"]; ?>" size="2">
									<input type="hidden" name="txtQty" value="<?php echo $qty; ?>">
									<input class="btn" type="submit" value="ใส่ตะกร้า">
								</form>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>
<!-- Featured Product End -->