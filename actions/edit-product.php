<?php
    require_once "../classes/User.php";

    $product = new User;

    $product->update($_POST);

?>