<?php

$name = $_GET["name"];
$email = $_GET["email"];
$password = $_GET["psw"];
$passwordRep = $_GET["psw-repeat"];



$pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb', 'user', 'pwd');
$pdo->exec("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");

//print_r($name);
//print_r();

$result = $pdo->query( "SELECT max(id) as id, '$name' as name, '$email' as email FROM users


");

print_r($result->fetch());