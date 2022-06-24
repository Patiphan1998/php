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
$result = mysqli_query($conn, "SELECT * FROM orders WHERE Name LIKE '%" . $strKeyword . "%' ");

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
                    <h1>แสดงออร์เดอร์สินค้า</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <hr>

    <table width='100%' border=1>
        <tr bgcolor='#CCCCCC'>
            <td>ชื่อ</td>
            <td>ที่อยู่</td>
            <td>เบอร์โทรศัพน์</td>
            <td>Email</td>
            <td>วันที่</td>
            <td>สถานะสินค้า</td>
            <td>แก้ไข</td>
        </tr>

        <?php
        while ($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            // echo "<td>" . $res['OrderID'] . "</td>";
            echo "<td>" . $res['Name'] . "</td>";
            echo "<td>" . $res['Address'] . "</td>";
            echo "<td>" . $res['Tel'] . "</td>";
            echo "<td>" . $res['Email'] . "</td>";
            echo "<td>" . $res['OrderDate'] . "</td>";

            if ($res['Confirm_order'] == 0) {
                echo "<td>" . "รอยืนยัน" . "</td>";
            } else if ($res['Confirm_order'] == 1) {
                echo "<td>" . "เตรียมจัดส่ง" . "</td>";
            } else if ($res['Confirm_order'] == 2) {
                echo "<td>" . "จัดส่งแล้ว" . "</td>";
            } else {
                echo "<td>" . "สำเร็จ" . "</td>";
            }

            echo "<td><a href=\"order_edit.php?OrderID=$res[OrderID]\">Edit</a></td>";
        }
        ?>
    </table>

</div>