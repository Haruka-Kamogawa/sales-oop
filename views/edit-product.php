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
            <h1 class="text-center mb-4 text-warning display-3"><i class="fa-solid fa-pen-to-square"></i> EDIT USER</h1>

            <form action="../actions/edit-product.php" method="post">
                <input type="hidden" name="id" value="<?=$product['id']?>">
                <div class="row mt-4">
                    <div class="col">
                        <label for="productname" class="form-label">Product Name</label>
                        <input type="text" name="productname" id="productname" class="form-control" maxlength="15" value="<?=$product['product_name']?>" required autofocus>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="price" id="price" class="form-control" value="<?=$product['price']?>" required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="<?=$product['quantity']?>"required>
                    </div>
                </col>

                <button type="submit" class="btn btn-warning mt-5">Add</button>
            </form>

        </div>
    </main>

</body>
</html>