<?php

namespace Culture;

class CultureController extends Controller
{
    public static function index()
    {
        return self::view('CreateCulture', folder: 'culture');
    }
    public static function createCulture( array $request)
    {
        if (self::emptyFieldsErrorMsg($request)) {
            self::redirect('create-culture');
        }
        DatabaseController::insertRecord('cultures', ['name' => $request['title']]);
        self::notify('Culture is added', 'success');
        self::redirect('dashboard');
    }
    public static function deleteCulture(int $culture_id): void
    {
        DatabaseController::deleteRecord('cultures', $culture_id);
        self::notify('Culture is deleted');
        self::redirect('allData');
    }
}