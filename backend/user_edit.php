<?php
session_start();
// including the database connection file
include_once("../server.php");
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_POST['upd_user'])) {

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$tel = mysqli_real_escape_string($conn, $_POST['tel']);
	if (empty($username) || empty($password) || empty($email) || empty($address) || empty($tel)) {

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
		}"<font color='red'>status field is empty.</font><br/>";
		
	} else {
		//updating the table
		$result = mysqli_query($conn, "UPDATE tb_user SET username='$username',password='$password',email='$email',address='$address',tel='$tel',status=0 WHERE id=$id");

		//redirectig to the display page. In our case, it is index.php
		header("Location: user_show.php");
	}
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
	$username = $res['username'];
	$password = $res['password'];
	$email = $res['email'];
	$address = $res['address'];
	$tel = $res['tel'];
	$status = $res['status'];
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

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">หน้าหลัก</a></li>
            <li class="breadcrumb-item"><a href="user_show.php">ข้อมูลผู้ใช้</a></li>
            <li class="breadcrumb-item active">แก้ไขข้อมูลผู้ใช้</li>
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
                    <h1>เพิ่มรูปภาพโปรโมทสินค้า</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <hr>


    <form name="form1" method="post" enctype="multipart/form-data">
        <table width="100%" border="1">
            <tr>
                <td>username</td>
                <td><input type="text" name="username" value="<?php echo $username; ?>" required></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="text" name="password" value="<?php echo $password; ?>" required></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" name="email" value="<?php echo $email; ?>" required></td>
            </tr>
            <tr>
                <td>address</td>
                <td><input type="text" name="address" value="<?php echo $address; ?>" required></td>
            </tr>
            <tr>
                <td>tel</td>
                <td><input type="text" name="tel" value="<?php echo $tel; ?>" required></td>
            </tr>
            <tr>
                <td>status</td>
                <td><input type="text" name="status" value="<?php echo $status; ?>" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="upd_user" value="Update"></td>
            </tr>
        </table>
    </form>
</div>