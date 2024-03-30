<?php
require_once ("../../fuc_login.php");
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
        echo "<script>alert('Mật khẩu nhập lại không đúng');</script>";
        header("Location: ../edit_user.php?usernamelogin=" . urlencode($username));
        //echo "<script>window.location.href = '../add_user.php';</script>";
        exit(); // Kết thúc chương trình sau khi chuyển hướng
    }
    $result = updateUser($name, $password1, $role, $id);
    if($result){
        //echo "<script>alert('" . $result . "');</script>";
        header("Location: ../../home_pages/home_admin.php?usernamelogin=" . urlencode($username));
        //echo "<script>window.location.href = '../../home_pages/home_admin.php';</script>";
    }else{
        echo "<script>alert('Sửa thất bại');</script>";
        header("Location: ../edit_user.php?usernamelogin=" . urlencode($username));
        //echo "<script>window.location.href = '../edit_user.php';</script>";
    }
}
?>