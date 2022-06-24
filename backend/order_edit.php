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

	$OrderID = mysqli_real_escape_string($conn, $_POST['OrderID']);
	$Name = mysqli_real_escape_string($conn, $_POST['Name']);
	$Address = mysqli_real_escape_string($conn, $_POST['Address']);
	$Tel = mysqli_real_escape_string($conn, $_POST['Tel']);
	$Email = mysqli_real_escape_string($conn, $_POST['Email']);
	$Confirm_order = mysqli_real_escape_string($conn, $_POST['Confirm_order']);


	if (empty($OrderID) || empty($Name) || empty($Address) || empty($Tel) || empty($Email) || empty($Confirm_order)) {

		if (empty($OrderID)) {
			echo "<font color='red'>OrderID field is empty.</font><br/>";
		}
		if (empty($Name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if (empty($Address)) {
			echo "<font color='red'>Address field is empty.</font><br/>";
		}
		if (empty($Tel)) {
			echo "<font color='red'>Tel field is empty.</font><br/>";
		}
		if (empty($Email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if (empty($Confirm_order)) {
			echo "<font color='red'>Confirm_order field is empty.</font><br/>";
		}
	} else {
		$result = mysqli_query($conn, "UPDATE orders SET OrderID='$OrderID',OrderDate='" . date("Y-m-d H:i:s") . "',Name='$Name',Address='$Address',Tel='$Tel',Email='$Email',Confirm_order='$Confirm_order' WHERE OrderID=$OrderID");

		header("Location: orders_show.php");
	}
}
?>
<?php
$OrderID = $_GET['OrderID'];

$result = mysqli_query($conn, "SELECT * FROM orders WHERE OrderID=$OrderID");

while ($res = mysqli_fetch_array($result)) {
	$OrderID = $res['OrderID'];
	$Name = $res['Name'];
	$Address = $res['Address'];
	$Tel = $res['Tel'];
	$Email = $res['Email'];
	$OrderDate = $res['OrderDate'];
	$Confirm_order = $res['Confirm_order'];
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
                    <a href="product_add.php" class="nav-item nav-link">เพิ่มสินค้า</a>
                    <a href="user_show.php" class="nav-item nav-link">แสดงข้อมูลผู้ใช้งาน</a>
                    <a href="promote_show.php" class="nav-item nav-link">แสดงโปรโมท</a>
                    <a href="orders_show.php" class="nav-item nav-link active">แสดงออร์เดอร์</a>
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
            <li class="breadcrumb-item"><a href="orders_show.php">แสดงออร์เดอร์</a></li>
            <li class="breadcrumb-item active">แก้ไขออร์เดอร์</li>
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
					<h1>แกไขออร์เดอร์สินค้า</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- Call to Action End -->

	<hr>

	<form name="form1" method="post" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>ชื่อ</td>
				<td><input type="text" name="Name" value="<?php echo $Name; ?>" required></td>
			</tr>
			<tr>
				<td>ที่อยู่</td>
				<td><input type="text" name="Address" value="<?php echo $Address; ?>" required></td>
			</tr>
			<tr>
				<td>เบอร์โทรศัพน์</td>
				<td><input type="text" name="Tel" value="<?php echo $Tel; ?>" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="Email" value="<?php echo $Email; ?>" required></td>
			</tr>
			<tr>
			<tr>
				<td>สถานะออร์เดอร์</td>
				<td>
					<input type="text" name="Confirm_order" value="<?php echo $Confirm_order; ?>" required disabled>
					<select name="Confirm_order" required>
						<option value="0">รอยืนยัน</option>
						<option value="1">เตรียมจัดส่ง</option>
						<option value="2">จัดส่งแล้ว</option>
						<option value="3">สำเร็จ</option>

					</select>
				</td>
			</tr>

			<tr>
				<td><input type="hidden" name="OrderID" value=<?php echo $_GET['OrderID']; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</div>