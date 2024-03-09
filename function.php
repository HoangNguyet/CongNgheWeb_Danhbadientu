// Chứa các hàm tiện ích chung cho website
<?php
// Khai báo thư viện
require_once "config.php";

// Hàm kiểm tra đăng nhập

function isLogin()
{
    if(isset($_SESSION['user_name']) && isset($_SESSION['user_password']))
    {
        return true;
    }
    else
    {
        return false;
    }
}

// ham lay thong tin nguoi dung
function getUserInfor($id)
{
    $conn = connectdb(); // kết nối tới cơ sở ữ liệu
    $sql = "SELECT * FROM users WHERE id = '$id'"; // Viết câu lệnh sql
    $result = mysqli_query($conn, $sql); // Thực thi câu lệnh sql và lưu vào biến $result
    $users = mysqli_fetch_assoc($result); // Lấy dữ liệu người dùng
    return $users; // Trả về dữ liệu
}
?>