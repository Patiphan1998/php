<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: home.php');
}

?>

<?php include('header.php') ?>

<?php
ini_set('display_errors', 1);
error_reporting(~0);

$strKeyword = null;

if (isset($_POST["txtKeyword"])) {
    $strKeyword = $_POST["txtKeyword"];
} else {
    $strKeyword = $_GET["txtKeyword"];;
}

?>

<?php
ini_set('display_errors', 1);
error_reporting(~0);

include_once("server.php");

$result = mysqli_query($conn, "SELECT * FROM tb_product WHERE Name LIKE '%" . $strKeyword . "%' ");


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
                <div class="search">
                    <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                        <input name="txtKeyword" type="text" id="txtKeyword" placeholder="ระบุสินค้าที่ต้องการ..." value="<?php echo $strKeyword; ?>">
                        <button type="submit" value="Search"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <a href="cart.php" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <?php
                        if (!empty($_SESSION["shopping_cart"])) {
                            $cart_count = count(array_keys($_SESSION["shopping_cart"])); ?>
                            <span>
                                <?php echo $cart_count; ?>
                            </span>
                        <?php } ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->

<!-- Featured Product Start -->
<div class="featured-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>สินค้าทั้งหมด</h1>
        </div>
        <div class="row align-items-center">
            <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $qty = 1; ?>
                <div class="col-lg-3">
                    <div class="product-item" style="margin-bottom: 30px;">
                        <div class="product-title">
                            <a href="#"><?php echo $row["name"];  ?></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.html">
                                <img style="width: 100%;height: 350px;" src="backend/upload/<?php echo $row["image"] ?>" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="product-detail.php?id=<?= $row["id"]; ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <form action="backend/select-list/order.php" method="post">
                                <h3><?php echo $row["pice"]; ?><span>฿</span></h3>
                                <input type="hidden" name="txtId" value="<?php echo $row["id"]; ?>">
                                <input type="hidden" name="txtQty" value="<?php echo $qty; ?>">
                                <input class="btn" type="submit" value="ใส่ตะกร้า">
                            </form>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Featured Product End -->
<?php include('footer.php') ?>