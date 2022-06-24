<?php
session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
?>

<?php

if (!isset($_SESSION["intLine"])) {
  echo "Cart Empty";
  exit();
}

include_once("server.php");

$result = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY id DESC");
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

<?php include('header.php') ?>

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



<div class="cart-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="cart-page-inner">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                  <!-- <td width="82">id</td> -->
                  <td width="82">แบรนด์</td>
                  <td width="82">สินค้า</td>
                  <td width="79">จำนวน</td>
                  <td width="79">ราคา/ชิ้น</td>
                  <td width="79">ราคารวม</td>
                </tr>
                <?php
                $Total = 0;
                $SumTotal = 0;
                $SumTotal2 = 0;
                $sh_cost = 300;

                for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
                  if ($_SESSION["strId"][$i] != "") {
                    $strSQL = "SELECT * FROM tb_product WHERE id = '" . $_SESSION["strId"][$i] . "' ";
                    $objQuery = mysqli_query($conn, $strSQL);
                    $objResult = $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
                    $Total = $_SESSION["strQty"][$i] * $objResult["pice"];
                    $SumTotal = $SumTotal + $Total;
                    $SumTotal2 = $SumTotal + $sh_cost;
                ?>
                    <tr>
                      <!-- <td><?= $_SESSION["strId"][$i]; ?></td> -->
                      <td><?= $objResult["brand"]; ?></td>
                      <td><?= $objResult["name"]; ?></td>
                      <td><?= $_SESSION["strQty"][$i]; ?> ชิ้น</td>
                      <td><?= number_format($objResult["pice"]); ?></td>
                      <td><?= number_format($Total, 2); ?></td>
                    </tr>
                <?php
                  }
                }
                ?>
            </table>

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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="cart-page-inner">
          <div class="row">
            <div class="col-md-12">
              <div class="cart-summary">
                <div class="table-responsive">
                  <h3>ที่อยู่จัดส่งสินค้า (แก้ไขได้)</h3>
                  <form name="form1" method="post" action="backend/select-list/save_checkout.php">
                    <table class="table">
                      <tr>
                        <td width="150">ชื่อ : </td>
                        <td><input type="text" style="width: 100%;background: #ffffff;color: red;" name="txtName" value="<?php echo $username; ?>"></td>
                      </tr>
                      <tr>
                        <td width="80">ที่อยู่ : </td>
                        <td><input name="txtAddress" style="width: 100%;background: #ffffff;color: red;" value="<?php echo $address; ?>" required></input></td>
                      </tr>
                      <tr>
                        <td>เบอร์โทรศัพน์ : </td>
                        <td><input type="text" style="width: 100%;background: #ffffff;color: red;" name="txtTel" value="<?php echo $tel; ?>" required></td>
                      </tr>
                      <input type="hidden" name="txtEmail" value="<?php echo $email; ?>" required>
                      <input type="hidden" name="txtUser_id" value="<?php echo $id; ?>" required>
                    </table>
                    <div class="cart-btn" width="50">
                      <a href=""><button type="submit" name="Submit" value="Submit">ยืนยันคำสั่งซื้อ</button></a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>

  <?php include('footer.php') ?>