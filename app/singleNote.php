<?php
function singleNote( int $noteId)
{
    if (empty($noteId)) {
        return false;
    }
    $query = "select * from notes where id = :id";
    $note = PDO_Connect::connect()->prepare($query);
    $note->execute([
        ':id' => $noteId,
    ]);
    return $note->fetch(PDO::FETCH_ASSOC);
}
