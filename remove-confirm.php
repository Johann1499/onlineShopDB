<?php
    session_start();
    require_once('products.php');

    if(isset($_POST['btnProcess'])) {
    
        unset($_SESSION['cartItems'][$_POST['hdnKey']][$_POST['hdnSize']]);

        $_SESSION['totalQuantity'] -= $_POST['hdnQuantity'];
        header("location: cart.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <title>I Tee | Confirm Removal</title>
</head>
<body class="bg-secondary">
    <form method="post">
        <div class="row bg-dark text-white">
            <div class="col-10">
                <h1 class="text-warning mx-5 p-2"><i class="fas fa-tshirt px-3"></i>I Tee</h1>
            </div>
            <div class="col-2 text-right">
                <a href="cart.php" class="btn text-warning py-3 mx-5">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="badge badge-warning p-1">                        
                        <?php echo (isset($_SESSION['totalQuantity']) ? $_SESSION['totalQuantity'] : "0"); ?>
                    </span>
                </a>
                <a href="login-admin.php" class="btn text-warning">
                Login
            </a>
            </div>            
        </div>
    <br>
        <div class="container mt-5 py-5">
            <div class="row">
                <?php if(isset($_GET['k']) && isset($products[$_GET['k']])): ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="product-grid2 card bg-dark">
                            <div class="product-image2">
                                <a href="">
                                    <img class="pic-1" src="img/<?php echo $products[$_GET['k']]['photo1']; ?>">
                                    <img class="pic-2" src="img/<?php echo $products[$_GET['k']]['photo2']; ?>">
                                </a>                            
                            </div>                        
                        </div>
                    </div>                
                    <div class="col-md-8 col-sm-6 mb-4">                
                        <h3 class="title text-warning">
                            <?php echo $products[$_GET['k']]['name']; ?>
                            <span class="badge badge-warning text-dark">₱ <?php echo $products[$_GET['k']]['price']; ?></span>
                        </h3>
                        <p class="text-light"><?php echo $products[$_GET['k']]['description']; ?></p>                    
                        <hr>
                        <input type="hidden" name="hdnKey" value="<?php echo $_GET['k']; ?>">
                        <input type="hidden" name="hdnSize" value="<?php echo $_GET['s']; ?>">
                        <input type="hidden" name="hdnQuantity" value="<?php echo $_GET['q']; ?>">

                        <h3 class="title text-warning">Size: <span class="text-light"><?php echo $_GET['s']; ?></span></h3>                        
                        <hr>
                        <h3 class="title text-warning">Quantity: <span class="text-light"><?php echo $_GET['q']; ?></span></h3>
                        <br>
                        <button type="submit" name="btnProcess" class="btn btn-dark btn-lg"><i class="fa fa-trash"></i> Confirm Product Removal</button>
                        <a href="cart.php" class="btn btn-danger btn-lg"><i class="fa fa-arrow-left"></i> Cancel / Go Back</a>
                    </div>                                
                <?php else: ?>
                    <div class="col-12 card p-5">
                        <h3 class="text-center text-danger">No Product Found!</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>