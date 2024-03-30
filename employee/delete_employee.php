<?php
require_once "fun_employee.php";
$username = isset($_GET['usernamelogin']) ? $_GET['usernamelogin'] : '';

try {
    $id = $_GET["employeeid"];
    $delete = deleteEmployee($id);

    if ($delete) {
        header("Location: employee_home.php?usernamelogin=" . urlencode($username));
        exit();
    } else {
        throw new Exception("Xóa thất bại");
    }
} catch (Exception $e) {
    // Hiển thị thông báo lỗi
    echo "<script>alert('Đã xảy ra lỗi khóa ngoại: Bạn không thể xóa được!');</script>";
    // Chuyển hướng về trang ban đầu
    echo "<script>window.location.href = document.referrer;</script>";
    exit();
}
?>
