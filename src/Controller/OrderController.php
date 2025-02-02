<?php


class OrderController
{
    public function getOrder()
    {
        require "./../View/order.php";
    }
    public function postOrder()
    {
        session_start();

        $user_id = $_SESSION['user_id'];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        require_once './../Model/UserProduct.php';
        $cart = new UserProduct();
        $cart = $cart -> getCart();
        $total = 0;
        foreach ($cart as $product):
            $total += $product['qty']*$product['price'] ;
        endforeach;

        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, name, email, phone, address,total) VALUES (:user_id, :name, :email, :phone, :address, :total)");
        $stmt->execute(['user_id'=>$user_id,   'name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address, 'total' => $total]);

//        $one = $stmt->fetchAll();
//        print_r($one);

        $product_id = [];
        $qty =[];
        foreach ($cart as $product):
            $product_id = $product['product_id'];
            $qty = $product['qty'];
            endforeach;

        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
        $stmt = $pdo->prepare("INSERT INTO order_products (product_id, qty) VALUES (:product_id, :qty)");
        $stmt->execute(['product_id'=>$product_id, 'qty'=>$qty]);



    }
}