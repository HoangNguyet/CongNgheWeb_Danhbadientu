<?php
require_once ("../../fuc_login.php");
require_once "../../database.php";
require_once ("../function_user.php");
$username = isset($_GET['usernamelogin']) ? $_GET['usernamelogin'] : '';
// Lấy thông tin từ user_add.php gửi sang

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $password1 = $_POST['password1'];
    $password_confirm = $_POST['password2'];
    $role = $_POST['role'];
    $id = $_POST['id'];
    // Kiểm tra mật khẩu nhập vào
    if($password1!= $password_confirm){
        echo "<script>alert('Mật khẩu nhập lại không đúng');</script>";
        header("Location: ../add_user.php?usernamelogin=" . urlencode($username));
        //echo "<script>window.location.href = '../add_user.php';</script>";
        exit(); // Kết thúc chương trình sau khi chuyển hướng
    }
    $user_exists = isUsersExist($name);
    // Kiểm tra xem người dùng đã tồn tại chưa
    if($user_exists){
        echo "<script>alert('Tên người dùng đã tồn tại');</script>";
        header("Location:../add_user.php?usernamelogin=". urlencode($username));
        exit(); // Kết thúc chương trình sau khi chuyển hướng
    }else{
        $result = addUser($name, $password1, $role, $id);
        header("Location: ../../home_pages/home_admin.php?usernamelogin=" . urlencode($username));
    }
}
?>