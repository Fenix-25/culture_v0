<?php
function deleteCulture( int $noteId)
{
    if (empty($noteId)) {
        return false;
    }
    $query = "delete from cultures where id = :id";
    $query = PDO_Connect::connect()->prepare($query);
    $query->execute([
        ':id' => $noteId,
    ]);
    notify('Culture is deleted');
    redirect('/home');
}