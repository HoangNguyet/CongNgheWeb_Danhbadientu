<?php
require_once "fun_department.php";
//Lấy username từ url
$id = $_GET["departmentid"];
$username = $_GET["usernamelogin"];
$dpInfor = getDepartmentById($id);
//echo "<pre>";
//print_r($dpInfor);
//echo "</pre>";

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
    <title>Chỉnh sửa thông tin đơn vị</title>
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
                    <h3 class="text-center text-primary mb-4">CHỈNH SỬA THÔNG TIN ĐƠN VỊ</h3>
                    <form action="process/process_dp_edit.php?usernamelogin=<?= $username ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Mã đơn vị</label>
                            <input type="text" class="form-control" id="departmentid" name="departmentid" aria-describedby="emailHelp" value="<?= $dpInfor['departmentid']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên đơn vị</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="<?= $dpInfor['departmentname']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address"  value="<?= $dpInfor['departmentaddress']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"  value="<?= $dpInfor['departmentemail']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone"  value="<?= $dpInfor['phone']; ?>" required>
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
