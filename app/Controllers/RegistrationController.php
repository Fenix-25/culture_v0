<?php

namespace Culture;

class RegistrationController
{
    public static function index()
    {
        return Helper::view('Registration', folder: 'auth');
    }
    public static function registration(array $data): void
    {
        $password = htmlspecialchars($data['password']);
        $confirmPassword = htmlspecialchars($data['confirmPassword']);
        self::emailDuplicate($data['email']);
        self::pwdCheck($password, $confirmPassword);
        $data = [
            'name' => htmlspecialchars($data['name']),
            'surname' => htmlspecialchars($data['surname']),
            'phone' => htmlspecialchars($data['phone']),
            'email' => htmlspecialchars($data['email']),
            'square_for_rent' => htmlspecialchars($data['square']),
            'square' => htmlspecialchars($data['square']),
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ];
        DatabaseController::insertRecord('users', $data);
        Helper::notify('You are now registered', 'success');
        Helper::redirect('login');
    }

    protected static function emailDuplicate($email): bool
    {
        $issetEmail = DatabaseController::selectRecord('email', 'users', $email, email: true);
        Helper::rdrCondition(empty($email), '/register', 'Email is empty', return: 'false');
        Helper::rdrCondition($issetEmail['email'] === $email, '/register', 'Email is taken', return: 'false');
        return true;
    }

    protected static function pwdCheck($password, $confirmPassword): bool
    {
        Helper::rdrCondition($confirmPassword !== $password, '/register', 'password don\'t match', return: 'false');
        return true;
    }
}