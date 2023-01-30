<?php

namespace Culture;

class Controller
{

    public static function route($request): void
    {
        match ($request) {
            //authentication
            'login' => LoginController::login($_POST),
            //registration
            'register' => RegistrationController::registration($_POST),
            //logout
            'logout' => Helper::remUserSes(),
            'profileUpdate' => ProfileController::profileUpdate($_POST),
            'createCulture' => CultureController::createCulture($_POST),
            'createOrder' => OrderController::createOrder($_POST),
            'deleteCulture' => CultureController::deleteCulture($_POST['cultureId']),
            'deleteUser' => UserController::deleteUser($_POST['userId']),
            'deleteSquare' => SquareController::deleteSquare($_POST),
            default => Helper::pageNotFound()
        };
    }

}
