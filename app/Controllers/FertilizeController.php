<?php

namespace Culture;

class FertilizeController extends Controller
{
    public static function index()
    {
        $in_order = [];
        $prop = [];
        $culture_id = [];
        $fertilizes = DatabaseController::selectRecord('*', 'fertilizes', isSingle: false);
        $orders = DashboardController::orders();
        $cultures = DashboardController::cultures();
        $weights = DatabaseController::selectRecord('*', 'weights', isSingle: false);
        foreach ($orders as $ignored) {
            foreach ($cultures as $culture) {
                $square = DashboardController::squaresSum($culture['id']);
                $in_order[$culture['name']] = [
                    'culture_id' => $culture['id'],
                    'culture_name' => $culture['name'],
                    'square' => $square['sum(square)'] ? round($square['sum(square)'], 2) : "",
                ];
            }
        }

        foreach ($in_order as $_square) {
            foreach ($weights as $weight) {
                if ($weight['culture_id'] == $_square['culture_id']) {
                    $culture_id[$_square['culture_name']] = [
                        'id' => $_square['culture_id'],
                    ];
                    foreach ($fertilizes as $fertilize) {
                        if ($fertilize['id'] == $weight['fertilize_id']) {
                            $prop[$_square['culture_name'] . "-" . $fertilize['name']] = [
                                'fertilize_id' => $fertilize['id'],
                                'qty' => floatval($_square['square']) * floatval($weight['weight'])
                            ];
                        }
                    }
                }
            }
        }

        return self::view('Fertilize', 'fertilize', [
            'fertilizes' => $fertilizes,
            'prop' => $prop,
            'culture_id' => $culture_id,
        ]);
    }

    public static function create()
    {
        return self::view('FertilizeCreate', 'fertilize');
    }

    public static function store(array $request)
    {
        if (self::emptyFieldsErrorMsg($request)) {
            self::redirect('create-fertilize');
        }
        $data = [
            'name' => $request['name'],
        ];
        DatabaseController::insertRecord('fertilizes', $data);
        self::notify('Successfully created', 'success');
        self::redirect('create-fertilize');
    }
}