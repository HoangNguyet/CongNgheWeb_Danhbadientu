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
<div class="full">
    <div class="form">
        <form action="../home_pages/process/login_process.php" method="post">
            <h2>Login into my Site</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="form-group">
            <!--                <p href="#">Access as a guess?</p>-->
            <div class="row">
                <div class="col-md-6">
                    <p href="#">Access as a guess?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="../home_pages/guess/home_guess.php" class="btn btn-secondary">Access</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.js" ></script>
</body>
<script type="text/javascript" src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.js" ></script>
</body>
</html>
