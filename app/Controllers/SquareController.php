<?php

namespace Culture;

class SquareController
{
    public static function deleteSquare(array $data): void
    {
        Helper::isEmpty($data);
        $squareFromSquare = DatabaseController::selectRecord('square', 'squares', $data['squareId'], where: true);
        $squareFromUsers = DatabaseController::selectRecord('square', 'users', $data['userId'], where: true);
        $square = $squareFromSquare['square'] + $squareFromUsers['square'];
        DatabaseController::updateRecord('users','square', $square, $data['userId'] );
        DatabaseController::deleteRecord('squares', $data['squareId']);
        Helper::notify('Order is deleted');
        Helper::redirect('orders');
    }
}