<?php
require_once ("../user/function_viewdetail.php");
$namelogin = $_GET["usernamelogin"];
// Lấy thông tin từ user_add.php gửi sang
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $emname = $_POST['emname'];
    $add = $_POST['add'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $chucvu = $_POST['chucvu'];
    $tendonvi = $_POST['tendonvi'];
    $quyen = $_POST['role'];
//    $name, $employeename, $employeeaddress, $employeeemail, $phone, $emposition, $departmentname, $userrole
    $result = usereditprofile($username, $emname, $add, $email, $phone, $chucvu, $tendonvi, $quyen);
    if($result){
//    echo "<script>alert('" . $result . "');</script>";
        echo "<script>window.location.href = 'home_user.php?usernamelogin=" . urlencode($namelogin) . "';</script>";
    }else{
        echo "<script>alert('Sửa thất bại');</script>";
        echo "<script>window.location.href = 'home_user.php?usernamelogin=" . urlencode($namelogin) . "';</script>";
    }
}
?>