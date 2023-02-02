<?php

namespace Culture;

class RegistrationController extends Controller
{
    public static function index()
    {
        return self::view('Registration', folder: 'auth');
    }
    public static function registration(array $request): void
    {
        if (self::emptyFieldsErrorMsg($request)) {
            self::redirect('register');
        }
        $password = htmlspecialchars($request['password']);
        $confirmPassword = htmlspecialchars($request['confirmPassword']);
        self::emailDuplicate($request['email']);
        self::pwdCheck($password, $confirmPassword);
        $data = [
            'name' => htmlspecialchars($request['name']),
            'surname' => htmlspecialchars($request['surname']),
            'phone' => htmlspecialchars($request['phone']),
            'email' => htmlspecialchars($request['email']),
            'square_for_rent' => htmlspecialchars($request['square']),
            'square' => htmlspecialchars($request['square']),
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ];
        DatabaseController::insertRecord('users', $data);
        self::notify('You are now registered', 'success');
        self::redirect('login');
    }

    protected static function emailDuplicate($email): bool
    {
        $issetEmail = DatabaseController::selectRecord('email', 'users', "(email = '$email'");
        self::rdrCondition($issetEmail['email'] === $email, '/register', 'Email is taken' );
        return true;
    }

    protected static function pwdCheck($password, $confirmPassword): bool
    {
        self::rdrCondition($confirmPassword !== $password, '/register', 'password don\'t match');
        return true;
    }
}