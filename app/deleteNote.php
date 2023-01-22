<?php
function deleteNote( int $noteId)
{
    if (empty($noteId)) {
        return false;
    }
    $query = "delete from notes where id = :id";
    $query = PDO_Connect::connect()->prepare($query);
    $query->execute([
        ':id' => $noteId,
    ]);
    notify('note is deleted');
    redirect('/home');
}