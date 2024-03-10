<?php
include "../../database.php";
// Lâấy thông tin người duùng qua username
function getAllDetail($username)
{
    $conn = connectdb();
    $sql = "SELECT e.employeeid, e.employeename, e.employeeaddress, e.employeeemail, e.phone, e.position, d.departmentname, u.username, u.userrole FROM employees e JOIN departments d ON e.departmentid = d.departmentid JOIN users u ON e.employeeid = u.employeeid WHERE u.username =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $employee = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    return $employee;
}
function usereditprofile($name, $employeename, $employeeaddress, $employeeemail, $phone, $emposition, $departmentname, $userrole)
{
    $conn = connectdb();
    $sql = "UPDATE employees e JOIN departments d ON e.departmentid = d.departmentid JOIN users u ON e.employeeid = u.employeeid SET e.employeename = ?, e.employeeaddress = ?, e.employeeemail = ?, e.phone = ?, e.position = ?, d.departmentname = ?, u.userrole = ? WHERE u.username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssss", $employeename, $employeeaddress, $employeeemail, $phone, $emposition, $departmentname, $userrole, $name);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}
function searchDepartments($keyword) {
    $conn = connectDB();
    $sql = "SELECT * FROM departments WHERE departmentname LIKE ? OR departmentaddress LIKE ?";
    $keyword = "%$keyword%";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $keyword, $keyword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $departments = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $departments[] = $row;
    }
    mysqli_stmt_free_result($stmt);
    return $departments;
}
// Hàm lấy toàn bộ đơn vị
function getAllDepartment()
{
    $conn = connectdb();
    $sql = "SELECT * FROM departments";
    $result = mysqli_query($conn, $sql);
    $users = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $departments[] = $row;
    }
    mysqli_free_result($result);
    return $departments;

}
function searchEmployees($keyword) {
    $conn = connectDB();
    $sql = "SELECT * FROM employees WHERE employeename LIKE ? OR employeeaddress LIKE ?";
    $keyword = "%$keyword%";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $keyword, $keyword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $employees = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $employeess[] = $row;
    }
    mysqli_stmt_free_result($stmt);
    return $employeess;
}
function getAllEmployees()
{
    $conn = connectdb();
    $sql = "SELECT * FROM employees";
    $result = mysqli_query($conn, $sql);
    $employees = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $employees[] = $row;
    }
    return $employees;
}

?>