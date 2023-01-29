<?php

namespace Culture;
use Culture\DatabaseController as DB;
class OrderController
{
    public function createOrder(array $data)
    {
        if (empty($data['user'])) {
            notify('Field User is empty');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        }
        if (empty($data['square'])) {
            notify('Field Square is empty');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        }
        $squareFromDB = DB::selectRecord('square', 'users', $data['user'], where: true);
        $square = $squareFromDB['square'] - $data['square'];
        DB::updateRecord('users', 'square', $square, $data['user']);
        $data = [
            'square' => $data['square'],
            'user_id' => $data['user'],
            'culture_id' => $data['culture'],
        ];
        DB::insertRecord('squares', $data);

        notify('Order is successfully created', 'success');
        redirect('orders');
    }
}