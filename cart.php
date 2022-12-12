<?php
    session_start();
    require_once('products.php');
    $_SESSION['totalSold'] = 0;
    $_SESSION['totalAmount'] = 0;

    if(isset($_POST['btnUpdate'])) {
        
        $cartKeys = $_POST['hdnKey'];
        $cartSize = $_POST['hdnSize'];
        $cartQuantities = $_POST['txtQuantity'];
     
        if(isset($cartKeys) && isset($cartSize) && isset($cartQuantities)) {

            $_SESSION['totalQuantity'] = 0;

            foreach($cartKeys as $index => $key) {
 
                $_SESSION['cartItems'][$key][$cartSize[$index]] = $cartQuantities[$index];

                $_SESSION['totalQuantity'] += $cartQuantities[$index];
            }
        }
    }
    if(isset($_POST['btnCheckout'])){
        if(!isset($_SESSION['totalSold'])){
            $_SESSION['totalSold'] += $_SESSION['totalQuantity'];}
        else{
            $_SESSION['totalSold'] = $_SESSION['totalQuantity'] + $_SESSION['totalSold'];}
    header('location: clear.php');
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
    <title>I Tee | Shopping Cart</title>
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
                <div class="col-12">
                    <table class="table text-light">
                        <thead>
                            <tr>
                                <th scope="col-1"> </th>
                                <th scope="col-3">Product</th>
                                <th scope="col-1">Size</th>
                                <th scope="col-2">Quantity</th>
                                <th scope="col-2">Price</th>
                                <th scope="col-2">Total</th>
                                <th scope="col-1"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(isset($_SESSION['cartItems'])): ?>
                                <?php foreach($_SESSION['cartItems'] as $key => $value): ?>
                                    <?php foreach($value as $size => $quantity): ?>

                                        <?php $_SESSION['totalAmount'] += $products[$key]['price'] * $quantity; ?>                                        
                                        
                                        <tr>                                        
                                            <td><img src="img/<?php echo $products[$key]['photo1']; ?>" class="img-thumbnail bg-dark" style="height: 50px;"></td>
                                            <td class="text-warning"><b><?php echo $products[$key]['name']; ?></b></td>
                                            <td><?php echo $size; ?></td>
                                            <td>
                                                
                                                <input type="hidden" name="hdnKey[]" value="<?php echo $key; ?>">
                                                <input type="hidden" name="hdnSize[]" value="<?php echo $size; ?>">
                                                <input type="number" name="txtQuantity[]" value="<?php echo $quantity; ?>" class="form-control text-center" min="1" max="100" required style="width: 150px;">
                                            </td>
                                            <td>₱ <?php echo number_format($products[$key]['price'], 2); ?></td>
                                            <td>₱ <?php echo number_format($products[$key]['price'] * $quantity, 2); ?></td>
                                            
                                            <td><a href="remove-confirm.php?<?php echo 'k=' . $key . '&s=' . $size . '&q=' . $quantity; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                    <tr>
                                        <td colspan="2"> </td>
                                        <td><b>Total</b></td>
                                        <td><?php echo $_SESSION['totalQuantity']; ?></td>
                                        <td>----</td>
                                        <td><b>₱ <?php echo number_format($_SESSION['totalAmount'], 2); ?><b></td>
                                        <td>----</td>
                                    </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-warning">Cart is still Empty</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>                
                </div>            
            </div>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <a href="index.php" class="btn btn-danger btn-lg btn-block"><i class="fa fa-shopping-bag"></i> Continue Shopping</a>
                </div>
                <?php if(isset($_SESSION['cartItems'])){?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <button type="submit" name="btnUpdate" class="btn btn-success btn-lg btn-block"><i class="fa fa-edit"></i> Update Cart</button>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <button type="submit" name="btnCheckout" class="btn btn-primary btn-lg btn-block"><i class="fa fa-edit"></i> Checkout</button>
                    </div>
                        
                    <?php }?>
            </div>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>