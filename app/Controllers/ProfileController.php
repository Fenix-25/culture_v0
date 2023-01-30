<?php

namespace Culture;

class ProfileController
{
    public static function index()
    {
        return Helper::view('Profile');
    }
    public static function profileUpdate(array $data): void
    {
        //get user from db
        $userFromDb = self::getUserFromDB($_SESSION['user']['id']);
        //check match for confirm new password
        self::confirmNewPassword($data['newPassword'], $data['confirmPassword']);
        // check the password match with old
        if (!empty($data['oldPassword'])) {
            self::passwordMatches($data['oldPassword'], $userFromDb['password']);
        }
        //record new password to db
        self::newPasswordRecord($data['newPassword']);
        Helper::notify('Profile successfully updated!', 'success');
        Helper::remUserSes();
        Helper::redirect('login');
    }

    protected static function getUserFromDB($id)
    {
        return DatabaseController::selectRecord('*', 'users',$id, where: true);
    }

    protected static function confirmNewPassword(string $password, string $confirm): bool
    {
        if ($password !== $confirm) {
            Helper::notify('New password and confirmation don\'t match!');
            Helper::redirect('profile');
            return false;
        }
        return true;
    }

    protected static function passwordMatches(string $oldPassword, string $passwordFromDB): bool
    {
        if (!password_verify($oldPassword, $passwordFromDB)) {
            Helper::notify('Old password is wrong!');
            Helper::redirect('profile');
            return false;
        }
        if (!password_verify($oldPassword, $passwordFromDB)) {
            Helper::notify('Old and new passwords is matches!');
            Helper::redirect('profile');
            return false;
        }
        return true;
    }

    protected static function newPasswordRecord(string $password)
    {
        if (empty($password)) {
            return false;
        }
        DatabaseController::updateRecord('users','password', password_hash($password, PASSWORD_BCRYPT), $_SESSION['user']['id']);
    }
}