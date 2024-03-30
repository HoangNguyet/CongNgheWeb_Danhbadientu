<?php
require_once "function_user.php";

// Lấy thông tin từ URL
$name = $_GET['username'];
$username = $_GET["usernamelogin"];

// Lấy thông tin người dùng được chỉnh sửa
$userInfor = getUserByUsername($name);

// Lấy danh sách tất cả nhân viên
$ems = getEmployeename();
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
                            <label for="password1" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password1" name="password1" required>
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="password2" name="password2" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Phân quyền</label>
                            <input type="text" class="form-control" id="role" name="role" value="<?= $userInfor['userrole']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tendonvi" class="form-label">Tên nhân viên</label>
                            <select class="form-control" id="tendonvi" name="id" required>
                                <?php foreach ($ems as $em): ?>
                                    <option value="<?= $em['employeeid'] ?>" <?= ($userInfor['employeename'] === $em['employeename']) ? 'selected' : '' ?>>
                                        <?= $em['employeename'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
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
