<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<?php
ini_set('display_errors', 0);
error_reporting(~0);

$strKeyword = null;

if (isset($_POST["txtKeyword"])) {
    $strKeyword = $_POST["txtKeyword"];
}
?>

<?php

if (!isset($_SESSION["intLine"])) {
    echo '<script type="text/javascript">';
    echo ' alert("ไม่มีสินค้าในตะกร้า")';
    echo '</script>';
}

?>

<?php

include_once("server.php");
$result = mysqli_query($conn, "SELECT * FROM tb_product WHERE Name LIKE '%" . $strKeyword . "%' ");

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

                    <?php if ($row = mysqli_fetch_array($result)) { ?>

                        <?php if ($_SESSION["status"] == 1) { ?>
                            <a href="home.php" class="nav-item nav-link">หน้าหลัก</a>
                            <a href="product-list.php" class="nav-item nav-link">สินค้า</a>
                            <a href="backend/index.php" class="nav-item nav-link">สำหรับแอดมิน</a>
                        <?php } else { ?>
                            <a href="home.php" class="nav-item nav-link">หน้าหลัก</a>
                            <a href="product-list.php" class="nav-item nav-link">สินค้า</a>
                        <?php } ?>

                    <?php } ?>
                </div>
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <!--  notification message -->
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

                        <?php if (isset($_SESSION['username'])) : ?>
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">ยินดีต้อนรับ คุณ
                                <?php echo $_SESSION['username']; ?></a>
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
                        <span>(<?php echo (int)$_SESSION["intLine"]+1 ?>)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->

<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <form action="backend/select-list/update.php" method="post">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>สินค้า</th>
                                        <th>ราคา</th>
                                        <th>จำนวน</th>
                                        <th>ราคารวม</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>

                                <?php
                                $Total = 0;
                                $SumTotal = 0;
                                $SumTotal2 = 0;
                                $sh_cost = 300;

                                if ($_SESSION["intLine"] >= 0) {
                                    for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
                                        if ($_SESSION["strId"][$i] != "") {
                                            $strSQL = "SELECT * FROM tb_product WHERE id = '" . $_SESSION["strId"][$i] . "' ";
                                            $objQuery = mysqli_query($conn, $strSQL);
                                            $objResult = $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
                                            $Total = $_SESSION["strQty"][$i] * $objResult["pice"];
                                            $SumTotal = $SumTotal + $Total;
                                            $SumTotal2 = $SumTotal + $sh_cost;

                                ?>
                                            <tbody class="align-middle">
                                                <tr>
                                                    <td>
                                                        <p><?= $i+1; ?></p>
                                                    </td>
                                                    <td>
                                                        <div class="img">
                                                            <a href="#"><img src="backend/upload/<?= $objResult["image"]; ?>" alt="Image"></a>
                                                            <p><?= $objResult["brand"]; ?>/<?= $objResult["name"]; ?></p>
                                                        </div>
                                                    </td>
                                                    <td><?= number_format($objResult["pice"]); ?></td>
                                                    <td>
                                                        <div class="qty">
                                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                            <input type="text" name="txtQty<?php echo $i; ?>" value="<?php echo $_SESSION["strQty"][$i]; ?>">
                                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                        </div>
                                                        <!-- </select> -->
                                                    </td>
                                                    <td><?= number_format($Total, 2); ?></td>
                                                    <td><button><a href="backend/select-list/delete.php?Line=<?= $i; ?>"><i style="color: wheat;" class="fa fa-trash"></i></a></button></td>
                                                </tr>
                                            </tbody>
                                <?php
                                        }
                                    }
                                    //  echo $i;
                                    $num = $i;
                                }
                                ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>สรุป รายการ</h1>
                                    <p>ยอดรวม<span><?php echo number_format($SumTotal, 2); ?></span></p>
                                    <p>ค่าจัดส่ง<span><?php echo number_format($sh_cost, 2); ?></span></p>
                                    <h2>รวมทั้งหมด<span><?php echo number_format($SumTotal2, 2); ?></span></h2>
                                </div>

                                <div class="cart-btn">
                                    <!-- <button type="submit" value="Update">Update Cart</button> -->
                                    <?php
                                    if ($SumTotal2 > 0) {
                                    ?>
                                        <a href="product-order.php?id=<?php echo $_SESSION['id']; ?>"><button>สั่งซื้อ</button></a>
                                    <?php
                                    }
                                    ?>
                                    <?php mysqli_close($conn); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
<?php include_once('footer.php') ?>