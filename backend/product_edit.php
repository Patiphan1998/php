<?php
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>

<?php
include_once("../server.php");

if (isset($_POST['update'])) {

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$brand = mysqli_real_escape_string($conn, $_POST['brand']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$pice = mysqli_real_escape_string($conn, $_POST['pice']);
	$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
	$product_detail = mysqli_real_escape_string($conn, $_POST['product_detail']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
	$image = $_FILES["image"]["name"];

	if (empty($brand) || empty($name) || empty($pice) || empty($quantity) || empty($product_detail) || empty($status)) {

		if (empty($brand)) {
			echo "<font color='red'>Brand field is empty.</font><br/>";
		}
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if (empty($pice)) {
			echo "<font color='red'>Pice field is empty.</font><br/>";
		}
		if (empty($quantity)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		if (empty($product_detail)) {
			echo "<font color='red'>Product Detail field is empty.</font><br/>";
		}
		if (empty($status)) {
			echo "<font color='red'>Product Detail field is empty.</font><br/>";
		}
	} else {
		$result = mysqli_query($conn, "UPDATE tb_product SET brand='$brand',name='$name',pice='$pice',quantity='$quantity',product_detail='$product_detail',image='$image',status='$status' WHERE id=$id");
		header("Location: index.php");
	}
}
?>
<?php
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM tb_product WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
	$brand = $res['brand'];
	$name = $res['name'];
	$pice = $res['pice'];
	$quantity = $res['quantity'];
	$product_detail = $res['product_detail'];
	$status = $res['status'];
	$image = $res['image'];
}
?>

<?php
include_once("header.php");
?>

<!-- Nav Bar Start -->
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="index.php" class="nav-item nav-link">หน้าหลัก</a>
                    <a href="product_add.php" class="nav-item nav-link active">เพิ่มสินค้า</a>
                    <a href="user_show.php" class="nav-item nav-link">แสดงข้อมูลผู้ใช้งาน</a>
                    <a href="promote_show.php" class="nav-item nav-link">แสดงโปรโมท</a>
                    <a href="orders_show.php" class="nav-item nav-link">แสดงออร์เดอร์</a>
                    <a href="promote_add.php" class="nav-item nav-link">เพิ่มรูปภาพโปรโมท</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">คุณ <?php echo $_SESSION['username']; ?></a>
                            <div class="dropdown-menu">
                                <a href="backend/select-list/clear.php" class="dropdown-item">ออกจากระบบ</a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->

<!-- Bottom Bar Start -->
<div class="bottom-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-3">
				<div class="logo">
					<a href="index.php">
						<img src="../img/logo.jpg" alt="Logo">
					</a>
				</div>
			</div>
			<div class="col-md-5">
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
</div>
<!-- Bottom Bar End -->

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">หน้าหลัก</a></li>
            <li class="breadcrumb-item"><a href="product_show.php">แสดงสินค้า</a></li>
            <li class="breadcrumb-item active">แก้ไขสินค้า</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<br>

<div class="container">
	<!-- Call to Action Start -->
	<div class="call-to-action">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-12">
					<h1>แก้ไขสินค้า</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- Call to Action End -->

	<hr>

	<form name="form1" method="post" enctype="multipart/form-data">
		<table width="100%" border="1">
			<tr>
				<td>สินค้า</td>
				<td><input type="text" name="brand" value="<?php echo $brand; ?>" required></td>
			</tr>
			<tr>
				<td>ชื่อสินค้า</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>" required></td>
			</tr>
			<tr>
				<td>ราคา</td>
				<td><input type="text" name="pice" value="<?php echo $pice; ?>" required></td>
			</tr>
			<tr>
				<td>จำนวน</td>
				<td><input type="text" name="quantity" value="<?php echo $quantity; ?>" required></td>
			</tr>
			<tr>
				<td>รายละเอียดสินค้า</td>
				<td><input type="text" name="product_detail" value="<?php echo $product_detail; ?>" required></td>
			</tr>
			<tr>
				<td>สถานะ</td>
				<td>
					<input type="text" name="status" value="<?php echo $status; ?>" required disabled>
					<select name="status" required>
						<option value="0">สินค้าทั่วไป</option>
						<option value="1">สินค้าพิเศษ</option>
						<option value="2">สินค้าล่าสุด</option>

					</select>
				</td>
			</tr>
			<tr>
				<td>รูปภาพ</td>
				<td><input type="file" name="image" value="<?php echo $image; ?>" required></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
				<td><input type="submit" name="update" value="ตกลง"></td>
			</tr>
		</table>
	</form>
</div>