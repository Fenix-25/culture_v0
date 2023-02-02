<?php

namespace Culture;

class UserController extends Controller
{
    public static function deleteUser(int $user_id): void
    {
        self::isEmpty($user_id);
        DatabaseController::deleteRecord('users', $user_id);
        self::notify('User is deleted');
        self::redirect('allData');
    }
}