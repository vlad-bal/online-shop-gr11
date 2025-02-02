<?php



class UserProduct
{

    public function getCart():array
    {
        session_start();
        if (isset($_SESSION["user_id"]))
        {
            $a = $_SESSION['user_id'];
        } else {
            print_r('Please log in first');
            exit;
        }
        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
        $stmt = $pdo->query("SELECT * FROM user_products inner join products on user_products.product_id = products.id where user_id = $a");
        $stmt->execute();
        $cart = $stmt->fetchAll();
        return $cart;
    }

//    public function getCart():array
//    {
//
//        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
//        $stmt = $pdo->query("SELECT *, name, price FROM user_products inner join products on user_products.product_id = products.id");
//        $stmt->execute();
//        $cart = $stmt->fetchAll();
//        return $cart;
//    }

    public function getUserProducts()
    {

        session_start();
        $user_id = $_SESSION['user_id'];
        $productId = $_POST["product-id"];
        $qty = $_POST["qty"];


        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
        $stmt = $pdo->prepare("SELECT * FROM user_products where user_id = :user_id and product_id = :product_id");
        $stmt->execute(['user_id' => $user_id, 'product_id' => $productId]);
        $productAvailability = $stmt->fetch();
        return $productAvailability;
    }
    public function updateUserProducts()
    {
        session_start();
        $user_id = $_SESSION['user_id'];
        $productId = $_POST["product-id"];
        $qty = $_POST["qty"];

        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
        $stmt = $pdo->prepare("UPDATE user_products SET qty = qty + :qty WHERE user_id = :user_id and product_id = :product_id");
        $stmt->execute(['qty' => $qty, 'user_id' => $user_id, 'product_id' => $productId]);
    }
    public function insertUserProducts()
    {
        session_start();
        $user_id = $_SESSION['user_id'];
        $productId = $_POST["product-id"];
        $qty = $_POST["qty"];

        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
        $stmt = $pdo->prepare("INSERT INTO user_products (user_id, product_id, qty) VALUES (:user_id, :product_id, :qty)");
        $stmt->execute(['user_id' => $user_id, 'product_id' => $productId, 'qty' => $qty]);

    }


    



}