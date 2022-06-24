<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>

<?php if (isset($_SESSION['success'])) : ?>
    <div class="success">
        <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </h3>
    </div>
<?php endif ?>

<?php
include_once('server.php');

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id=$id");
$result2 = mysqli_query($conn, "SELECT * FROM orders WHERE user_id=$id");

while ($res = mysqli_fetch_array($result)) {
    $username = $res['username'];
    $password = $res['password'];
    $email = $res['email'];
    $address = $res['address'];
    $tel = $res['tel'];
    $status = $res['status'];
}

while ($res2 = mysqli_fetch_array($result2)) {
    $OrderID = $res2['OrderID'];
    $user_id = $res2['user_id'];
}

?>

<?php include_once('header.php') ?>

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

                    <?php if ($_SESSION["status"] == 1) { ?>
                        <a href="home.php" class="nav-item nav-link active">หน้าหลัก</a>
                        <a href="product-list.php" class="nav-item nav-link">สินค้า</a>
                        <a href="backend/index.php" class="nav-item nav-link">สำหรับแอดมิน</a>
                    <?php } else { ?>
                        <a href="home.php" class="nav-item nav-link active">หน้าหลัก</a>
                        <a href="product-list.php" class="nav-item nav-link">สินค้า</a>

                    <?php } ?>

                </div>
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <!--  notification message -->

                        <?php if (isset($_SESSION['username'])) : ?>
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">ยินดีต้อนรับ คุณ <?php echo $_SESSION['username']; ?></a>
                        <?php endif ?>

                        <div class="dropdown-menu">
                            <a href="my-account.php?id=<?php echo $_SESSION['id']; ?>" class="dropdown-item">โปรไฟล์</a>
                            <a href="backend/select-list/clear.php" class="dropdown-item">ออกจากระบบ</a>
                        </div>
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
                    <a href="home.php">
                        <img src="img/logo.jpg" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-3">
                <div class="user">
                    <a href="cart.php" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>(0)</span>
                    </a>
                </div>
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
            <li class="breadcrumb-item active">โปรไฟล์</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- My Account Start -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="account-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-user"></i>โปรไฟล์</a>
                    <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>สินค้าที่สั่ง</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                        <h4>ข้อมูลส่วนตัว</h4>
                        <div class="row">

                            <div class="col-md-12">
                                <p>ชื่อ : <?php echo $username; ?></p>
                                <p>อีเมล : <?php echo $email; ?></p>
                                <p>ที่อยู่ : <?php echo $address; ?></p>
                                <p>เบอร์โทรศัพน์ : <?php echo $tel; ?></p>
                                <a class="nav-link" id="edit-nav" data-toggle="pill" href="#edit-tab" role="tab">แก้ไข</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="edit-tab" role="tabpanel" aria-labelledby="edit-tab">
                        <h4>แก้ไขข้อมูลส่วนตัว</h4>

                        <form name="form1" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <input class="form-control" type="hidden" placeholder="Status" name="id" value="<?php echo $_GET['id']; ?>">
                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="First Name" name="username" value="<?php echo $username; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="Email" name="email" value="<?php echo  $email; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" placeholder="Mobile" name="tel" value="<?php echo  $tel; ?>" required>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" placeholder="Address" name="address" value="<?php echo  $address; ?>" required>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="hidden" placeholder="Password" name="password" value="<?php echo  $password; ?>" required>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="hidden" placeholder="Status" name="status" required>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn" type="submit" name="upd_user">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade " id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>สินค้า</th>
                                        <th>จำนวน</th>
                                        <th>ราคา</th>
                                        <th>วันที่สั่ง</th>
                                        <th>สถานะ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $Total = 0;
                                    $SumTotal = 0;

                                    $strSQL2 = "SELECT * FROM orders_detail WHERE user_id = $id ";
                                    $objQuery2 = mysqli_query($conn, $strSQL2);

                                    while ($objResult2 = mysqli_fetch_array($objQuery2, MYSQLI_ASSOC)) {

                                        $strSQL3 = "SELECT * FROM tb_product WHERE id = '" . $objResult2["ProductID"] . "' ";
                                        $objQuery3 = mysqli_query($conn, $strSQL3);
                                        $objResult3 = $objResult = mysqli_fetch_array($objQuery3, MYSQLI_ASSOC);
                                        $Total = $objResult2["Qty"] * $objResult3["pice"];
                                        $SumTotal = $SumTotal + $Total;

                                        $strSQL = "SELECT * FROM orders WHERE user_id = $id AND OrderID=" . $objResult2["OrderID"] . " ";
                                        $objQuery = mysqli_query($conn, $strSQL);
                                        while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
                                    ?>
                                            <tr>
                                                <td><?= $objResult3["name"]; ?></td>
                                                <td><?= $objResult2["Qty"]; ?> ชิ้น</td>
                                                <td><?= number_format($Total, 2); ?></td>
                                                <td><?= $objResult['OrderDate']; ?></td>
                                                <td class="btn">
                                                    <?php
                                                    if ($objResult['confirm_order'] == '0') {
                                                        echo "รอยืนยัน";
                                                    } else if ($objResult['confirm_order'] == '1') {
                                                        echo "เตรียมจัดส่ง";
                                                    } else if ($objResult['confirm_order'] == '2') {
                                                        echo "จัดส่งแล้ว";
                                                    } else {
                                                        echo "สำเร็จ";
                                                    }
                                                    ?>
                                                </td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
                            </table>
                            <?php
                            mysqli_close($conn);
                            ?>
                            </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account End -->

<?php include('footer.php') ?>

<?php

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
        }
        "<font color='red'>status field is empty.</font><br/>";
    } else {
        //updating the table
        $result = mysqli_query($conn, "UPDATE tb_user SET username='$username',password='$password',email='$email',address='$address',tel='$tel',status=0 WHERE id=$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: my-account.php?id=$id");
    }
}
?>