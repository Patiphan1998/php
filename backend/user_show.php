<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<?php
ini_set('display_errors', 1);
error_reporting(~0);

$strKeyword = null;

if (isset($_POST["txtKeyword"])) {
    $strKeyword = $_POST["txtKeyword"];
}
?>

<?php
include_once("../server.php");
$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username LIKE '%" . $strKeyword . "%' ");
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
                <div class="search">
                    <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                        <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword; ?>">
                        <button type="submit" value="Search"><i class="fa fa-search"></i></button>
                    </form>
                </div>
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
                    <h1>แสดงรายชื่อผู้ใช้งาน</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <hr>

    <table width='100%' border=1>
        <tr bgcolor='#CCCCCC'>
            <td>ชื่อผู้ใช้งาน</td>
            <td>Email</td>
            <td>ที่อยู่</td>
            <td>เบอร์โทรศัพน์</td>
            <td>สถานะ</td>
            <td>ปรับปรุง</td>

        </tr>
        <?php
        while ($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $res['username'] . "</td>";
            echo "<td>" . $res['email'] . "</td>";
            echo "<td>" . $res['address'] . "</td>";
            echo "<td>" . $res['tel'] . "</td>";
            if ($res['status'] == 1) {
                echo "<td>" . "ผู้ดูแลระบบ" . "</td>";
            } else {
                echo "<td>" . "ผู้ใข้งานทั่วไป" . "</td>";
            }

            echo "<td><a href=\"user_edit.php?id=$res[id]\">Edit</a> | <a href=\"user_delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</div>