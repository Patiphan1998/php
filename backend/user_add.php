<?php
session_start();
include_once("../server.php");

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_POST['addUser'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$tel = mysqli_real_escape_string($conn, $_POST['tel']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);


	if (empty($username) || empty($password) || empty($email) || empty($address) || empty($tel) || empty($status)) {

		if (empty($username)) {
			echo "<font color='red'>username field is empty.</font><br/>";
		}
		if (empty($password)) {
			echo "<font color='red'>password field is empty.</font><br/>";
		}
		if (empty($email)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}
		if (empty($address)) {
			echo "<font color='red'>address field is empty.</font><br/>";
		}
		if (empty($tel)) {
			echo "<font color='red'>tel field is empty.</font><br/>";
		}
		if (empty($status)) {
			echo "<font color='red'>status field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty) 
            $password = md5($password_1);

		//insert data to database	
		$result = mysqli_query($conn, "INSERT INTO tb_user (username,password,email,address,tel,status) VALUES('$username','$password','$email','$address','$tel','$status')");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
		header("Location: user_show.php");
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
                    <a href="user_show.php" class="nav-item nav-link active">แสดงข้อมูลผู้ใช้งาน</a>
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
                    <h1>เพิ่มข้อมูลผู้ใช้งาน</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <hr>

	<form method="post" name="form1" enctype="multipart/form-data">
		<table width="100%" border="1">
			<tr>
				<td>ชื่อผู้ใช้งาน</td>
				<td><input type="text" name="username" required></td>
			</tr>
			<tr>
				<td>รหัสผ่าน</td>
				<td><input type="password" name="password" required></td>
			</tr>
			<tr>
				<td>email</td>
				<td><input type="email" name="email" required></td>
			</tr>
			<tr>
				<td>ที่อยู่</td>
				<td><textarea type="text" name="address" required></textarea></td>
			</tr>
			<tr>
				<td>เบอร์โทร</td>
				<td><input type="text" name="tel" required></td>
			</tr>
			<tr>
				<td>สถานะ</td>
				<td><input type="text" name="tel" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="addUser" value="ตกลง"></td>
			</tr>
		</table>
	</form>
</div>