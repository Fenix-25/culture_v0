<?php
function deleteCulture(int $culture_id): void
{
    isEmpty($culture_id);
    deleteRecord('cultures', $culture_id);
    notify('Culture is deleted');
    redirect($_SERVER['HTTP_REFERER']);
}
function deleteUser(int $user_id): void
{
    isEmpty($user_id);
    deleteRecord('users', $user_id);
    notify('User is deleted');
    redirect($_SERVER['HTTP_REFERER']);
}
function deleteSquare(array $data): void
{
    isEmpty($data);
    $squareFromSquare = selectRecord('square', 'squares', $data['squareId'], where: true);
    $squareFromUsers = selectRecord('square', 'users', $data['userId'], where: true);
    $square = $squareFromSquare['square'] + $squareFromUsers['square'];
    updateRecord('users','square', $square, $data['userId'] );
    deleteRecord('squares', $data['squareId']);
    notify('Order is deleted');
    redirect($_SERVER['HTTP_REFERER']);
}


