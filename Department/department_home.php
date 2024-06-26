
<?php
require_once "../Department/fun_department.php";
//$departments = getAllDepartment();
$name = isset($_GET['usernamelogin']) ? $_GET['usernamelogin'] : ''; // Thêm điều kiện kiểm tra tồn tại


// Lấy từ khóa tìm kiếm từ query string
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Tìm kiếm đơn vị với từ khóa
if (!empty($keyword)) {
    $departments = searchDepartments($keyword);
} else {
    // Nếu không có từ khóa tìm kiếm, hiển thị tất cả đơn vị
    $departments = getAllDepartment();
}
$itemsPerPage = 6;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
// Đếm số lượng
$totalDepartment = count($departments);

// Tính số trang dựa trên số lượng nhân viên và số lượng nhân viên trên mỗi trang
$totalPage = ceil($totalDepartment / $itemsPerPage);

// Tính chỉ mục bắt đầu và kết thúc của trang hiện tại
$startIndex = ($currentPage - 1) * $itemsPerPage;
$endIndex = $startIndex + $itemsPerPage;

// Cắt mảng nhân viên để lấy danh sách nhân viên của trang hiện tại
$currentPageItems = array_slice($departments, $startIndex, $itemsPerPage);
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
                        <h5 class="mb-0 card-header d-flex justify-content-center align-items-center">DEPARTMENT DIRECTORY</h5>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="../Department/add_department.php?usernamelogin=<?= $name ?>" class="btn btn-primary btn-sm delete-user">ADD NEW DEPARTMENT</a>
                            <form method="GET" action="../Department/department_home.php">
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
<!--                                        <td>--><?php //= $dp['departmentid'] ?><!--</td>-->
                                        <td class="text-end">
                                            <a href="viewdetail_department.php?departmentid=<?= $dp['departmentid'] ?>&usernamelogin=<?= $name ?>" class="btn btn-primary btn-sm view-details">View</a>
                                            <a href="../Department/edit_department.php?departmentid=<?= $dp['departmentid'] ?>&usernamelogin=<?= $name ?>" class="btn btn-success btn-sm edit-user">Edit</a>
<!--                                            <a href="../Department/delete_department.php?departmentid=--><?php //= $dp['departmentid'] ?><!--&usernamelogin=--><?php //= $name ?><!--" class="btn btn-danger btn-sm delete-user">Delete</a>-->
                                            <a href="../Department/delete_department.php?departmentid=<?= $dp['departmentid'] ?>&usernamelogin=<?= $name ?>" class="btn btn-danger btn-sm delete-user" onclick="return confirmDelete();">Delete</a>
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
    </<footer>
        <?php
        include "../home_pages/footer.php";
        ?>
    </footer>

</div>
<script>
    function confirmDelete(departmentId) {
        if (confirm("Are you sure you want to delete this department?")) {
            window.location.href = "../Department/delete_department.php?departmentid=" + departmentId + "&usernamelogin=<?= $name ?>";
        }
    }
</script>
<script src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
