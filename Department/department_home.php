
<?php
require_once "../Department/fun_department.php";
$departments = getAllDepartment();
$name = $_GET['usernamelogin'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/department_home_style.css">
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
                            <h5 class="mb-0">QUẢN LÝ ĐƠN VỊ</h5>
                            <a href="../Department/add_department.php?usernamelogin=<?= $name?>" class="btn btn-primary btn-sm delete-user">THÊM MỚI</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>STT</th>
                                    <th>DEPATRMENT NAME</th>
                                    <th>DEPARTMENT ADDRESS</th>
                                    <th>DEPARTMENT EMAIL</th>
                                    <th>PHONE</th>
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($departments as $dp): ?>
                                    <tr>
                                        <th scope="row"><?= ++$i ?></th>
                                        <td><?php echo $dp['departmentname'] ?></td>
                                        <td><?php echo $dp['departmentaddress'] ?></td>
                                        <td><?php echo $dp['departmentemail'] ?></td>
                                        <td><?php echo $dp['phone'] ?></td>
                                        <td class="text-end">
                                            <a href="viewdetail_department.php?departmentid=<?= $dp['departmentid'] ?>&usernamelogin=<?= $name ?>" class="btn btn-primary btn-sm view-details">Xem chi tiết</a>
                                            <a href="../Department/edit_department.php?departmentid=<?= $dp['departmentid'] ?>&usernamelogin=<?= $name ?>" class="btn btn-success btn-sm edit-user">Sửa đơn vị</a>
                                            <a href="../Department/delete_department.php?departmentid=<?= $dp['departmentid'] ?>&usernamelogin=<?= $name ?>" class="btn btn-danger btn-sm delete-user">Xóa đơn vị</a>
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
