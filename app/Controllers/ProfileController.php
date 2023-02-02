<?php

namespace Culture;

class ProfileController extends Controller
{
    public static function index()
    {
        return self::view('Profile');
    }
    public static function profileUpdate(array $request): void
    {
        if (self::emptyFieldsErrorMsg($request)) {
            self::redirect('profile');
        }
        //get user from db
        $userFromDb = self::getUserFromDB($_SESSION['user']['id']);
        //check match for confirm new password
        self::confirmNewPassword($request['newPassword'], $request['confirmPassword']);
        // check the password match with old
        if (!empty($request['oldPassword'])) {
            self::passwordMatches($request['oldPassword'], $userFromDb['password']);
        }
        //record new password to db
        self::newPasswordRecord($request['newPassword']);
        self::notify('Profile successfully updated! Use new password for login', 'success');
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

    protected static function newPasswordRecord(string $password): bool
    {
        if (empty($password)) {
            return false;
        }
        DatabaseController::updateRecord('users','password', password_hash($password, PASSWORD_BCRYPT),"id = '{$_SESSION['user']['id']}'");
        return true;
    }
}