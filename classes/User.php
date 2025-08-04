<?php
require_once "Database.php"; // import Database class

class User extends Database{


    public function store($request){ // $request is equal to $_POST
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(`first_name`, `last_name`, `username`, `password`) VALUES ('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql)){
            header('location:../views/login.php');
            exit;
        }else{
            die('Error creating the user: ' . $this->conn->error);
        }
    }

    public function login($request){
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            $user = $result->fetch_assoc();

            if(password_verify($password, $user['password'])){
                // Create session variables for future use
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $user['first_name'] . " " . $user['last_name'];

                header('location:../views/dashboard.php');

            }else{
                die('Password is incorrect');
            }

        }else{
            die('Username not found.');
        }
    }

    public function getAllProducts(){
        $sql = "SELECT * FROM products";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die('Error retrieving all users: ' . $this->conn->error);
        }
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header('location:../views/login.php');
        exit;
    }

    public function addProduct($request){ // $request is equal to $_POST
        $productname = $request['productname'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "INSERT INTO products(`product_name`, `price`, `quantity`) VALUES ('$productname', '$price', '$quantity')";

        if($this->conn->query($sql)){
            header('location:../views/dashboard.php');
            exit;
        }else{
            die('Error creating the user: ' . $this->conn->error);
        }
    }

    public function getProduct($id){
        $sql = "SELECT * FROM products WHERE id = $id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc(); // expecting one record
        }else{
            die('Error retrieving the user: . $this->conn->error');
        }
    }

    public function update($request){
        $id = $request['id'];
        $productname = $request['productname'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "UPDATE products
                SET product_name = '$productname',
                    price = '$price',
                    quantity = '$quantity'
                WHERE id = $id";

        if($this->conn->query($sql)){
            header('location:../views/dashboard.php');
            exit;
        }else{
            die('Error uploading products: ' . $this->conn->error);
        }
    }

    public function deleteProduct($request){
        $id = $request['id'];

        $sql = "DELETE FROM products WHERE id = $id";

        if($this->conn->query($sql)){
            header('location:../views/dashboard.php');
            exit;
        }else{
            die('Error deleteing product: ' . $this->conn->error);
        }
    }

        public function updatequantity($request){
        session_start();
        $id = $request['id'];
        $quantity = $request['quantity'];


        $sql = "UPDATE products
                SET quantity = quantity - '$quantity'
                WHERE id = $id";



        if($this->conn->query($sql)){
            $_SESSION['quantity'] = $quantity;
            header("location:../views/payment.php?id=$id");
            exit;
        }else{
            die('Error uploading quantity: ' . $this->conn->error);
        }
    }

}