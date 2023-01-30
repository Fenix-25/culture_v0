<?php

namespace Culture;

class UserController
{
    public static function deleteUser(int $user_id): void
    {
        Helper::isEmpty($user_id);
        DatabaseController::deleteRecord('users', $user_id);
        Helper::notify('User is deleted');
        Helper::redirect('allData');
    }
}