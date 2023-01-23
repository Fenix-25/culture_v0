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
    $query = "select * from squares";
    $users = PDO_Connect::connect()->prepare($query);
    $users->execute();
    return $users->fetchAll();
}
function squaresSum(): bool|array
{
    if (empty($_SESSION['user'])) {
        return false;
    }
    $query = "select sum(square) from squares group by culture_id";
    $square = PDO_Connect::connect()->prepare($query);
    $square->execute();
    return $square->fetchAll(PDO::FETCH_ASSOC);

}