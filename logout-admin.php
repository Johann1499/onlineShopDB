<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/admin-panel.css">
    <title>I Tee | Logout</title>
</head>
<body>
    <div class="col-4">
        <h1 class="text-warning mx-5"><i class="fas fa-tshirt px-3"></i> I Tee</h1>
    </div>   
    <div id="wrapper">

        <div class="row" id="main" >
            <div class="col-sm-12 col-md-10 well" id="content">
                <h1>Thank you!</h1>
                <a href="index.php" class="btn btn-success">Continue</a>
            </div>
        </div>
            <!-- /.container-fluid -->
    </div>
        <!-- /#page-wrapper -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>