
<?php
    require_once "fun_guess.php";
    $users = getAllDepartment();
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
    <link rel="stylesheet" href="../../Department/style/department_home_style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/footer.css" rel="stylesheet">
    <link href="../style/home_admin_style.css">
    <title>HOME ADMIN PAGE</title>
</head>
<body>
<div class="container-fluid">
    <header>
        <?php
        $current_page = basename($_SERVER['PHP_SELF']);
        ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link <?php if($current_page == 'home_admin.php' || $current_page == 'home_admin.php?page=home') echo 'active'; ?>" href="#?page=1&usernamelogin=<?= $name ?>">Home of MySite</a>
                    </div>
                </div>
                <div>
                    <a href="profile.php" class="text-decoration-none text-success" onclick="">Account:<strong>
                            Hello guess, please log in to see more of our information</strong></a>
                    <a href="../Login.php" class="btn btn-danger" onclick="">Login</a>
                </div>
            </div>
        </nav>

    </header>
    <main class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 mb-lg-5">
                    <div class="overflow-hidden card table-nowrap table-card">
                        <h5 class="mb-0 card-header d-flex justify-content-center align-items-center">DEPARTMENT DIRECTORY</h5>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>STT</th>
                                    <th>DEPATRMENT NAME</th>
                                    <th>DEPARTMENT ADDRESS</th>
                                    <th>DEPARTMENT EMAIL</th>
                                    <th>PHONE</th>
                                    <!--                                    <th>DEPARTMENT ID</th>-->
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($currentPageItems as $dp): ?>
                                    <tr>
                                        <th scope="row"><?= ++$i ?></th>
                                        <td><?php echo $dp['departmentname'] ?></td>
                                        <td><?php echo $dp['departmentaddress'] ?></td>
                                        <td><?php echo $dp['departmentemail'] ?></td>
                                        <td><?php echo $dp['phone'] ?></td>
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
            include "../../home_pages/footer.php";
     ?>
    </footer>

</div>

<script src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
