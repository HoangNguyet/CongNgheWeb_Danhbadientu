<?php
require_once ("config.php");
//Hàm kết nối database
function connectdb()
{
    //global $db_host, $db_user, $db_pass, $db_name;
    //Tạo kết nối sql
    $conn = mysqli_connect(db_host,db_user, db_pass, db_name);
    if(!$conn)
    {
        die("Kết nối thất bại".mysqli_connect_error());
    }
    return $conn;
}
// hàm thực hiện truy vấn sql;
function query($sql)
{
    $conn =  connectdb(); // Kết nối cơ sở dữ liệu
    $result =  mysqli_query($conn, $sql);
    if(!$result)
    {
        die("Lỗi truy vấn database: " .mysqli_error($conn));
    }
    return $result;
}
?>
