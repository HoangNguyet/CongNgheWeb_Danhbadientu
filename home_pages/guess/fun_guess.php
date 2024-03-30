<?php
include "../../database.php";
//Lấy thông tin người dùng
function getAllDepartment()
{
    $conn = connectdb();
    $sql = "SELECT * FROM departments order by departmentid DESC";
    $result = mysqli_query($conn, $sql);
    $departments = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $departments[] = $row;
    }
    mysqli_free_result($result);
    return $departments;

}
?>
