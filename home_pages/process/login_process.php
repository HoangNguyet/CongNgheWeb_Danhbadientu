<?php
require_once ("../../fuc_login.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $login_check = Checklogin();
    $name = getUserInfor();
    $username = $login_check['username'];
//    echo "<pre>";
//    print_r($name);
//    echo "</pre>";
        if($login_check > 0)
        {
            $user_role = $login_check['userrole'];
            echo "<script>alert('Đăng nhập thành công');</script>";
            if($user_role == 'Admin')
            {
                 // Đây là tên người dùng lấy từ cơ sở dữ liệu
                header("Location: ../../home_pages/home_admin.php?usernamelogin=" . urlencode($username));}
            else {
                header("Location: ../../home_pages/user/home_user.php?usernamelogin=" . urlencode($username));
            }
        }
        else{
            echo "<script>alert('Đăng nhập thất bại');</script>";
            echo "<script>window.location.href = '../login.php';</script>";
        }
}
?>