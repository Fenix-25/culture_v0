<?php
function authentication( array $data):bool
{
    unset($_SESSION['user']);
    if (empty($data['email'])){
        notify('Email is empty');
        redirect($_SERVER['HTTP_REFERER']);
    }
    $userFromDB = selectRecord('*', 'users',  $data['email'], email: true);
    if ($userFromDB['email'] !== $data['email'] || !password_verify($data['password'], $userFromDB['password'])) {
        notify("Don't have records");
        redirect('/login');
        return false;
    }
    $_SESSION['user'] = $userFromDB;
    notify("Welcome {$_SESSION['user']['name']}", 'success');
    rdrCondition($_SESSION['user']['isAdmin'] && !empty($_SESSION['user']),'/admin', return: false, isAdmin: true);
    redirect('/home');
}