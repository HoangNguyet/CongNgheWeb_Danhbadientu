<?php
require_once ("../../fuc_login.php");
require_once "../../database.php";
require_once ("../function_user.php");
$username = isset($_GET['usernamelogin']) ? $_GET['usernamelogin'] : '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $password1 = $_POST['password1'];
    $password_confirm = $_POST['password2'];
    $role = $_POST['role'];
    $id = $_POST['id'];

    if($password1 != $password_confirm){
        echo "<script>alert('Mật khẩu nhập lại không đúng');</script>";
        echo "<script>window.history.back();</script>";
        exit();
    }

    $user_exists = isUsersExist($name);

    if($user_exists){
        echo "<script>alert('Tên người dùng đã tồn tại');</script>";
        echo "<script>window.location.href = '../add_user.php?usernamelogin=" . urlencode($username) . "&alert_message=Tên+người+dùng+đã+tồn+tại';</script>";
        exit();
    } else {
        $result = addUser($name, $password1, $role, $id);
        header("Location: ../../home_pages/home_admin.php?usernamelogin=" . urlencode($username));
        exit();
    }
}
?>
