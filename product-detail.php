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
$result = mysqli_query($conn, "SELECT * FROM tb_product WHERE id = $id ");
?>

<?php include('header.php'); ?>

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
                        <a href="home.php" class="nav-item nav-link">หน้าหลัก</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">สินค้า</a>
                            <div class="dropdown-menu">
                                <a href="product-list.php?txtKeyword=แอร์" value="แอร์" class="dropdown-item">แอร์ >></a>
                                <a href="product-list.php?txtKeyword=ตู้เย็น" value="ตู้เย็น" class="dropdown-item">ตู้เย็น >></a>
                                <a href="product-list.php?txtKeyword=ตู้แช่เครื่องดื่ม" value="ตู้แช่เครื่องดื่ม" class="dropdown-item">ตู้แช่เครื่องดื่ม >></a>
                                <a href="product-list.php?txtKeyword=ตู้แช่เบียร์" value="ตู้แช่เบียร์" class="dropdown-item">ตู้แช่เบียร์ >></a>
                                <a href="product-list.php?txtKeyword=ตู้แช่หมู" value="ตู้แช่หมู" class="dropdown-item">ตู้แช่หมู >></a>
                                <a href="product-list.php?txtKeyword=ตู้น้ำมัน" value="ตู้น้ำมัน" class="dropdown-item">ตู้น้ำมัน >></a>
                                <a href="product-list.php?txtKeyword=ทีวี" value="ทีวี" class="dropdown-item">ทีวี >></a>
                                <a href="product-list.php?txtKeyword=เครื่องซักผ้า" value="เครื่องซักผ้า" class="dropdown-item">เครื่องซักผ้า >></a>
                            </div>
                        </div>
                        <a href="backend/index.php" class="nav-item nav-link">สำหรับแอดมิน</a>
                    <?php } else { ?>
                        <a href="home.php" class="nav-item nav-link active">หน้าหลัก</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">สินค้า</a>
                            <div class="dropdown-menu">
                                <a href="product-list.php?txtKeyword=แอร์" value="แอร์" class="dropdown-item">แอร์ >></a>
                                <a href="product-list.php?txtKeyword=ตู้เย็น" value="ตู้เย็น" class="dropdown-item">ตู้เย็น >></a>
                                <a href="product-list.php?txtKeyword=ตู้แช่เครื่องดื่ม" value="ตู้แช่เครื่องดื่ม" class="dropdown-item">ตู้แช่เครื่องดื่ม >></a>
                                <a href="product-list.php?txtKeyword=ตู้แช่เบียร์" value="ตู้แช่เบียร์" class="dropdown-item">ตู้แช่เบียร์ >></a>
                                <a href="product-list.php?txtKeyword=ตู้แช่หมู" value="ตู้แช่หมู" class="dropdown-item">ตู้แช่หมู >></a>
                                <a href="product-list.php?txtKeyword=ตู้น้ำมัน" value="ตู้น้ำมัน" class="dropdown-item">ตู้น้ำมัน >></a>
                                <a href="product-list.php?txtKeyword=ทีวี" value="ทีวี" class="dropdown-item">ทีวี >></a>
                                <a href="product-list.php?txtKeyword=เครื่องซักผ้า" value="เครื่องซักผ้า" class="dropdown-item">เครื่องซักผ้า >></a>
                            </div>
                        </div>
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
            <li class="breadcrumb-item active">รายละเอียดสินค้า</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $qty = 1;
                        ?>
                            <div class="col-md-6">
                                <div class="product-slider-single">
                                    <img style="width: 30px;height: 500px;" src="backend/upload/<?php echo $row["image"] ?>" alt="Product Image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="product-content">
                                        <div class="title">
                                            <h2><?php echo $row["name"] ?></h2>
                                        </div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p><?php echo $row["pice"] ?><span>฿</span></p>
                                        </div>
                                        <div class="action">
                                            <form action="backend/select-list/order.php" method="post">
                                                <input type="hidden" name="txtId" value="<?php echo $row["id"]; ?>" size="2">
                                                <input type="hidden" name="txtQty" value="<?php echo $qty; ?>">
                                                <input class="btn" type="submit" value="ใส่ตะกร้า">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="row product-detail-bottom">
                                        <div class="col-lg-12">
                                            <ul class="nav nav-pills nav-justified">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="pill" href="#description">รายละเอียดสินค้า</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="description" class="container tab-pane active">
                                                    <p><?php echo $row["product_detail"] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            <?php } ?>

            </div>
        </div>
    </div>
</div>
<!-- Product Detail End -->


<?php include('footer.php') ?>