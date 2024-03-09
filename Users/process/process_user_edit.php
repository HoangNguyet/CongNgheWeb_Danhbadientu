<?php
require_once ("../../fuc_login.php");
require_once ("../function_user.php");
// Lấy thông tin từ user_add.php gửi sang
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $password1 = $_POST['password'];
    //$password_confirm = $_POST['password2'];
    $role = $_POST['role'];
    $id = $_POST['id'];
    // Kiểm tra dữ liệu nhập vào
    if(empty($name) || empty($id) || empty($password1) || empty($role)){
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin');</script>";
        echo "<script>window.location.href = '../edit_user.php';</script>";
    }
    $result = updateUser($name, $password1, $role, $id);
    if($result){
        echo "<script>alert('Sửa thành công');</script>";
        echo "<script>window.location.href = '../../home_pages/home_admin.php';</script>";
    }else{
        echo "<script>alert('Sửa thất bại');</script>";
        echo "<script>window.location.href = '../edit_user.php';</script>";
    }
}
?>