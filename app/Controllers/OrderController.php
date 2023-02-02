<?php

namespace Culture;

class OrderController extends Controller
{
    public static function index()
    {
        return self::view('Orders');
    }
    public static function create()
    {
        return self::view('CreateOrder', folder: 'user');
    }
    public static function createOrder(array $request)
    {
        self::emptyFieldsErrorMsg($request);
        $orderFromDB = DatabaseController::selectRecord('square', 'users', "");
        $order = $orderFromDB['square'] - $request['square'];
        DatabaseController::updateRecord('users', 'square', $order, $request['user']);
        $data = [
            'square' => $request['square'],
            'user_id' => $request['user'],
            'culture_id' => $request['culture'],
        ];
        DatabaseController::insertRecord('orders', $data);

        self::notify('Order is successfully created', 'success');
        self::redirect('orders');
    }
}