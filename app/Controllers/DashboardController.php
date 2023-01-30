<?php

namespace Culture;

use PDO;
use PDO_Connect;


class DashboardController
{

    public static function index()
    {
        return Helper::view('Dashboard');
    }
    public static function cultures(): bool|array
    {
        if (empty($_SESSION['user'])) {
            return false;
        }
        return DatabaseController::selectRecord('*','cultures', isNotSingle: true);
    }

    public static function users(): bool|array
    {
        if (empty($_SESSION['user'])) {
            return false;
        }
        return DatabaseController::selectRecord('*', 'users', isNotSingle: true);
    }

    public static function squares(): bool|array
    {
        if (empty($_SESSION['user'])) {
            return false;
        }
        return DatabaseController::selectRecord('*','squares', isNotSingle: true);
    }
    public static function squaresSum(int $culture_id): bool|array
    {
        if (empty($_SESSION['user'])) {
            return false;
        }
//    return selectRecord('sum(square)','squares', $culture_id, true);
        $query = "select sum(square) from squares where culture_id = :culture_id";
        $square = PDO_Connect::connect()->prepare($query);
        $square->execute([':culture_id' => htmlspecialchars($culture_id)]);
        return $square->fetch(PDO::FETCH_ASSOC);

    }
}