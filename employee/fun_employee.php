<?php
include "../database.php";
// Hàm Lấy thông tin nhân viên
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
//Lấy nhân viên qua mã nhân viên
function getEmployeeById($id)
{
    $conn = connectdb();
    $sql = "SELECT * FROM employees WHERE employeeid =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $employee = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    return $employee;
}
//Thêm nhân viên
function addEmployee($employeename, $employeeaddress, $ployeeemail, $phone, $emposition, $departmentid)
{
    $conn = connectdb();
    $sql = "INSERT INTO employees (employeename, employeeaddress, employeeemail, phone, position, departmentid) VALUES (?,?,?,?, ?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $employeename, $employeeaddress, $ployeeemail, $phone, $emposition, $departmentid);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}
// Xóa đơn vị
function deleteEmployee($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM employees WHERE employeeid =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}
// Sửa thông tin đơn vị
function updateDepartment($id,$employeename, $employeeaddress, $ployeeemail, $phone, $emposition, $departmentid)
{
    $conn = connectdb();
    $sql = "UPDATE employees SET employeename =?, employeeaddress =?, employeeemail =?, phone =?, position =?, departmentid =? WHERE employeeid =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssii", $employeename, $employeeaddress, $ployeeemail, $phone, $emposition, $departmentid, $id);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}
//Hàm lấy chi tiết nhân viên
function getDetailEmployee($id){
    $conn = connectdb();
    $sql = "SELECT e.employeeid, e.employeename, e.employeeaddress,e.employeeemail, e.phone,e.position,e.avatar,d.departmentname, u.username,u.userrole FROM employees e JOIN departments d ON e.departmentid = d.departmentid JOIN users u ON e.employeeid = u.employeeid WHERE e.employeeid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $employee = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    return $employee;
}
function isEmployeeExist($id) {
    $conn = connectDB();
    $sql = "SELECT COUNT(*) FROM employees WHERE employeeid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_fetch_row($result)[0];
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    return $count > 0;
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
?>