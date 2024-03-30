<?php
$namelogin = $_GET['usernamelogin'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../boostrap/boostrap/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link href="../home_pages/style/footer.css" rel="stylesheet">
    <title>ADD DEPARTMENT</title>
</head>
<body>
<div class="container-fluid">
    <header>
        <?php include "../home_pages/header_admin.php" ?>
    </header>
    <main class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center text-primary mb-4">ADD DEPARTMENT</h3>
                    <form action="process/process_dp_add.php?usernamelogin=<?= $namelogin ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Department Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone(###-###-###)</label>
                            <input type="text" class="form-control" id="phone" name="phone" required pattern="\d{3}-\d{3}-\d{3}">
                            <div id="phoneError" class="text-danger"></div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Add New</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div></div>
    </main>
<!--    <footer>-->
<!--        --><?php //include "../home_pages/footer.php"?>
<!--    </footer>-->
</div>
<script type="text/javascript">
    document.getElementById("employeeForm").addEventListener("submit", function(event) {
        var phoneInput = document.getElementById("phone");
        var phoneError = document.getElementById("phoneError");
        if (!phoneInput.checkValidity()) {
            phoneError.textContent = "Số điện thoại không đúng định dạng (###-###-###)";
            event.preventDefault();
        } else {
            phoneError.textContent = "";
        }
    });
</script>
<script type="text/javascript" src="../boostrap/boostrap/bootstrap-4.5.3-dist/js/bootstrap.js" ></script>
</body>
</html>
