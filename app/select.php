<?php
function cultures(): bool|array
{
    if (empty($_SESSION['user'])) {
        return false;
    }
    $query = "select * from cultures";
    $notes = PDO_Connect::connect()->prepare($query);
    $notes->execute();
    return $notes->fetchAll();
}

function users(): bool|array
{
    if (empty($_SESSION['user'])) {
        return false;
    }
    $query = "select * from users sort order by timestamp desc";
    $users = PDO_Connect::connect()->prepare($query);
    $users->execute();
    return $users->fetchAll();
}

function squares(): bool|array
{
    if (empty($_SESSION['user'])) {
        return false;
    }
    $query = "select * from squares";
    $users = PDO_Connect::connect()->prepare($query);
    $users->execute();
    return $users->fetchAll();
}
function squaresSum(int $culture_id): bool|array
{
    if (empty($_SESSION['user'])) {
        return false;
    }
    $query = "select sum(square) from squares where culture_id = :culture_id";
    $square = PDO_Connect::connect()->prepare($query);
    $square->execute([':culture_id' => htmlspecialchars($culture_id)]);
    return $square->fetch(PDO::FETCH_ASSOC);

}