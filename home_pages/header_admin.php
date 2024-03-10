<?php
// Bắt đầu phiên
session_start();
require_once ("../fuc_login.php");
$name = $_GET['usernamelogin'];
// Thiết lập mặc định cho liên kết đầu tiên
$_SESSION['active_link'] = 'home';
// Kiểm tra nếu một liên kết được nhấp vào
if(isset($_GET['page'])) {
    // Đặt liên kết được nhấp vào là liên kết hoạt động
    $_SESSION['active_link'] = $_GET['page'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/home_admin_style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="../home_pages/home_admin.php?page=home&usernamelogin=<?= $name ?>">Trang chủ</a>
                        <a class="nav-link <?php echo ($_SESSION['active_link'] == 'department') ? 'active' : 'inactive'; ?>" href="../Department/department_home.php?page=department&usernamelogin=<?= $name ?>">Quản lý Đơn vị</a>
                        <a class="nav-link <?php echo ($_SESSION['active_link'] == 'employee') ? 'active' : 'inactive'; ?>" href="../employee/Employee_home.php?usernamelogin=<?= $name ?>" onclick="">Quản lý Nhân viên</a>

                    </div>
                </div>
                <div>
                    <a href="profile.php" class="text-decoration-none text-success" onclick="">Tài khoản:<strong><?= $name ?></strong></a>
                    <a href="Login.php" class="btn btn-danger" onclick="">Thoát</a>
                </div>
            </div>
        </nav>
    </header>
</div>
<script src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>