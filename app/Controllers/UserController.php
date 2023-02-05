<?php

namespace Culture;

class UserController extends Controller
{
    public static function index(): bool
    {
        $order = DatabaseController::selectRecord('*','orders',"user_id = '{$_SESSION['user']['id']}'", False);
        $user = DatabaseController::selectRecord('name, surname', 'users', "id = '{$_SESSION['user']['id']}'");
        return self::view('IndexUser','user',[
            'orders' => $order,
            'user' => $user,
        ]);
    }

    public static function deleteUser(int $user_id): void
    {
        DatabaseController::deleteRecord('users', $user_id);
        self::notify('User is deleted');
        self::redirect('allData');
    }
}