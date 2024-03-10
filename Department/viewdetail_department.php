
<?php
require_once "fun_department.php";
//Lấy username từ url
$id = $_GET["departmentid"];
$username = $_GET["usernamelogin"];
$emInfor = getDepartmentById($id);
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
    <title>VIEW DETAIL DEPARTMENT</title>
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
                    <div class="card-header">Profile Department Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img style="width: 300px; height: 200px" class="img-account-profile mb-2" src="../img/viettel.png">
                    </div>

                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Department Details</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (username)-->
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                <label class="small mb-1" for="inputUsername">Department_id</label>
                                <input class="form-control" id="inputUsername" type="text" value="<?= $emInfor['departmentid'] ?>">
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Department name</label>
                                    <input class="form-control" id="inputFirstName" type="text" value="<?= $emInfor['departmentname'] ?>">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Department Address</label>
                                    <input class="form-control" id="inputOrgName" type="text" value="<?= $emInfor['departmentaddress'] ?>">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Department email</label>
                                <input class="form-control" id="inputEmailAddress" type="email" value="<?= $emInfor['departmentemail'] ?>">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" value="<?= $emInfor['phone'] ?>">
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
