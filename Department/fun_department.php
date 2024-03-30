<?php
include "../database.php";
// Hàm lấy toàn bộ đơn vị
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
// Thêm đơn vị mới
function addDepartment($name, $add, $email, $phone)
{
    $conn = connectdb();
    $sql = "INSERT INTO departments (departmentname, departmentaddress, departmentemail, phone) VALUES (?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $add, $email, $phone);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}
// Lấy thông tin đơn vị bẳng id
function getDepartmentById($id)
{
    $conn = connectdb();
    $sql = "SELECT * FROM departments WHERE departmentid =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $department = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    return $department;
}
// Xóa đơn vị
function deleteDepartment($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM departments WHERE departmentid =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}
// Sửa thông tin đơn vị
function updateDepartment($id, $name, $add, $email, $phone)
{
    $conn = connectdb();
    $sql = "UPDATE departments SET departmentname =?, departmentaddress =?, departmentemail =?, phone =? WHERE departmentid =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $add, $email, $phone, $id);
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
function isDepartmentExist($id) {
    $conn = connectDB();
    $sql = "SELECT COUNT(*) FROM employees WHERE departmentid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_fetch_row($result)[0];
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    return $count > 0;
}

?>
