<?php
    session_start();

    require_once "../classes/User.php";

    $product_obj = new User;
    $all_products = $product_obj->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <div class="col-6">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h2 class="fw-bold">PRODUCT LIST</h2>
                <button type="button" class="btn btn-info text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-plus fs-2"></i>
                </button>
            </div>

            <?php
            if($all_products->num_rows > 0){
            ?>
            <table class="table table-hover align-middle">
                <thead class="bg-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th><!-- for action buttons --></th>
                        <th><!-- for action buttons --></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($product = $all_products->fetch_assoc()){
                ?>
                    <tr>
                        <td><?=$product['id']?></td>
                        <td><?=$product['product_name']?></td>
                        <td><?=$product['price']?></td>
                        <td><?=$product['quantity']?></td>
                        <td>
                            <a href="edit-product.php?id=<?=$product['id']?>" class="btn btn-warning" title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                        
                            <a href="../actions/delete-product.php?id=<?=$product['id']?>" class="btn btn-danger" title="Delete">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                        <td>
                            <?php
                            if($product['quantity'] > 0){
                            ?>

                            <a href="buy-product.php?id=<?=$product['id']?>" class="btn btn-success" title="Buy">
                                <i class="fa-solid fa-cash-register"></i>
                            </a>
                            
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                    </tbody>
                </table>
                <?php
                }else{
                ?>

                <div class="text-danger bg-black fw-bold display-4 text-center d-flex align-items-center justify-content-center" style="height: 500px;">
                    <div>
                        <p>No Records Found</p>
                        <i class="fa-solid fa-ban"></i>
                    </div>
                </div>
                <?php
                }
                ?>
        </div>
    </main>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content container">
                <div class="modal-body">
                    <div class="text-end mb-5">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <h1 class="modal-title text-info text-center display-4 fw-bold" id="exampleModalLabel"><i class="fa-solid fa-bread-slice"></i> Add Product</h1>

                    <form action="../actions/add-product.php" method="post">
                        <div class="row mt-4">
                            <div class="col">
                                <label for="productname" class="form-label">Product Name</label>
                                <input type="text" name="productname" id="productname" class="form-control" maxlength="15" required autofocus>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" name="price" id="price" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>
                        </col>

                        <button type="submit" class="btn btn-info w-100 mt-5">Add</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>