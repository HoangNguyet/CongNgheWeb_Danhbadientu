
<?php
require_once "function_user.php";
//Lấy username từ url
$name = $_GET["username"];
$username = $_GET["usernamelogin"];
$emInfor = getDetailUsers($name);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../employee/style/">
    <link rel="stylesheet" href="../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>VIEW DETAIL USER</title>
</head>
<body>
<header>
    <?php
    include "../home_pages/header_admin.php";
    ?>
</header>
<main>
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form action="viewdetail_user.php?username=<?= $name ?>" method="post">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Employee name</label>
                                <input class="form-control" id="inputUsername" type="text" value="<?= $emInfor['employeename'] ?>">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Departmant name</label>
                                    <input class="form-control" id="inputFirstName" type="text" value="<?= $emInfor['departmentname'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">UserName</label>
                                    <input class="form-control" id="inputLocation" type="text" value="<?= $emInfor['username'] ?>">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Password</label>
                                    <input class="form-control" id="inputLastName" type="text" value="<?= $emInfor['password'] ?>">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Role</label>
                                    <input class="form-control" id="inputOrgName" type="text" value="<?= $emInfor['userrole'] ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
