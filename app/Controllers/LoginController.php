<?php
namespace Culture;

class LoginController
{
    public static function index()
    {
        return Helper::view('Login', folder: 'auth');
    }
    public static function login(array $data)
    {
        unset($_SESSION['user']);
        if (empty($data['email'])) {
            Helper::notify('Email is empty');
            Helper::redirect($_SERVER['HTTP_REFERER']);
        }
        $userFromDB = DatabaseController::selectRecord('*', 'users', $data['email'], email: true);
        if ($userFromDB['email'] !== $data['email'] || !password_verify($data['password'], $userFromDB['password'])) {
            Helper::notify("Don't have records");
            Helper::redirect('login');
            return false;
        }
        $_SESSION['user'] = $userFromDB;
        Helper::notify("Welcome {$_SESSION['user']['name']}", 'success');
        if (Helper::isAdmin()) {
            Helper::redirect('dashboard');
        } else {
            Helper::redirect('home');

        }
    }
}