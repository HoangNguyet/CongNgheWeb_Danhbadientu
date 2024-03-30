<?php
require_once "fun_employee.php";
//Lấy username từ url
$id = $_GET["employeeid"];
$username = $_GET["usernamelogin"];
$dpInfor = getEmployeeById($id);
$ems = getDepartment();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>EDIT EMPLOYEE</title>
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
                    <h3 class="text-center text-primary mb-4">CHỈNH SỬA THÔNG TIN NHÂN VIÊN</h3>
                    <form action="process/process_edit_employee.php?usernamelogin=<?= $username ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Mã nhân viên</label>
                            <input type="text" class="form-control" id="employeeid" name="employeeid" aria-describedby="emailHelp" value="<?= $dpInfor['employeeid']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên nhân viên</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="<?= $dpInfor['employeename']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address"  value="<?= $dpInfor['employeeaddress']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"  value="<?= $dpInfor['employeeemail']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone"  value="<?= $dpInfor['phone']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Chức vụ</label>
                            <input type="text" class="form-control" id="chucvu" name="chucvu"  value="<?= $dpInfor['position']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="tendonvi" class="form-label">Tên đơn vị</label>
                            <select class="form-control" id="madonvi" name="madonvi" required>
                                <?php foreach ($ems as $em): ?>
                                    <option value="<?= $em['departmentid'] ?>" <?= ($dpInfor['departmentname'] === $em['departmentname']) ? 'selected' : '' ?>>
                                        <?= $em['departmentname'] ?>
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
