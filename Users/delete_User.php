<?php
require_once "function_user.php";
$name = $_GET["username"];
$username = $_GET["usernamelogin"];
$deleteuser = deleteUser($name);
if($deleteuser){
    //echo "<script>alert('Xóa thành công');</script>";
    header("Location: ../home_pages/home_admin.php?usernamelogin=" . urlencode($username));
    //echo "<script>window.location.href='../home_pages/home_admin.php';</script>";
}
else{
    echo "<script>alert('Xóa thất bại');</script>";
    header("Location: ../home_pages/home_admin.php?usernamelogin=" . urlencode($username));
    //echo "<script>window.location.href='../home_pages/home_admin.php';</script>";
}
?>
