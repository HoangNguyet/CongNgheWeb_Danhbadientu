
<?php
require_once "function_viewdetail.php";
$name = isset($_GET['usernamelogin']) ? $_GET['usernamelogin'] : ''; // Thêm điều kiện kiểm tra tồn tại
// Lấy từ khóa tìm kiếm từ query string
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Tìm kiếm đơn vị với từ khóa
if (!empty($keyword)) {
    $employees = searchEmployees($keyword);
} else {
    // Nếu không có từ khóa tìm kiếm, hiển thị tất cả đơn vị
    $employees = getAllEmployees();
}
$itemsPerPage = 6;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
// Đếm số lượng nhân viên
$totalEmployees = count($employees);

// Tính số trang dựa trên số lượng nhân viên và số lượng nhân viên trên mỗi trang
$totalPage = ceil($totalEmployees / $itemsPerPage);

// Tính chỉ mục bắt đầu và kết thúc của trang hiện tại
$startIndex = ($currentPage - 1) * $itemsPerPage;
$endIndex = $startIndex + $itemsPerPage;

// Cắt mảng nhân viên để lấy danh sách nhân viên của trang hiện tại
$currentPageItems = array_slice($employees, $startIndex, $itemsPerPage);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../employee/style/employee_home_style.css">
    <link rel="stylesheet" href="../style/user_home_style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>HOME DEPARTMENT PAGE</title>
</head>
<body>
<div class="container-fluid">
    <main class="mt-3">
        <div class="container">
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0 user" href="home_user.php?usernamelogin=<?= $name ?>" target="__blank" style="border-bottom: none">Edit</a>
            </nav>
            <div class="row">
                <div class="col-12 mb-3 mb-lg-5">
                    <div class="overflow-hidden card table-nowrap table-card">
                        <h5 class="mb-0 card-header d-flex justify-content-center align-items-center">DANH BẠ NHÂN VIÊN</h5>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <form method="GET" action="../user/list_employee.php">
                                <div class="d-flex justify-content-center h-100">
                                    <div class="search">
                                        <input class="search_input" type="text" name="keyword" placeholder="Search here..." value="<?= $keyword ?>">
                                        <input type="hidden" name="usernamelogin" value="<?= $name ?>"> <!-- Thêm input ẩn cho usernamelogin -->
                                        <button type="submit" class="search_icon"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
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
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($currentPageItems as $em): ?>
                                    <tr>
                                        <th scope="row"><?= ++$i ?></th>
                                        <td><?php echo $em['employeename'] ?></td>
                                        <td><?php echo $em['employeeaddress'] ?></td>
                                        <td><?php echo $em['employeeemail'] ?></td>
                                        <td><?php echo $em['phone'] ?></td>
                                        <td><?php echo $em['position'] ?></td>
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
</div>

<script src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
