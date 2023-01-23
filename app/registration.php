<?php
function registration( array $data): void
{
    $password = htmlspecialchars($data['password']);
    $confirmPassword = htmlspecialchars($data['confirmPassword']);
    emailDuplicate($data['email']);
    pwdCheck($password, $confirmPassword);
    $query = "insert into users(name, surname, phone, password, email) values (:name, :surname, :phone, :password,:email)";
    $user = PDO_Connect::connect()->prepare($query);
    $user->execute([
        ':name' => htmlspecialchars($data['name']),
        ':surname' => htmlspecialchars($data['surname']),
        ':phone' => htmlspecialchars($data['phone']),
        ':email' => htmlspecialchars($data['email']),
        ':password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    notify('You are now registered', 'success');
    redirect('/login');
}

function emailDuplicate($email): bool
{
    $query = "select email from users where email = :email";
    $issetEmail = PDO_Connect::connect()->prepare($query);
    $issetEmail->execute([
        ':email' => $email
    ]);
    $issetEmail = $issetEmail->fetchColumn();
    rdrCondition(empty($email), '/register', 'Email is empty', return: 'false');
    rdrCondition($issetEmail > 0, '/register', 'Email is taken', return: 'false');
    return true;
}

function pwdCheck($password, $confirmPassword): bool
{
    rdrCondition($confirmPassword !== $password, '/register', 'password don\'t match', return: 'false');
    return true;
}
