<?php

namespace Culture;

class FertilizeController extends Controller
{
    public static function index()
    {
        $in_order = [];
        $props = [];
        $fertilizes = DatabaseController::selectRecord('*', 'fertilizes', isSingle: false, orderBy: 'name');
        $orders = DashboardController::orders();
        $cultures = DashboardController::cultures();
        $weights = DatabaseController::selectRecord('*', 'weights', isSingle: false);
        foreach ($orders as $ignored) {
            foreach ($cultures as $culture) {
                $square = DashboardController::Sum('square', 'orders', "culture_id = '{$culture['id']}'");
                $in_order[$culture['name']] = [
                    'culture_id' => $culture['id'],
                    'culture_name' => $culture['name'],
                    'square' => $square['sum(square)'] ? round($square['sum(square)'], 2) : "",
                ];
            }
        }

        foreach ($fertilizes as $fertilize) {
            foreach ($in_order as $_square) {//площа для певгої культури
                foreach ($weights as $weight) {// дозування добрива(вага)
                    if ($weight['culture_id'] == $_square['culture_id']) {
                        if ($fertilize['id'] == $weight['fertilize_id']) {
                            $props[$fertilize['name']][$_square['culture_id']] = [
                                'fertilize_id' => $fertilize['id'],
                                'fertilize_name' => $fertilize['name'],
                                'qty' => floatval($_square['square']) * floatval($weight['weight'])
                            ];
                        }
                    }
                }
            }
        }

        return self::view('Fertilize', 'fertilize', [
            'fertilizes' => $fertilizes,
            'props' => $props,
            'cultures' => $cultures,
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

    public static function sort(array $array, int $fertilize_id)
    {
       $array = array_search($fertilize_id, $array);

        return $array;
    }
}