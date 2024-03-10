<?php
require_once "function_user.php";
//Lấy username từ url
$name = $_GET['username'];
$username = $_GET["usernamelogin"];
$userInfor = getUserByUsername($name);
//echo "<pre>";
//print_r($userInfor);
//echo "</pre>";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>Chỉnh sửa thông tin người dùng</title>
</head>
<body>
<div class="container-fluid">
    <header>
        <?php include "../home_pages/header_admin.php" ?>
    </header>
    <main class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center text-primary mb-4">CHỈNH SỬA THÔNG TIN NGƯỜI DÙNG</h3>
                    <form action="process/process_user_edit.php?usernamelogin=<?= $username ?>&username=<?= $name?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên người dùng</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $userInfor['username']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $userInfor['password']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Phân quyền</label>
                            <input type="text" class="form-control" id="role" name="role" value="<?= $userInfor['userrole']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="id" class="form-label">Mã nhân viên</label>
                            <input type="text" class="form-control" id="id" name="id" value="<?= $userInfor['employeeid']; ?>">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<script type="text/javascript" src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.js" ></script>
</body>
</html>
