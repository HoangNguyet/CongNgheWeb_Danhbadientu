<?php
require_once "../../database.php";
require_once "../fun_department.php";
$namelogin = $_GET['usernamelogin'];

// Lấy thông tin từ user_add.php gửi sang
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $add = $_POST['address'];
    //$password_confirm = $_POST['password2'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Kểm tra xem đơn vị tôồn tại chưa
//    $check_exits = isDepartmentExist()
    $result = addDepartment($name, $add, $email, $phone);
    if ($result) {
        header("Location: ../department_home.php?usernamelogin=" . urlencode($namelogin));
    } else {
        header("Location: ../add_department.php?usernamelogin=" . urlencode($namelogin));
    }
}
?>
