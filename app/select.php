<?php
function cultures(): bool|array
{
    if (empty($_SESSION['user'])) {
        return false;
    }
    return selectRecord('*','cultures', isNotSingle: true);
}

function users(): bool|array
{
    if (empty($_SESSION['user'])) {
        return false;
    }
    $query = "select * from users";
    $users = PDO_Connect::connect()->prepare($query);
    $users->execute();
    return $users->fetchAll();
}

function squares(): bool|array
{
    if (empty($_SESSION['user'])) {
        return false;
    }
    return selectRecord('*','squares', isNotSingle: true);
}
function squaresSum(int $culture_id): bool|array
{
    if (empty($_SESSION['user'])) {
        return false;
    }
//    return selectRecord('sum(square)','squares', $culture_id, true);
    $query = "select sum(square) from squares where culture_id = :culture_id";
    $square = PDO_Connect::connect()->prepare($query);
    $square->execute([':culture_id' => htmlspecialchars($culture_id)]);
    return $square->fetch(PDO::FETCH_ASSOC);

}