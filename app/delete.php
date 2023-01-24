<?php
function deleteCulture(int $culture_id)
{
    if (empty($culture_id)) {
        return false;
    }
    $query = "delete from cultures where id = :id";
    $query = PDO_Connect::connect()->prepare($query);
    $query->execute([
        ':id' => $culture_id,
    ]);
    notify('Culture is deleted');
    redirect($_SERVER['HTTP_REFERER']);
}

function deleteUser(int $user_id)
{
    if (empty($user_id)) {
        return false;
    }
    $query = "delete from users where id = :id";
    $query = PDO_Connect::connect()->prepare($query);
    $query->execute([
        ':id' => $user_id,
    ]);
    notify('User is deleted');
    redirect($_SERVER['HTTP_REFERER']);
}

function deleteSquare(array $data)
{
    if (empty($data)) {
        return false;
    }
    $squareFromSquare = "select square from squares where id = :square_id";
    $squareFromSquare = PDO_Connect::connect()->prepare($squareFromSquare);
    $squareFromSquare->execute([
        ':square_id' => $data['squareId']
    ]);
    $squareFromSquare = $squareFromSquare->fetch(PDO::FETCH_ASSOC);

    $squareFromUsers = "select square from users where id = :user_id";
    $squareFromUsers = PDO_Connect::connect()->prepare($squareFromUsers);
    $squareFromUsers->execute([
        ':user_id' => $data['userId']
    ]);
    $squareFromUsers = $squareFromUsers->fetch(PDO::FETCH_ASSOC);

    //if user_id = id then add square for this user
    $update = "update users set square = :new_square where id = :user_id";
    $update = PDO_Connect::connect()->prepare($update);
    $update->execute([
        ':new_square' => $squareFromSquare['square'] + $squareFromUsers['square'],
        ':user_id' => $data['userId']
    ]);
    $query = "delete from squares where id = :id";
    $query = PDO_Connect::connect()->prepare($query);
    $query->execute([
        ':id' => $data['squareId'],
    ]);
    notify('Square is deleted');
    redirect($_SERVER['HTTP_REFERER']);
}