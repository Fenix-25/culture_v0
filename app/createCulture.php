<?php
function createCulture( array $data):bool
{
    if (empty($data['title'])) {
        notify('Fields is empty');
        redirect($_SERVER['HTTP_REFERER']);
        return false;
    }
    $query = PDO_Connect::connect()->prepare("insert into cultures (name) value (:name)");
    $query->execute([
        ':name' => htmlspecialchars($data['title']),
    ]);
    notify('Culture is added', 'success');
    redirect('/home');
    return true;
}