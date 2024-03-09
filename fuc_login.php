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

?>
