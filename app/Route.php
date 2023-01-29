<?php
switch (getUrl()) {
    case "":
        view('index', folder: 'pages');
        break;
    case 'home':
        rdrCondition(empty($_SESSION['user']), 'login');
        require_once 'views/pages/userHome.php';
        break;
    case 'login':
        rdrCondition(!empty($_SESSION['user']), 'home');
        view('Login', 'Login','auth');
        break;
    case 'register':
        rdrCondition(!empty($_SESSION['user']), 'home');
        view('Registration', 'Registration', 'auth');
        break;
    case 'profile':
        rdrCondition(empty($_SESSION['user']), 'login');
        view('Profile', 'Profile');
        break;
    case 'createCulture':
        rdrCondition(empty($_SESSION['user']['isAdmin']), 'login');
        view('CreateCulture','Culture','culture');
        break;
    case"allData":
        rdrCondition(empty($_SESSION['user']['isAdmin']), 'login');
        require_once 'pages/allData.php';
        break;
    case"admin":
        rdrCondition(empty($_SESSION['user']['isAdmin']), 'login');
        require_once 'views/pages/home.php';
        break;
    case"dashboard":
        rdrCondition(empty($_SESSION['user']['isAdmin']), 'login');
        view('Dashboard', folder: 'pages');
        break;
    case"orders":
        rdrCondition(empty($_SESSION['user']['isAdmin']), '/login');
        view('Orders', 'Order','pages');
        break;
    case"createOrder":
        rdrCondition(empty($_SESSION['user']['isAdmin']), 'login');
        view('CreateOrder', 'Order', 'pages/user');
        break;
    case"customers":
        rdrCondition(empty($_SESSION['user']['isAdmin']), '/login');
        require_once 'pages/customers.php';
        break;
    default:
        pageNotFound();
}