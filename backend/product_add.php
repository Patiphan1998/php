<?php
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>

<?php
include_once("../server.php");

if (isset($_POST['addProduct'])) {
	$brand = mysqli_real_escape_string($conn, $_POST['brand']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$pice = mysqli_real_escape_string($conn, $_POST['pice']);
	$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
	$product_detail = mysqli_real_escape_string($conn, $_POST['product_detail']);
	move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
	$image = $_FILES["image"]["name"];


	if (empty($brand) || empty($name) || empty($pice) || empty($quantity) || empty($product_detail) || empty($image)) {

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
			echo "<font color='red'>product detail field is empty.</font><br/>";
		}
		if (empty($image)) {
			echo "<font color='red'>Image field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty) 

		//insert data to database	
		$result = mysqli_query($conn, "INSERT INTO tb_product (brand,name,pice,quantity,product_detail,image) VALUES('$brand','$name','$pice','$quantity','$product_detail','$image')");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
		header("Location: index.php");
	}
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
	<form method="post" name="form1" enctype="multipart/form-data">
		<table width="100%" border="1">
			<tr>
				<td>แบรนด์</td>
				<td><input type="text" name="brand" required></td>
			</tr>
			<tr>
				<td>ชื่อสินค้า</td>
				<td><input type="text" name="name" required></td>
			</tr>
			<tr>
				<td>ราคาสินค้า</td>
				<td><input type="text" name="pice" required></td>
			</tr>
			<tr>
				<td>จำนวน</td>
				<td><input type="text" name="quantity" required></td>
			</tr>
			<tr>
				<td>รายละเอียดสินค้า</td>
				<td><textarea type="text" name="product_detail" required></textarea></td>
			</tr>
			<tr>
				<td>สถานะ</td>
				<td>
					<select name="status" required>
						<option value="0">สินค้าทั่วไป</option>
						<option value="1">สินค้าพิเศษ</option>
						<option value="2">สินค้าล่าสุด</option>

					</select>
				</td>
			</tr>
			<tr>
				<td>รูปภาพ</td>
				<td><input type="file" name="image" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="addProduct" value="ตกลง"></td>
			</tr>
		</table>
	</form>
</div>