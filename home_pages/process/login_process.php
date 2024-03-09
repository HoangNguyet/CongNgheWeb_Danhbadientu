<?php
require_once ("../../fuc_login.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $login_check = Checklogin();
    //Kiểm tra cơ sở dữ liêu
    if(empty($name) || empty($password)){
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin');</script>";
        echo "<script>window.location.href = '../login.php';</script>";
    }
    else{
        if($login_check > 0)
        {
            $user_role = $login_check['userrole'];
            echo "<script>alert('Đăng nhập thành công');</script>";
            if($user_role == 'Admin')
            {echo "<script>window.location.href ='../home_admin.php';</script>";}
            else{echo "<script>window.location.href ='../home_user.php';</script>";}
        }
        else{
            echo "<script>alert('Đăng nhập thất bại');</script>";
            echo "<script>window.location.href = '../login.php';</script>";
        }
    }
}
?>