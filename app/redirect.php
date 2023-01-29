<?php
switch (getUrl()) {
    case "":
        require_once 'pages/main.php';
        break;
    case 'home':
        rdrCondition(empty($_SESSION['user']), '/login');
        require_once 'pages/userHome.php';
        break;
    case 'login':
        rdrCondition(!empty($_SESSION['user']), '/home');
        require_once 'auth/login.php';
        break;
    case 'register':
        rdrCondition(!empty($_SESSION['user']), '/home');
        require_once 'auth/register.php';
        break;
    case 'profile':
        rdrCondition(empty($_SESSION['user']), '/login');
        require_once 'pages/profilePage.php';
        break;
    case 'createCulture':
        rdrCondition(empty($_SESSION['user']['isAdmin']), '/login');
        require_once 'pages/culture/createCulture.php';
        break;
    case"createOrder":
        rdrCondition(empty($_SESSION['user']['isAdmin']), '/login');
        require_once 'pages/user/createOrder.php';
        break;
    case"allData":
        rdrCondition(empty($_SESSION['user']['isAdmin']), '/login');
        require_once 'pages/allData.php';
        break;
    case"admin":
        rdrCondition(empty($_SESSION['user']['isAdmin']), '/login');
        require_once 'pages/home.php';
        break;
    case"dashboard":
        rdrCondition(empty($_SESSION['user']['isAdmin']), '/login');
        require_once 'pages/dashboard.php';
        break;
    case"orders":
        rdrCondition(empty($_SESSION['user']['isAdmin']), '/login');
        require_once 'pages/orders.php';
        break;
    case"customers":
        rdrCondition(empty($_SESSION['user']['isAdmin']), '/login');
        require_once 'pages/customers.php';
        break;
    default:
        pageNotFound();
}