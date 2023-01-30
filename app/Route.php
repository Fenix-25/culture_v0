<?php

use Culture\Helper;
use Culture\Route;

$route = new Route();
$route->addRoute('', "IndexController", "index");
$route->addRoute('login', "LoginController", "index");
$route->addRoute('register', "RegistrationController", "index");
$route->addRoute('fertilize', "FertilizeController", "index");
$route->addRoute('dashboard', "DashboardController", "index");
$route->addRoute('orders', "OrderController", "index");
$route->addRoute('createOrder', "OrderController", "create");
$route->addRoute('createCulture', "CultureController", "index");
$route->addRoute('customers', "CustomersController", "index");
$route->addRoute('allData', "Helper", "view", ['allData']);
$route->addRoute('profile', "ProfileController", "index");
$route->addRoute('home', "Helper", "view",['IndexUser']);
$route->route(Helper::getUrl());
