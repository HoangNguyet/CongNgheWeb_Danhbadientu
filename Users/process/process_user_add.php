<?php
require_once ("../../fuc_login.php");
require_once "../../database.php";
require_once ("../function_user.php");
$username = $_GET["usernamelogin"];
// Lấy thông tin từ user_add.php gửi sang

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $password1 = $_POST['password1'];
    $password_confirm = $_POST['password2'];
    $role = $_POST['role'];
    $id = $_POST['id'];
    // Kiểm tra mật khẩu nhập vào
    if($password1!= $password_confirm){
        echo "<script>alert('Mật khẩu nhập lại không khớp');</script>";
        header("Location: ../add_user.php?usernamelogin=" . urlencode($username));
        //echo "<script>window.location.href = '../add_user.php';</script>";
    }
    $result = addUser($name, $password1, $role, $id);
    if($result){
        header("Location: ../../home_pages/home_admin.php?usernamelogin=" . urlencode($username));
        //echo "<script>window.location.href = '../../home_pages/home_admin.php';</script>";
    }else{
//        echo "<script>alert('Thêm thất bại');</script>";
        header("Location: add_user.php?usernamelogin=" . urlencode($username));
        //echo "<script>window.location.href = 'add_user.php';</script>";
    }
}
?>