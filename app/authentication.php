<?php
function authentication( array $data):bool
{
    unset($_SESSION['user']);
    $userFromDB = selectRecord('*', 'users',  $data['email'], email: true);

    if ($userFromDB['email'] !== $data['email'] || !password_verify($data['password'], $userFromDB['password'])) {
        notify("Don't have records");;
        redirect('/login');
        return false;
    }

    $_SESSION['user'] = $userFromDB;
    notify("Welcome {$_SESSION['user']['name']}", 'success');
    rdrCondition(!empty($_SESSION['user']),'admin/home', return: false, isAdmin: true);
    redirect('/home');
}