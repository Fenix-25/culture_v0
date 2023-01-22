<?php
function authentication( array $data):bool
{
    unset($_SESSION['user']);
    $query = "select * from users where email = :email";
    $userFromDB = PDO_Connect::connect()->prepare($query);
    $userFromDB->execute([
        ':email' => htmlspecialchars($data['email']),
    ]);
    $userFromDB = $userFromDB->fetch(PDO::FETCH_ASSOC);

    if ($userFromDB['email'] !== $data['email'] || !password_verify($data['password'], $userFromDB['password'])) {
        notify("Don't have records");;
        redirect('/login');
        return false;
    }

    $_SESSION['user'] = $userFromDB;
    notify("Welcome {$_SESSION['user']['name']}", 'success');;
    redirect('/home');
    return  true;
}