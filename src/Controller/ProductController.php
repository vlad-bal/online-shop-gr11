<?php
require_once './../Model/UserProduct.php';
class ProductController
{
    public function getAddProduct()
    {
        require_once './../View/get_add_product.php';

    }
    public function postAddProduct()
    {
        $userProduct = new UserProduct();
        $productAvailability = $userProduct->getUserProducts();


        if ($productAvailability) {
            $userProduct = new UserProduct();
            $userProduct->updateUserProducts();
        } else {
            $userProduct = new UserProduct();
            $userProduct->insertUserProducts();
        }
    }

//    public function postAddProduct()
//    {
//        session_start();
//        $user_id = $_SESSION['user_id'];
//        $productId = $_POST["product-id"];
//        $qty = $_POST["qty"];
//
//        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
//        $stmt = $pdo->prepare("SELECT * FROM user_products where user_id = :user_id and product_id = :product_id");
//        $stmt->execute(['user_id' => $user_id, 'product_id' => $productId]);
//        $productAvailability = $stmt->fetch();
//
//
//        if ($productAvailability) {
//            $stmt = $pdo->prepare("UPDATE user_products SET qty = qty + :qty WHERE user_id = :user_id and product_id = :product_id");
//            $stmt->execute(['qty' => $qty, 'user_id' => $user_id, 'product_id' => $productId]);
//        } else {
//            $stmt = $pdo->prepare("INSERT INTO user_products (user_id, product_id, qty) VALUES (:user_id, :product_id, :qty)");
//            $stmt->execute(['user_id' => $user_id, 'product_id' => $productId, 'qty' => $qty]);
//        }
//
//
//        $stmt = $pdo->query("SELECT * FROM user_products;");
//        print_r($stmt->fetchAll());
//
//    }

}