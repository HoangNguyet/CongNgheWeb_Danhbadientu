<?php

//require_once ("../fuc_login.php");
include "function_viewdetail.php";
$name = isset($_GET['usernamelogin']) ? $_GET['usernamelogin'] : '';
$emInfor = getAllDetail($name);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/user_home_style.css">
    <link rel="stylesheet" href="../../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="home_user.php?usernamelogin=<?= $name ?>" target="__blank">My Profile</a>
        <a class="nav-link ms-0" href="list_department.php?usernamelogin=<?= $name ?>" target="__blank">Department List</a>
        <a class="nav-link ms-0" href="list_employee.php?usernamelogin=<?= $name ?>" target="__blank">Employee List</a>
        <a href="profile.php" class="text-decoration-none text-success ml-auto right" onclick="">Account:<strong><?= $name ?></strong></a>
        <a href="../Login.php" class="btn btn-danger right" onclick="">Exit</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <div>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input class="form-control" id="inputUsername" name="username" type="text" value="<?= $name ?>" readonly>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Full name</label>
                                <input class="form-control" id="inputFirstName" name="emname" type="text" value="<?= $emInfor['employeename'] ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Department_Name</label>
                                <input class="form-control" id="inputLocation" name="tendonvi" type="text" value="<?= $emInfor['departmentname'] ?>" readonly>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Id</label>
                                <input class="form-control" id="inputLastName" type="text" value="<?= $emInfor['employeeid'] ?>" readonly>
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Address</label>
                                <input class="form-control" id="inputOrgName" name="add" type="text" value="<?= $emInfor['employeeaddress'] ?>" readonly>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" name="email" type="email" value="<?= $emInfor['employeeemail'] ?>" readonly>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" name="phone" type="tel" value="<?= $emInfor['phone'] ?>" readonly>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Position</label>
                                <input class="form-control" id="inputBirthday" type="text" name="chucvu" value="<?= $emInfor['position'] ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Role</label>
                                <input class="form-control" id="inputrole" type="text" name="role"  value="<?= $emInfor['userrole'] ?>" readonly>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <a href="userform_edit.php?usernamelogin=<?= $emInfor['username'] ?>" class="btn btn-primary" type="submit">Change your profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <?php
    include "../footer.php";
    ?>
</footer>
<script src="../../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>