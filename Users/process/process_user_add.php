<?php
require_once ("../../fuc_login.php");
require_once "../../database.php";
require_once ("../function_user.php");
// Lấy thông tin từ user_add.php gửi sang
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $password1 = $_POST['password1'];
    $password_confirm = $_POST['password2'];
    $role = $_POST['role'];
    $id = $_POST['id'];
    // Kiểm tra dữ liệu nhập vào
    if(empty($name) || empty($id) || empty($password1) || empty($password_confirm) || empty($role)){
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin');</script>";
        echo "<script>window.location.href = '../add_user.php';</script>";
    }

    // Kiểm tra mật khẩu nhập vào
    if($password1!= $password_confirm){
        echo "<script>alert('Mật khẩu nhập lại không khớp');</script>";
        echo "<script>window.location.href = '../add_user.php';</script>";
    }
    //Mã hóa mâ khẩu
    //$password = password_hash($password1, PASSWORD_DEFAULT);
//    $conn = mysqli_connect("localhost", "root", "", "danhbadienthoai");
//    if(!$conn)
//    {
//        die("Kết nối thất bại");
//    }
//    $conn1 = connectdb();
//    // Tạo câu lệnh sql
//    $sql = "INSERT INTO users (username, password, userrole, employeeid) VALUES ('$name', '$password1', '$role','$id')";
//    // Thực thi câu lệnh sql
    $result = addUser($name, $password1, $role, $id);
    if($result){
//        echo "<script>alert('Thêm thành công');</script>";
        echo "<script>window.location.href = '../../home_pages/home_admin.php';</script>";
    }else{
//        echo "<script>alert('Thêm thất bại');</script>";
        echo "<script>window.location.href = 'add_user.php';</script>";
    }
}
?>