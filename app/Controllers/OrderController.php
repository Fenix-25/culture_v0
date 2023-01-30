<?php

namespace Culture;

class OrderController
{
    public static function index()
    {
        return Helper::view('Orders');
    }
    public static function create()
    {
        return Helper::view('CreateOrder', folder: 'user');
    }
    public static function createOrder(array $data)
    {
        if (empty($data['user'])) {
            Helper::notify('Field User is empty');
            Helper::redirect('createOrder');
            return false;
        }
        if (empty($data['square'])) {
            Helper::notify('Field SquareController is empty');
            Helper::redirect('createOrder');
            return false;
        }
        $squareFromDB = DatabaseController::selectRecord('square', 'users', $data['user'], where: true);
        $square = $squareFromDB['square'] - $data['square'];
        DatabaseController::updateRecord('users', 'square', $square, $data['user']);
        $data = [
            'square' => $data['square'],
            'user_id' => $data['user'],
            'culture_id' => $data['culture'],
        ];
        DatabaseController::insertRecord('squares', $data);

        Helper::notify('Order is successfully created', 'success');
        Helper::redirect('orders');
    }
}