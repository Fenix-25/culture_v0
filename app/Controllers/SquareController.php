<?php

namespace Culture;

class SquareController extends Controller
{
    public static function deleteSquare(array $request): void
    {
        $squareFromOrders = DatabaseController::selectRecord('square', 'orders', "id = '{$request['orderId']}'");
        $squareFromUsers = DatabaseController::selectRecord('square', 'users', "id = '{$request['userId']}'");
        $order = $squareFromOrders['square'] + $squareFromUsers['square'];
        DatabaseController::updateRecord('users','square', $order, "id = '{$request['userId']}'" );
        DatabaseController::deleteRecord('orders', $request['orderId']);
        self::notify('Order is deleted');
        self::redirect('orders');
    }
}