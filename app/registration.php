<?php
function registration(array $data): void
{
    $password = htmlspecialchars($data['password']);
    $confirmPassword = htmlspecialchars($data['confirmPassword']);
    emailDuplicate($data['email']);
    pwdCheck($password, $confirmPassword);
    $data = [
        'name' => htmlspecialchars($data['name']),
        'surname' => htmlspecialchars($data['surname']),
        'phone' => htmlspecialchars($data['phone']),
        'email' => htmlspecialchars($data['email']),
        'square_for_rent' => htmlspecialchars($data['square']),
        'square' => htmlspecialchars($data['square']),
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ];
    insertRecord('users', $data);
    notify('You are now registered', 'success');
    redirect('login');
}

function emailDuplicate($email): bool
{
    $issetEmail = selectRecord('email', 'users', $email, email: true);
    rdrCondition(empty($email), '/register', 'Email is empty', return: 'false');
    rdrCondition($issetEmail['email'] === $email, '/register', 'Email is taken', return: 'false');
    return true;
}

function pwdCheck($password, $confirmPassword): bool
{
    rdrCondition($confirmPassword !== $password, '/register', 'password don\'t match', return: 'false');
    return true;
}
