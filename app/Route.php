<?php

use Culture\CultureController;
use Culture\CustomersController;
use Culture\DashboardController;
use Culture\FertilizeController;
use Culture\Helper;
use Culture\IndexController;
use Culture\LoginController;
use Culture\OrderController;
use Culture\ProfileController;
use Culture\RegistrationController;

match (Helper::getUrl()) {
    '' => Helper::rdrCondition(Helper::emptyUserSession(), return: IndexController::index()),
    'login' => Helper::rdrCondition(!empty($_SESSION['user']), 'home', return: LoginController::index()),
    'register' => Helper::rdrCondition(!empty($_SESSION['user']), 'home', return: RegistrationController::index()),
    'profile' => Helper::rdrCondition(Helper::emptyUserSession(), return: ProfileController::index()),
    'createCulture' => Helper::rdrCondition(Helper::emptyUserSession(), return: CultureController::index()),
    'allData' => Helper::rdrCondition(Helper::emptyAdminSession(), return: Helper::view('allData')),
    'fertilize' => Helper::rdrCondition(Helper::emptyAdminSession(), return: FertilizeController::index()),
    'dashboard' => Helper::rdrCondition(Helper::emptyAdminSession(), return: DashboardController::index()),
    'orders' => Helper::rdrCondition(Helper::emptyAdminSession(), return: OrderController::index()),
    'createOrder' => Helper::rdrCondition(Helper::emptyAdminSession(), return: OrderController::create()),
    'customers' =>Helper::rdrCondition(Helper::emptyAdminSession(), return: CustomersController::index()),
    'home' =>Helper::rdrCondition(Helper::emptyUserSession(), return: require_once 'views/userHome.php' ),
    default => Helper::pageNotFound(),
};
