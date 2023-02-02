<?php

namespace Culture;

class OptionController extends Controller
{
    public function index()
    {
        $fertilizes = DatabaseController::selectRecord('*', 'fertilizes', isSingle: false);
        $cultures = DatabaseController::selectRecord('*', 'cultures', isSingle: false);
        $weights = DatabaseController::selectRecord('*', 'weights', isSingle: false);
        return self::view('CreateOption', 'option', [
            'cultures' => $cultures,
            'fertilizes' => $fertilizes,
            'weights' => $weights,
        ]);
    }

    public static function store($request)
    {
        if (self::emptyFieldsErrorMsg($request)) {
            self::redirect('create-option');
        }
        unset($_SESSION['notify']);
        $data = [
            'fertilize_id' => $request['fertilize'],
            'culture_id' => $request['culture'],
            'weight' => $request['weight'],
        ];
        self::notify('Successfully created', 'success');
        self::checking($request, $data);
        self::redirect('create-option');
    }
    public static function delete(int $weight_id): void
    {
        DatabaseController::deleteRecord('weights', $weight_id);
        self::notify('Option is deleted');
        self::redirect('create-option');
    }

    public static function listOfOption($value): int
    {
         $list  = DatabaseController::selectRecord('*','weights', "fertilize_id = $value", isSingle: false);
         return count($list) + 1;
    }
    private static function checking($request, array $data)
    {
        $record = DatabaseController::selectRecord('*','weights', "fertilize_id = {$request['fertilize']} and culture_id = {$request['culture']}");
        if (!empty($record)){
            DatabaseController::updateRecord('weights', 'weight', $request['weight'], "fertilize_id = {$request['fertilize']} and culture_id = {$request['culture']}");
        }else{
            DatabaseController::insertRecord('weights', $data);
        }
    }
}