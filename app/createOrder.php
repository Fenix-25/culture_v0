<?php
function createOrder(array $data)
{
    if (empty($data['square'])){
        notify('Field Square is empty');
        redirect($_SERVER['HTTP_REFERER']);
        return false;
    }
    $query = "insert into squares (square, user_id, culture_id) value (:square, :user_id, :culture_id)";
    $order = PDO_Connect::connect()->prepare($query);
    $order->execute([
        ':square'=>htmlspecialchars($data['square']),
        ':user_id'=>htmlspecialchars($data['user']),
        ':culture_id'=>htmlspecialchars($data['culture']),
    ]);
    notify('Order is successfully created', 'success');
    redirect('/home');
}