<?php

namespace Culture;

class SquareController extends Controller
{
    public static function deleteSquare(array $data): void
    {
        $orderFromSquare = DatabaseController::selectRecord('square', 'orders', "id = {$data['orderId']}");
        $orderFromUsers = DatabaseController::selectRecord('square', 'users', "id = {$data['userId']}");
        $order = $orderFromSquare['square'] + $orderFromUsers['square'];
        DatabaseController::updateRecord('users','square', $order, $data['userId'] );
        DatabaseController::deleteRecord('orders', $data['orderId']);
        self::notify('Order is deleted');
        self::redirect('orders');
    }
}