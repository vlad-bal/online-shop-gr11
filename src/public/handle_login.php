<?php


function validateLogin( array $methodPost) : array
{
    $errors = [];

    if (isset($methodPost['email'])) {
        $email = $methodPost['email'];
        } else {
        $errors['email'] = 'Please enter an email address';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }

    if (isset($methodPost['psw'])) {
        $password = $methodPost['psw'];

        if (strlen($password) < 4) {
            $errors['password'] = 'Password must be at least 4 characters long';
        }
    } else {
        $errors['password'] = 'Please enter a password';
    }
    return $errors;
}

$errors = validateLogin($_POST);
if (empty($errors)) {
    $password = $_POST['psw'];
    $email = $_POST["email"];

    $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $userData = $stmt->fetch();
    if ($userData === false) {
        $errors['email'] = 'User does not exist';
        require_once './get_login.php';
    } else {
        if (password_verify($password, $userData['password'])) {
            //setcookie('user_id', $userData['id']);
            session_start();
             $_SESSION['user_id'] = $userData['id'];
            header('Location: /catalog');
        } else {
            $errors['password'] = 'Wrong password';
            require_once './get_login.php';
        }
    }
} else {
    require_once './get_login.php';
}


//password_verify($password, $hash['password'])
   // $hash = $stmt->fetch();


//echo "seccesfull";