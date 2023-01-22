<?php
function createNote( array $data):bool
{
    if (empty($data['title']) || empty($data['body'])) {
        notify('Fields is empty');
        redirect('/createNote');
        return false;
    }
    $userId = $_SESSION['user']['id'];
    $query = PDO_Connect::connect()->prepare("insert into notes (title, body, user_id) value (:title, :body, :user_id)");
    $query->execute([
        ':title' => htmlspecialchars($data['title']),
        ':body' => htmlspecialchars($data['body']),
        ':user_id' => $userId,
    ]);
    notify('note is created', 'success');
    redirect('/home');
    return true;
}