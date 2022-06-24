<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>
<?php
include_once("../server.php");

if (isset($_POST['addPromote'])) {
	$pro_name = mysqli_real_escape_string($conn, $_POST['pro_name']);
	$pro_status = mysqli_real_escape_string($conn, $_POST['pro_status']);
	move_uploaded_file($_FILES["pro_image"]["tmp_name"], "img_promote/" . $_FILES["pro_image"]["name"]);
	$pro_image = $_FILES["pro_image"]["name"];


	if (empty($pro_name) || empty($pro_status) || empty($pro_image)) {

		if (empty($pro_name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if (empty($pro_status)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if (empty($pro_image)) {
			echo "<font color='red'>image field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty) 

		//insert data to database	
		$result = mysqli_query($conn, "INSERT INTO tb_promote (pro_name,pro_image) VALUES('$pro_name','$pro_image')");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
		header("Location: promote_show.php");
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
                    <a href="product_add.php" class="nav-item nav-link">เพิ่มสินค้า</a>
                    <a href="user_show.php" class="nav-item nav-link">แสดงข้อมูลผู้ใช้งาน</a>
                    <a href="promote_show.php" class="nav-item nav-link">แสดงโปรโมท</a>
                    <a href="orders_show.php" class="nav-item nav-link">แสดงออร์เดอร์</a>
                    <a href="promote_add.php" class="nav-item nav-link active">เพิ่มรูปภาพโปรโมท</a>
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
                    <h1>เพิ่มรูปภาพโปรโมทสินค้า</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <hr>

    <form method="post" name="form1" enctype="multipart/form-data">
        <table width="100%" border="1">
            <tr>
                <td>ชื่อ</td>
                <td><input type="text" name="pro_name" required></td>
            </tr>
            <tr>
                <td>สถานะ</td>
                <td>
                    <select name="pro_status" id="pro_status" required>
                        <option value="0">ไม่ใช้งาน</option>
                        <option value="1">ใช้งาน</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>รูปภาพ</td>
                <td><input type="file" name="pro_image" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="addPromote" value="ตกลง"></td>
            </tr>
        </table>
    </form>
</div>