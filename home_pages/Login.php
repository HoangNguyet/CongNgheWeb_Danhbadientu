<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/login_style.css">
    <link rel="stylesheet" href="../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>Login_Form</title>
</head>
<body>
<div class="formlogin">

    <div class="form">
        <form action="../home_pages/process/login_process.php" method="post">
            <div class="row justify-content-center text-danger">
                <h2>DANH BẠ ĐIỆN THOẠI ĐẠI HỌC THỦY LỢI</h2>
            </div>
            <div class="form-group">
                <label for=username">User name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label" for="exampleCheck1">Bạn chưa có tài khoản?</label>
                <a href="signin.php">Đăng kí</a>
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.js" ></script>
</body>
</html>
