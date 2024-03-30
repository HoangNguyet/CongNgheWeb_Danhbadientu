<?php
include "../database.php";
//Lấy thông tin người dùng
function getAllUser()
{
    $conn = connectdb();
    $sql = "SELECT users.*, employees.employeename FROM users LEFT JOIN employees ON users.employeeid = employees.employeeid order by created_at desc";
    $result = mysqli_query($conn, $sql);
    $users = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    mysqli_free_result($result);
    return $users;
}
// Lấy thông tin nnguowifdungf theo username
function getUserByUsername($username)
{
    $conn = connectdb();
    $sql = "SELECT users.*, employees.employeename FROM users LEFT JOIN employees ON users.employeeid = employees.employeeid WHERE users.username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username); // Sửa dòng này lại
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    return $user;
}
function addUser($name, $password, $role, $id) {
    $conn = connectdb();
    $sql = "INSERT INTO users (username, password, userrole, employeeid) VALUES (?, ?,?, ?)";
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $name, $password, $role, $id);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}
function updateUser($name, $password, $role, $id) {
    $conn = connectdb();
    // Mã hóa mật khẩu
//    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    // Sử dụng câu lệnh Prepared Statement
    $sql = "UPDATE users SET password = ?, userrole = ?, employeeid = ? WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssis", $password, $role, $id, $name);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function deleteUser($username) {
//    echo $username;
    $conn = connectdb(); // Đảm bảo rằng hàm được gọi là connectDB(), không phải connectdb()
    $sql = "DELETE FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username); // Sửa "i" thành "s"
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn); // Đóng kết nối sau khi sử dụng
    return $result;
}

// Lấy toàn bộ thông tin nhân viên
function getDetailUsers($username)
{
    $conn = connectdb();
    $sql = "SELECT e.employeename, d.departmentname,u.username, u.password, u.userrole FROM users u INNER JOIN employees e ON u.employeeid = e.employeeid INNER JOIN departments d ON e.departmentid = d.departmentid WHERE u.username =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    return $user;
}
function isUsersExist($username) {
    $conn = connectdb();
    $sql = "SELECT COUNT(*) FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_fetch_row($result)[0];
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    return $count > 0;
}
function getEmployeename(){
    $conn = connectdb();
    $sql = "SELECT employeename, employeeid FROM employees";
    $result = mysqli_query($conn, $sql);
    $departments = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $employees[] = $row;
    }
    return $employees;
}
?>