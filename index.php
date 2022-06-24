<?php
include_once("server.php");
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
$result = mysqli_query($conn, "SELECT * FROM tb_product WHERE Name LIKE '%" . $strKeyword . "%' ");
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
                </div>
                <div class="navbar-nav ml-auto">
                    <a href="login.php" class="nav-item nav-link">เข้าสู่ระบบ</a>
                    <a href="register.php" class="nav-item nav-link">สมัครสมาชิก</a>
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
                    <a href="login.php">
                        <img src="img/logo.jpg" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                        <input name="txtKeyword" type="text" id="txtKeyword" placeholder="ระบุสินค้าที่ต้องการ..." value="<?php echo $strKeyword; ?>">
                        <button type="submit" value="Search"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <a href="login.php" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>(0)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->

<!-- Main Slider Start -->
<div class="header">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-md-3">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fa fa-shopping-bag"></i>ตู้เย็น</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fa fa-plus-square"></i>แอร์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fa fa-female"></i>ตู้แช่เค็ก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fa fa-tshirt"></i>ตู้น้ำมัน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fa fa-mobile-alt"></i>ตู้แช่หมู</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fa fa-microchip"></i>โทรทัศน์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fa fa-child"></i>เครื่องชักผ้า</a>
                        </li>
                    </ul>
                </nav>
            </div> -->
            <div class="col-md-9">
                <div class="header-slider normal-slider">
                    <?php include('promote.php') ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="header-img">
                    <div class="img-item">
                        <img src="img/bee2.jpg" />
                        <a class="img-text" href="">
                            <p>ยินดีต้อนรับ</p>
                        </a>
                    </div>
                    <div class="img-item">
                        <img src="img/bee1.jpg" />
                        <a class="img-text" href="">
                            <p>แฟรนซ์ไซต์</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Slider End -->

<!-- Call to Action Start -->
<div class="call-to-action">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>โทรหาเราสำหรับข้อสงสัยใด ๆ</h1>
            </div>
            <div class="col-md-6">
                <a href="tel:0123456789">+012-345-6789</a>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->

<!-- Featured Product Start -->
<?php include('featured_products.php') ?>
<!-- Featured Product End -->

<!-- Recent Product Start -->
<?php include('recent_products.php') ?>
<!-- Recent Product End -->



<?php include('footer.php'); ?>