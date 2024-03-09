<?php
include "../database.php";
//Lấy thông tin người dùng
function getAllUser()
{
    $conn = connectdb();
    $sql = "SELECT * FROM users";
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
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username); // Sửa dòng này lại
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    return $user;
}

?>