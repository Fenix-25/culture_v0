<?php

namespace Culture;

use PDO;
use PDO_Connect;


class DashboardController extends Controller
{

    public static function index()
    {
        return self::view('Dashboard');
    }
    public static function cultures(): bool|array
    {
        if (empty($_SESSION['user'])) {
            return false;
        }
        return DatabaseController::selectRecord('*','cultures', isSingle: false);
    }

    public static function users(): bool|array
    {
        if (empty($_SESSION['user'])) {
            return false;
        }
        return DatabaseController::selectRecord('*', 'users', isSingle: false);
    }

    public static function orders(): bool|array
    {
        if (empty($_SESSION['user'])) {
            return false;
        }
        return DatabaseController::selectRecord('*','orders', isSingle: false);
    }
    public static function squaresSum(int $culture_id): bool|array
    {
        if (empty($_SESSION['user'])) {
            return false;
        }
//    return selectRecord('sum(square)','orders', $culture_id, true);
        $query = "select sum(square) from orders where culture_id = :culture_id";
        $square = PDO_Connect::connect()->prepare($query);
        $square->execute([':culture_id' => htmlspecialchars($culture_id)]);
        return $square->fetch(PDO::FETCH_ASSOC);

    }
}