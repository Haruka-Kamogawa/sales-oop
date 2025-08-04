<?php

    session_start();

    require_once "../classes/User.php";

    $buy_quantity = $_SESSION['quantity'];

    $product_obj = new User;
    $product = $product_obj->getProduct($_POST['id']);

    $total_price = $product['price'] * $buy_quantity;

    if(isset($_POST['pay_btn'])){
        $id = $_POST['id'];
        $payment = $_POST['payment'];

        if($payment == $total_price){
            header('Location: ../views/dashboard.php');
            exit;
        }else{
            $_SESSION['error'] = "支払金額が正しくありません。";
            header("Location: ../views/payment.php?id=" . $id);
            exit;
        }
    }

?>