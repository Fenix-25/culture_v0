<?php

use Culture\Controller;
use Culture\Route;

$route = new Route();
$route->addRoute('', "IndexController", "index");
$route->addRoute('login', "LoginController", "index");
$route->addRoute('register', "RegistrationController", "index");
$route->addRoute('dashboard', "DashboardController", "index");
//fertilize
$route->addRoute('fertilize', "FertilizeController", "index");
$route->addRoute('create-fertilize', "FertilizeController", "create");
//order
$route->addRoute('orders', "OrderController", "index");
$route->addRoute('create-order', "OrderController", "create");
//culture
$route->addRoute('create-culture', "CultureController", "index");
//option for fertilize
$route->addRoute('create-option', 'OptionController', 'index');

$route->addRoute('customers', "CustomersController", "index");
$route->addRoute('allData', "Controller", "view", ['allData']);
$route->addRoute('profile', "ProfileController", "index");
$route->addRoute('home', "Controller", "view", ['IndexUser']);
$route->route(Controller::getUrl());
