<?php

namespace Culture;

class Controller
{

    public static function route($request): void
    {
        $login = new LoginController();
        $registration = new RegistrationController();
        $culture = new CultureController();
        $order = new OrderController();
        match ($request) {
            //authentication
            'login' => $login->login($_POST),
            //registration
            'register' => $registration->registration($_POST),
            //logout
            'logout' => remUserSes(),
            'profileUpdate' => profileUpdate($_POST),
            'createCulture' => $culture->createCulture($_POST),
            'createOrder' => $order->createOrder($_POST),
            'deleteCulture' => deleteCulture($_POST['cultureId']),
            'deleteUser' => deleteUser($_POST['userId']),
            'deleteSquare' => deleteSquare($_POST),
            default => ""
        };
    }

}
