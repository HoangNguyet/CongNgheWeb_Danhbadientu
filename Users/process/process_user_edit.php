<?php
require_once ("../../fuc_login.php");
require_once ("../function_user.php");
$username = $_GET["usernamelogin"];
// Lấy thông tin từ user_add.php gửi sang
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $password1 = $_POST['password'];
    //$password_confirm = $_POST['password2'];
    $role = $_POST['role'];
    $id = $_POST['id'];
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