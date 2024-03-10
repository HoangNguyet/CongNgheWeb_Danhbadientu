<?php
require_once "../../database.php";
require_once "../fun_employee.php";
$namelogin = $_GET['usernamelogin'];

// Lấy thông tin từ user_add.php gửi sang
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $add = $_POST['address'];
    //$password_confirm = $_POST['password2'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $chucvu = $_POST['chucvu'];
    $madonvi = $_POST['madonvi'];
    $result = addEmployee($name, $add, $email, $phone, $chucvu, $madonvi);
    if ($result) {
        header("Location: ../Employee_home.php?usernamelogin=" . urlencode($namelogin));
    } else {
        header("Location: ../add_employee.php?usernamelogin=" . urlencode($namelogin));
    }
}
?>
