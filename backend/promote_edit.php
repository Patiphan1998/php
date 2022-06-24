<?php
// including the database connection file
include_once("../server.php");

if (isset($_POST['upd_promote'])) {

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$pro_name = mysqli_real_escape_string($conn, $_POST['pro_name']);
	move_uploaded_file($_FILES["pro_image"]["tmp_name"], "img_promote/" . $_FILES["pro_image"]["name"]);
	$pro_image = $_FILES["pro_image"]["name"];
	// checking empty fields

	if (empty($pro_name)) {

		if (empty($pro_name)) {
			echo "<font color='red'>pro_name field is empty.</font><br/>";
		}
	} else {
		//updating the table
		$result = mysqli_query($conn, "UPDATE tb_promote SET pro_name='$pro_name',pro_image='$pro_image' WHERE id=$id");

		//redirectig to the display page. In our case, it is index.php
		header("Location: promote_show.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM tb_promote WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
	$pro_name = $res['pro_name'];
	$pro_status = $res['pro_status'];
	$pro_image = $res['pro_image'];
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
                    <a href="promote_show.php" class="nav-item nav-link active">แสดงโปรโมท</a>
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
                    <h1>แก้ไขรายการโปรโมทสินค้า</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <hr>

	<form name="form1" method="post" enctype="multipart/form-data">
		<table border="0">
			<tr>
				<td>ชื่อ</td>
				<td><input type="text" name="pro_name" value="<?php echo $pro_name; ?>" required></td>
			</tr>
			<tr>
				<td>สถานะ</td>
				<td><input type="text" name="pro_status" value="<?php echo $pro_status; ?>" required>
					<select name="pro_status" id="pro_status" required>
						<option value="0">สินค้าทั่วไป</option>
						<option value="1">สินค้าแนะนำ</option>
						<option value="2">สินค้าล่าสุด</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>รูปภาพ</td>
				<td><input type="file" name="pro_image" value="<?php echo $pro_image; ?>" required></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
				<td><input type="submit" name="upd_promote" value="ตกลง"></td>
			</tr>
		</table>
	</form>
</div>