<?php
function profileUpdate(array $data): void
{
    //get user from db
    $userFromDb = getUserFromDB($_SESSION['user']['id']);
    //check match for confirm new password
    confirmNewPassword($data['newPassword'], $data['confirmPassword']);
    // check the password match with old
    if (!empty($data['oldPassword'])) {
        passwordMatches($data['oldPassword'], $userFromDb['password']);
    }
    //record new password to db
    newPasswordRecord($data['newPassword']);
    notify('Profile successfully updated!', 'success');
    redirect('/profile');
    newAuth(3);
}

function newAuth(int $timeSleep): void
{
    sleep($timeSleep);
    unset($_SESSION['user']);
    notify('Use new data to login', 'success');
    redirect('/login');
}


function getUserFromDB($id)
{
    $userFromDb = PDO_Connect::connect()->prepare("select * from users where id = :id");
    $userFromDb->execute([':id' => $id]);
    return $userFromDb->fetch(PDO::FETCH_ASSOC);
}

function confirmNewPassword(string $password, string $confirm): bool
{
    if ($password !== $confirm) {
        notify('New password and confirmation don\'t match!');
        redirect('/profile');
        return false;
    }
    return true;
}

function passwordMatches(string $oldPassword, string $passwordFromDB): bool
{
    if (!password_verify($oldPassword, $passwordFromDB)) {
        notify('Old password is wrong!');
        redirect('/profile');
        return false;
    }
    if (!password_verify($oldPassword, $passwordFromDB)) {
        notify('Old and new passwords is matches!');
        redirect('/profile');
        return false;
    }
    return true;
}

function newPasswordRecord(string $password)
{
    if (empty($password)) {
        return false;
    }
    $newPassword = PDO_Connect::connect()->prepare("update users set password = :password where id = :user_id");
    $newPassword->execute([
        ':password' => password_hash($password, PASSWORD_BCRYPT),
        ':user_id' => $_SESSION['user']['id'],
    ]);
}