<?php
    require_once "../Users/function_user.php";
    $users = getAllUser();
    $name = isset($_GET['usernamelogin']) ? $_GET['usernamelogin'] : '';
    $itemsPerPage = 6;
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
// Đếm số lượng nhân viên
    $totalUsers = count($users);

// Tính số trang dựa trên số lượng nhân viên và số lượng nhân viên trên mỗi trang
    $totalPage = ceil($totalUsers / $itemsPerPage);

// Tính chỉ mục bắt đầu và kết thúc của trang hiện tại
    $startIndex = ($currentPage - 1) * $itemsPerPage;
    $endIndex = $startIndex + $itemsPerPage;

// Cắt mảng nhân viên để lấy danh sách nhân viên của trang hiện tại
    $currentPageItems = array_slice($users, $startIndex, $itemsPerPage);
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
    <title>HOME ADMIN PAGE</title>
</head>
<body>
<div class="container-fluid">
    <header>
        <?php
            include "header_admin.php";
        ?>
    </header>
    <main class="mt-3">

        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 mb-lg-5">
                    <div class="overflow-hidden card table-nowrap table-card">
                        <h5 class="mb-0 card-header d-flex justify-content-center align-items-center">DANH BẠ ĐIỆN TỬ</h5>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="../Users/add_user.php?usernamelogin=<?= $name ?>" class="btn btn-primary btn-sm delete-user">THÊM MỚI</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>STT</th>
                                    <th>Username</th>
<!--                                    <th>Password</th>-->
                                    <th>User_role</th>
                                    <th>Employee_id</th>
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($currentPageItems as $user): ?>
                                <tr>
                                    <th scope="row"><?= ++$i ?></th>
                                    <td><?php echo $user['username'] ?></td>
<!--                                    <td>--><?php //echo $user['password'] ?><!--</td>-->
                                    <td><?php echo $user['userrole'] ?></td>
                                    <td><?php echo $user['employeeid'] ?></td>
                                    <td class="text-end">
                                        <a href="../Users/viewdetail_user.php?usernamelogin=<?= $name ?>&username=<?= $user['username'] ?>" class="btn btn-primary btn-sm view-details">View Details</a>
                                        <a href="../Users/edit_user.php?usernamelogin=<?= $name ?>&username=<?= $user['username'] ?>" class="btn btn-success btn-sm edit-user">Edit User</a>
                                        <a href="../Users/delete_User.php?usernamelogin=<?= $name ?>&username=<?= $user['username'] ?>" class="btn btn-danger btn-sm delete-user">Delete User</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        <div class="pagination">
                            <?php if($currentPage > 1): ?>
                                <a href="?page=<?php echo $currentPage - 1; ?>&usernamelogin=<?php echo $name; ?>">Previous</a>
                            <?php endif; ?>
                            <?php for($i = 1; $i <= $totalPage; $i++): ?>
                                <?php if($i == $currentPage): ?>
                                    <span class="active"> <?php echo  $i; ?></span>
                                <?php else: ?>
                                    <a href="?page=<?php echo $i; ?>&usernamelogin=<?php echo $name; ?>"><p id="page"><?php echo $i; ?> </p></a>
                                <?php endif ?>
                            <?php endfor; ?>
                            <?php if($currentPage < $totalPage): ?>
                                <a href="?page=<?php echo $currentPage + 1; ?>&usernamelogin=<?php echo $name; ?>">Next</a>
                            <?php endif; ?>
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
