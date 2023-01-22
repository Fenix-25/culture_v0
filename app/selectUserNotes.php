<?php
function userNotes()
{
    if (empty($_SESSION['user'])) {
        return false;
    }
    $query = "select * from notes where user_id = :user_id";
    $notes = PDO_Connect::connect()->prepare($query);
    $notes->execute([
        ':user_id' => $_SESSION['user']['id'],
    ]);
    return $notes->fetchAll();
}