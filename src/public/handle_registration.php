<?php

//$name = $_POST["name"];
//$email = $_POST["email"];
//$password = $_POST["psw"];
//$passwordRep = $_POST["psw-repeat"];

function validateRegistration(array $methodPost) : array
{
    $errors = [];
    $name = $methodPost["name"];
    $email = $methodPost["email"];
    $password = $methodPost["psw"];
    $passwordRep = $methodPost["psw-repeat"];


    if (empty($name)) {
        $errors ["name"] = "Требуется ввести имя";
    } elseif (strlen($name) < 3) {
        $errors["name"] = "Имя должно содержать не менее 3 символов.";
    }

    if (empty($email)) {
        $errors["email"] = "Требуется ввести почту";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Неверный формат почты";
    } else {
        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $userData = $stmt->fetch();
        if (isset($userData['email']) === $email) {
            $errors['email'] = 'Email уже зарегестрирован';
        }
    }

    if (empty($password)) {
        $errors["password"] = "нужно ввести пароль";
    } elseif ($password !== $passwordRep) {
        $errors["passwordRep"] = "Пароль не совпадает";
    } elseif (strlen($password) < 4) {
        $errors["password"] = "Пароль должен сожержать не менее 4 символов";
    }
    return $errors;
}

$errors = validateRegistration($_POST);

if (empty($errors)) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["psw"];
    $passwordRep = $_POST["psw-repeat"];
    $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hash]);

    header('Location: /login');
//    $stmt = $pdo->query("SELECT * FROM users WHERE email = '$email';");
//    print_r($stmt->fetch());
} else {
require_once'./get_registration.php';
}





