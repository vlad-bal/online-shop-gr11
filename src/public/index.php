<?php


$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

require_once './../Controller/UserController.php';
require_once './../Controller/ProductController.php';
require_once './../Controller/CatalogController.php';
require_once './../Controller/CartController.php';
require_once './../Controller/OrderController.php';

if ($requestUri === '/login') {
    if ($requestMethod === 'GET') {
        $loginController = new UserController();
        $loginController->getloginForm();
    } elseif ($requestMethod === 'POST') {
        $loginController = new UserController();
        $loginController->login();
    } else {
        echo 'Invalid request method';
    }
}
elseif ($requestUri === '/registration') {
    if ($requestMethod === 'GET') {
        $user1 = new UserController();
        $user1->getRegistrationForm();
    }
    elseif ($requestMethod === 'POST') {
        $userController = new UserController();
        $userController->registrate();
    } else {
        echo 'Invalid request method';
    }
}
elseif ($requestUri === '/catalog') {
    if ($requestMethod === 'GET') {
        $catalog = new CatalogController();
        $catalog->getCatalog();
    } else {
        echo 'Invalid request method';
    }
}
elseif ($requestUri === '/add-product') {
    if ($requestMethod === 'GET') {
        $product = new ProductController();
        $product->getAddProduct();
    }elseif ($requestMethod === 'POST') {
        $productController = new ProductController();
        $productController->postAddProduct();
    } else {
        echo 'Invalid request method';
    }
}
elseif ($requestUri === '/cart') {
    if ($requestMethod === 'GET')
    {
        $cartController = new CartController();
        $cartController->getСart();
    }
}
if (($requestUri === '/order') or ($requestUri === '/order?')) {
    if ($requestMethod === 'GET') {
        $orderController = new OrderController();
        $orderController->getOrder();
    } elseif ($requestMethod === 'POST') {
        $orderController = new OrderController();
        $orderController->postOrder();
    } else {
        echo 'Invalid request method';
    }
}
