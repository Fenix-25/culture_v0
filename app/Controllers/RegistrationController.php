<?php

namespace Culture;
use Culture\DatabaseController as DB;
class RegistrationController
{
    public function registration(array $data): void
    {
        $password = htmlspecialchars($data['password']);
        $confirmPassword = htmlspecialchars($data['confirmPassword']);
        $this->emailDuplicate($data['email']);
        $this->pwdCheck($password, $confirmPassword);
        $data = [
            'name' => htmlspecialchars($data['name']),
            'surname' => htmlspecialchars($data['surname']),
            'phone' => htmlspecialchars($data['phone']),
            'email' => htmlspecialchars($data['email']),
            'square_for_rent' => htmlspecialchars($data['square']),
            'square' => htmlspecialchars($data['square']),
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ];
        DB::insertRecord('users', $data);
        notify('You are now registered', 'success');
        redirect('login');
    }

    protected function emailDuplicate($email): bool
    {
        $issetEmail = DB::selectRecord('email', 'users', $email, email: true);
        rdrCondition(empty($email), '/register', 'Email is empty', return: 'false');
        rdrCondition($issetEmail['email'] === $email, '/register', 'Email is taken', return: 'false');
        return true;
    }

    protected function pwdCheck($password, $confirmPassword): bool
    {
        rdrCondition($confirmPassword !== $password, '/register', 'password don\'t match', return: 'false');
        return true;
    }
}