<?php
    require_once "../Users/function_user.php";
    $users = getAllUser()
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/home_admin_style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>DashBoard</title>
</head>
<body>
<div class="container-fluid">
    <header>
        <?php
            include "header_admin.php";
        ?>
    </header>
    <main class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 mb-lg-5">
                    <div class="overflow-hidden card table-nowrap table-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Danh bạ điện tử</h5>
                            <a href="../Users/add_user.php" class="btn btn-primary btn-sm delete-user">THÊM MỚI</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>STT</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>User_role</th>
                                    <th>Employee_id</th>
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                    <th scope="row"><?= ++$i ?></th>
                                    <td><?php echo $user['username'] ?></td>
                                    <td><?php echo $user['password'] ?></td>
                                    <td><?php echo $user['userrole'] ?></td>
                                    <td><?php echo $user['employeeid'] ?></td>
                                    <td class="text-end">
                                        <a href="#?username=<?= $user['username'] ?>" class="btn btn-primary btn-sm view-details">View Details</a>
                                        <a href="../Users/edit_user.php?username=<?= $user['username'] ?>" class="btn btn-success btn-sm edit-user">Edit User</a>
                                        <a href="#?username=<?= $user['username'] ?>" class="btn btn-danger btn-sm delete-user">Delete User</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>

</div>

<script src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
