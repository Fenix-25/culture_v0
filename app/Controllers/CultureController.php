<?php

namespace Culture;

class CultureController
{
    public static function index()
    {
        return Helper::view('CreateCulture', folder: 'culture');
    }
    public static function createCulture( array $data)
    {
        if (empty($data['title'])) {
            Helper::notify('Field is empty');
            Helper::redirect('createCulture');
            return false;
        }
        DatabaseController::insertRecord('cultures', ['name' => $data['title']]);
        Helper::notify('Culture is added', 'success');
        Helper::redirect('dashboard');
    }
    public static function deleteCulture(int $culture_id): void
    {
        Helper::isEmpty($culture_id);
        DatabaseController::deleteRecord('cultures', $culture_id);
        Helper::notify('Culture is deleted');
        Helper::redirect('allData');
    }
}