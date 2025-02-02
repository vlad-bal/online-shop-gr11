<?php



class User
{
    public function create(string $name, string $email, string $password)
    {
        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password]);
    }

    public function getByEmail(string $email): mixed
    {    $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
         $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
         $stmt->execute(['email' => $email]);
         $userData = $stmt->fetch();
         return $userData;
    }

}