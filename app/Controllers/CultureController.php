<?php

namespace Culture;

use Culture\DatabaseController as DB;

class CultureController
{
    public function createCulture( array $data)
    {
        if (empty($data['title'])) {
            notify('Field is empty');
            redirect($_SERVER['HTTP_REFERER']);
            return false;
        }
        DB::insertRecord('cultures', ['name' => $data['title']]);
        notify('Culture is added', 'success');
        redirect('admin');
    }
}