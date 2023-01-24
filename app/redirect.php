<?php
require_once 'functions.php';
require_once 'app/controller.php';

switch (getUrl()) {
    case "":
        rdrCondition(!empty($_SESSION['user']), '/home');
        require_once 'pages/main.php';
        break;
    case 'home':
        rdrCondition(empty($_SESSION['user']), '/login');
        require_once 'pages/home.php';
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
        rdrCondition(empty($_SESSION['user']), '/home');
        require_once 'pages/profilePage.php';
        break;
    case 'createCulture':
        rdrCondition(empty($_SESSION['user']), '/home');
        require_once 'pages/culture/createCulture.php';
        break;
    case"createOrder":
        rdrCondition(empty($_SESSION['user']), '/login');
        require_once 'pages/user/createOrder.php';
        break;
    case"allData":
        rdrCondition(empty($_SESSION['user']), '/login');
        require_once 'pages/allData.php';
        break;
    default:
        pageNotFound();
}