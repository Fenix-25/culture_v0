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
        if (self::emptyFieldsErrorMsg($request)) {
            self::redirect('create-order');
        }
        $orderFromDB = DatabaseController::selectRecord('square', 'users', "id = '{$request['user']}'");
        $square = $orderFromDB['square'] - $request['square'];
        DatabaseController::updateRecord('users', 'square', $square, "id = '{$request['user']}'");
        $data = [
            'square' => $request['square'],
            'user_id' => $request['user'],
            'culture_id' => $request['culture'],
            'is_share' => $request['isShare'],
            'ended_at' => date("Y-m-d H:i:s", strtotime("+1 year", time())),
            'price' => self::calculatePrice($request['price'], $request['square'], $request['isShare']),
        ];
        DatabaseController::insertRecord('orders', $data);

        self::notify('Order is successfully created', 'success');
        self::redirect('orders');
    }

    private static function calculatePrice($price, $square, $isShare) :float
    {
        $cof = 2;
        if (!$isShare && $square <= 2){
            $price *= $square;
            return $price;
        }
        if (!$isShare && $square>=2.01){
            $price *= $cof;
            return $price;
        }
        return $price;
    }
}