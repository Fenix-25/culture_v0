<?php

namespace Culture;

class ProfileController extends Controller
{
    public static function index()
    {
        return self::view('Profile');
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
        self::notify('Profile successfully updated!', 'success');
        self::remUserSes();
        self::redirect('login');
    }

    protected static function getUserFromDB($id)
    {
        return DatabaseController::selectRecord('*', 'users',"id = $id");
    }

    protected static function confirmNewPassword(string $password, string $confirm): bool
    {
        if ($password !== $confirm) {
            self::notify('New password and confirmation don\'t match!');
            self::redirect('profile');
            return false;
        }
        return true;
    }

    protected static function passwordMatches(string $oldPassword, string $passwordFromDB): bool
    {
        if (!password_verify($oldPassword, $passwordFromDB)) {
            self::notify('Old password is wrong!');
            self::redirect('profile');
            return false;
        }
        if (!password_verify($oldPassword, $passwordFromDB)) {
            self::notify('Old and new passwords is matches!');
            self::redirect('profile');
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