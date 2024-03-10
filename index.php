<?php
// Bắt đầu một phiên
session_start();
$namelogin = $_GET['usernamelogin'];
// Khai báo thư viện
require_once "config.php";
// Khởi tạo các biê
$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$data = $_POST;
//Xử lý yêu cầu
// Nếu đường dẫn là gốc
if ($url == '/danhbadientu/' || $url == '/danhbadientu') {
    // Chuyển hướng đến trang đăng nhập
    header("Location: /danhbadientu/home_pages/login.php?usernamelogin=<?= $namelogin ?>");
    exit();
}
?>
