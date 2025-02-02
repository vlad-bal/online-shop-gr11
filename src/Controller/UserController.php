<?php

require_once './../Model/User.php';
class UserController
{

    public function getRegistrationForm()
    {
        require_once './../View/get_registrate.php';
    }
    public function registrate()
    {
        $errors = $this->validateRegistration($_POST);

        if (empty($errors)) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["psw"];
            $passwordRep = $_POST["psw-repeat"];


            $hash = password_hash($password, PASSWORD_DEFAULT);#
            $user = new User();
            $user->create($name, $email, $hash);

            header('Location: /login');

        } else {
            require_once "./../View/get_registrate.php";

        }
    }
    private function validateRegistration(array $methodPost): array
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

            $user = new User();
            $userData = $user->getByEmail($email);

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
    public function getloginForm()
    {
        require_once './../View/get_login.php';
    }

    public function login()
    {
        $errors = $this->validateLogin($_POST);

        if (empty($errors)) {
            $password = $_POST['psw'];
            $email = $_POST["email"];

             $user = new User();
             $userData = $user->getByEmail($email);

            if ($userData === false) {
                $errors['email'] = 'User does not exist';
                require_once './../View/get_login.php';
            } else {
                if (password_verify($password, $userData['password'])) {
                    //setcookie('user_id', $userData['id']);
                    session_start();
                    $_SESSION['user_id'] = $userData['id'];
                    header('Location: /catalog');
                } else {
                    $errors['password'] = 'Wrong password';
                    require_once './../View/get_login.php';
                }
            }
        } else {
            require_once './../View/get_login.php';
        }

    }
    private function validateLogin( array $methodPost) : array
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


}