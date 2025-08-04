<?php
    session_start();

    require_once "../classes/User.php";


        $product = new User;
        $product->updatequantity($_POST);

?>