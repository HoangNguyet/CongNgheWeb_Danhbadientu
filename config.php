<!--Chứa thông tin cấu hình chung của dự án-->
<?php
define('ROOT_PATH', dirname(__FILE__, 2) );
// Thông tin kết nối database
define("db_host", "localhost"); //Chỉ định tên máy chủ kết nối database
define("db_user", "root"); //Tên người dùng được sử dụng để kết nối tới cơ sở dữ liệu
define("db_pass", ""); // mật khẩu được sử dụng để kết nối tới cơ sở dữ liệu
define("db_name", "danhbadienthoai"); // tên database của bạn

// URL website
define("base_url", "http://localhost/danhbadienthoai");
define("default_controller", "home");
define("default_action", "index");

?>
