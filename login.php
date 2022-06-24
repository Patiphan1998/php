<?php
session_start();
// include('server.php');
include_once('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>เข้าสู่ระบบ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="img/sg.png" rel="icon">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="template_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="template_login/css/main.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter" id="login">
        <div class="container-login100">
            <div class="wrap-login100">
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>
                <form class="login100-form validate-form" action="login_db.php" method="POST">
                    <span class="login100-form-title">
                        เข้าสู่ระบบ
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <input class="input100 active" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="login_user">
                            Login
                        </button>
                    </div>

                    <p>Not yet a member? <a href="register.php">Sign Up</a></p>
                    <br>
                    <p style="text-align: center;"><a style="text-align: center;color:blue;" href="index.php"> << กลับไปหน้าแรก</a></p>

                    <div class="text-center p-t-12">
                    </div>
                    <div class="text-center p-t-136">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="template_login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="template_login/vendor/bootstrap/js/popper.js"></script>
    <script src="template_login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="template_login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="template_login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="template_login/js/main.js"></script>
</body>

</html>