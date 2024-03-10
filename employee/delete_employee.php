<?php
require_once "fun_employee.php";
$id = $_GET["employeeid"];
$delete = deleteEmployee($id);
$username = $_GET['usernamelogin'];
if($delete){
    header("Location: employee_home.php?usernamelogin=" . urlencode($username));}
//echo "<script>window.location.href='../Department/department_home.php';</script>";
else{
    echo "<script>alert('Xóa thất bại');</script>";
    header("Location: employee_home.php?usernamelogin=" . urlencode($username));
    //echo "<script>window.location.href='../Department/department_home.php';</script>";
}
?>
