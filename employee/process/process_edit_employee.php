<?php
require_once ("../../fuc_login.php");
require_once ("../fun_employee.php");
$namelogin = $_GET["usernamelogin"];
// Lấy thông tin từ user_add.php gửi sang
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['employeeid'];
    $name = $_POST['name'];
    $add = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $chucvu = $_POST['chucvu'];
    $madonvi = $_POST['madonvi'];
    $result = updateDepartment($id,$name, $add, $email, $phone, $chucvu, $madonvi);
    if($result){
//    echo "<script>alert('" . $result . "');</script>";
        echo "<script>window.location.href = '../Employee_home.php?usernamelogin=" . urlencode($namelogin) . "';</script>";
    }else{
        echo "<script>alert('Sửa thất bại');</script>";
        echo "<script>window.location.href = '../Employee_home.php?usernamelogin=" . urlencode($namelogin) . "';</script>";
    }
}
?>