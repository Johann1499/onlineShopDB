<?php
    require_once("open-connection.php");
        $strsql = "SELECT * FROM user";

        if ($rsUser = mysqli_query($con, $strsql)){
            if(mysqli_num_rows($rsUser) > 0){
                while($recUser = mysqli_fetch_array($rsUser)){
                    $username = $recUser['username'];
                    $password = $recUser['password'];
                    $name = $recUser['name'];
                }
                mysqli_free_result($rsUser);
            }
            else
                echo 'No record found.';
            }
        else 
            echo 'ERROR: Could not execute your request.';

    require_once('close-connection.php');
    
    if(isset($_POST['btnLogin'])){
        if($_POST['username'] === $username && $_POST['password'] === $password){
            header("location:dashboard.php");
        }
        else{
            echo 'Invalid username/password';
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/custom.css">
    <title>I Tee | Login</title>
</head>
<body>
    <div class="row bg-dark text-white">
        <div class="col-10">
            <h1 class="text-warning mx-5 p-2"><i class="fas fa-tshirt px-3"></i>I Tee</h1>
        </div>
    </div>
    <div class="container p-5 align-middle">
        <div class="row">
            <div class="col-4 mx-auto">
                <form class="form-login text-center" method="post">
                <img src="img/profile.jpg" alt="Profile" class="border border-light rounded-circle w-50 mt-3 mb-3"><br>

                    <input type="text" name="username" id="username" class="form-control input-sm chat-input" placeholder="Username" require/>
                    </br>
                    <input type="password" name="password" id="password" class="form-control input-sm chat-input" placeholder="Password" require/>
                    </br>
                    
                    <div class="wrapper">

                        <input type="submit" name="btnLogin" id="btnLogin" value="Login" class="btn btn-primary btn-md">

                        <a href="index.php" class="btn btn-dark col-3 rounded-pill">Cancel</a>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
    
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>