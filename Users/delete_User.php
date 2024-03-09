<?php
require_once "function_user.php";
$username = $_GET["username"];
$deleteuser = deleteUser($username);
if($deleteuser){
    //echo "<script>alert('Xóa thành công');</script>";
    echo "<script>window.location.href='../home_pages/home_admin.php';</script>";
}
else{
    echo "<script>alert('Xóa thất bại');</script>";
    echo "<script>window.location.href='../home_pages/home_admin.php';</script>";
}
?>
