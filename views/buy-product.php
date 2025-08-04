<?php
    session_start();

    require_once "../classes/User.php";


    $product_obj = new User;
    $product = $product_obj->getProduct($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <i class="fa-solid fa-house fs-1"></i>
            </a>

            <span class="navbar-text fs-1"><?=$_SESSION['full_name']?></span>
            <div class="navbar-nav">    
                <form action="../actions/logout.php" mathod="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0"><i class="fa-solid fa-user-xmark fs-1"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-4">
            <h1 class="text-center mb-4 text-success display-3"><i class="fa-solid fa-cash-register"></i> Buy Product</h1>

            <form action="../actions/buy-product.php" method="post">
                <input type="hidden" name="id" value="<?=$product['id']?>">
                <div class="row mt-4">
                    <div class="col">
                        <span>Product Name</span>
                        <h3 class="fw-bold"><?=$product['product_name']?></h3>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <span>Price</span>
                        <h3 class="fw-bold">$ <?=$product['price']?></h3>
                    </div>
                    <div class="col">
                        <span>Quantity</span>
                        <h3 class="fw-bold"><?=$product['quantity']?></h3>
                    </div>
                </col>

                <div class="row mt-4">
                    <div class="col">
                        <span>Buy quantity</span>
                        <input type="number" name="quantity" id="quantity" class="form-control w-50 mx-auto" value="" required autofocus>
                    </div>
                </div>


                <button type="submit" name="buy_btn" class="btn btn-success mt-5">Pay</button>
            </form>

        </div>
    </main>

</body>
</html>