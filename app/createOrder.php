<?php
function createOrder(array $data)
{
    if (empty($data['square'])){
        notify('Field Square is empty');
        redirect($_SERVER['HTTP_REFERER']);
        return false;
    }
    if (empty($data['user'])){
        notify('Field User is empty');
        redirect($_SERVER['HTTP_REFERER']);
        return false;
    }
    $squareFromDB = "select square from users where id = :id";
    $squareFromDB = PDO_Connect::connect()->prepare($squareFromDB);
    $squareFromDB->execute([
        ':id' => htmlspecialchars($data['user'])
    ]);
    $squareFromDB = $squareFromDB->fetch(PDO::FETCH_ASSOC);

    $update = "update users set square = :new_square where id = :id";
    $update = PDO_Connect::connect()->prepare($update);
    $update->execute([
        ':new_square' => $squareFromDB['square'] - $data['square'],
        ':id' => $data['user'],
    ]);

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
