<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <header>
        <?php include "../pages/header_admin.php"?>
    </header>
    <main class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center text-primary mb-4">THÊM MỚI TÀI KHOẢN NGƯỜI DÙNG</h3>
                    <form action="process/process_user_add.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên người dùng</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="password1" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password1" name="password1" required>
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="password2" name="password2" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Phân quyền</label>
                            <input type="text" class="form-control" id="role" name="role" required>
                        </div>
                        <div class="mb-3">
                            <label for="id" class="form-label">Mã nhân viên</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<script type="text/javascript" src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.js" ></script>
</body>
</html>
