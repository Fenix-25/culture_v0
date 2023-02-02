<?php
namespace Culture;

class LoginController extends Controller
{
    public static function index()
    {
        return self::view('Login', folder: 'auth');
    }
    public static function login(array $request)
    {
        if (self::emptyFieldsErrorMsg($request)) {
            self::redirect('login');
        }
        unset($_SESSION['user']);
        $userFromDB = DatabaseController::selectRecord('*', 'users', "email = '{$request['email']}'");
        if ($userFromDB['email'] !== $request['email'] || !password_verify($request['password'], $userFromDB['password'])) {
            self::notify("Don't have records");
            self::redirect('login');
            return false;
        }
        $_SESSION['user'] = $userFromDB;
        self::notify("Welcome {$_SESSION['user']['name']}", 'success');
        if (self::isAdmin()) {
            self::redirect('dashboard');
        } else {
            self::redirect('home');

        }
    }
}