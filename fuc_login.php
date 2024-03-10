<?php
require_once ('database.php');
// Kiểm tra đăng nhập
function Checklogin()
{
    $user = $_POST['name'];
    $pass = $_POST['password'];
    $conn = connectdb();
    $sql = "select * from users where username = '".$user."' and password = '".$pass."'";
    $result = mysqli_query($conn, $sql); // Thực thị câu lệnh sql và lưu vào $result
    $check = mysqli_fetch_assoc($result);
    return $check;
}
// Lấy thông tin người duùng
function getUserInfor()
{
    $user = $_POST['name'];
    $conn = connectdb(); // kết nối tới cơ sở ữ liệu
    $sql = "select * from users where username = '".$user."'"; // Viết câu lệnh sql
    $result = mysqli_query($conn, $sql); // Thực thi câu lệnh sql và lưu vào biến $result
    $users = mysqli_fetch_assoc($result); // Lấy dữ liệu người dùng
    return $users; // Trả về dữ liệu
}

?>
