<?php
function createCulture( array $data):bool
{
    if (empty($data['title'])) {
        notify('Field is empty');
        redirect($_SERVER['HTTP_REFERER']);
        return false;
    }
    insertRecord('cultures', ['name' => $data['title']]);
    notify('Culture is added', 'success');
    redirect('admin');
}