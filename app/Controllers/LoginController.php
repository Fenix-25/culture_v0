<?php
namespace Culture;
use Culture\DatabaseController as DB;
class LoginController
{
    public function login(array $data)
    {
        unset($_SESSION['user']);
        if (empty($data['email'])) {
            notify('Email is empty');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $userFromDB = DB::selectRecord('*', 'users', $data['email'], email: true);
        if ($userFromDB['email'] !== $data['email'] || !password_verify($data['password'], $userFromDB['password'])) {
            notify("Don't have records");
            redirect('login');
            return false;
        }
        $_SESSION['user'] = $userFromDB;
        notify("Welcome {$_SESSION['user']['name']}", 'success');
        if (isAdmin()) {
            redirect('admin');
        } else {
            redirect('home');

        }
    }
}