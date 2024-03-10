<?php
require_once "fun_department.php";
$id = $_GET["departmentid"];
$delete = deleteDepartment($id);
$username = $_GET['usernamelogin'];
if($delete){
    header("Location: department_home.php?usernamelogin=" . urlencode($username));}
    //echo "<script>window.location.href='../Department/department_home.php';</script>";
else{
    echo "<script>alert('Xóa thất bại');</script>";
    header("Location: department_home.php?usernamelogin=" . urlencode($username));
    //echo "<script>window.location.href='../Department/department_home.php';</script>";
}
?>
