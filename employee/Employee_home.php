
<?php
require_once "fun_employee.php";
$employees = getAllEmployees();
$name = $_GET['usernamelogin'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/../style/employee_home_style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../home_pages/style/footer.css" rel="stylesheet">
    <title>HOME DEPARTMENT PAGE</title>
</head>
<body>
<div class="container-fluid">
    <header>
        <?php
        include "../home_pages/header_admin.php";
        ?>
    </header>
    <main class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 mb-lg-5">
                    <div class="overflow-hidden card table-nowrap table-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">QUẢN LÝ NHÂN VIÊN</h5>
                            <a href="../employee/add_employee.php?usernamelogin=<?= $name?>" class="btn btn-primary btn-sm delete-user">THÊM MỚI</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>STT</th>
                                    <th>EMPLOYEE NAME</th>
                                    <th>EMPLOYEE ADDRESS</th>
                                    <th>EMPLOYEE EMAIL</th>
                                    <th>PHONE</th>
                                    <th>POSITION</th>
                                    <th>DEPARTMENT ID</th>
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($employees as $em): ?>
                                    <tr>
                                        <th scope="row"><?= ++$i ?></th>
                                        <td><?php echo $em['employeename'] ?></td>
                                        <td><?php echo $em['employeeaddress'] ?></td>
                                        <td><?php echo $em['employeeemail'] ?></td>
                                        <td><?php echo $em['phone'] ?></td>
                                        <td><?php echo $em['position'] ?></td>
                                        <td><?php echo $em['departmentid'] ?></td>
                                        <td class="text-end">
                                            <a href="viewdetail_employee.php?employeeid=<?= $em['employeeid'] ?>&usernamelogin=<?= $name ?>" class="btn btn-primary btn-sm view-details">Xem chi tiết</a>
                                            <a href="../employee/edit_employee.php?employeeid=<?= $em['employeeid'] ?>&usernamelogin=<?= $name ?>" class="btn btn-success btn-sm edit-user">Sửa nhân viên</a>
                                            <a href="../employee/delete_employee.php?employeeid=<?= $em['employeeid'] ?>&usernamelogin=<?= $name ?>" class="btn btn-danger btn-sm delete-user">Xóa nhân viên</a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php
        include "../home_pages/footer.php";
        ?>
    </footer>

</div>

<script src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
