<?php

namespace Culture;

class Controller
{
    public static function getUrl(): string
    {
        $path = $_SERVER['REQUEST_URI'];
        $path = trim($path, '/');
        return explode('?', $path)[0];
    }

    public static function redirect($path = '/')
    {
        define("Culture\REFER", "");
        $url = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/" . $path;
        header("Location: {$url}");
        exit();
    }

    public static function rdrCondition($condition, $path = 'login', $msg =""): void
    {
        if ($condition) {
            self::notify($msg);
            self::redirect($path);
        }
    }

    public static function isAdmin(): bool
    {
        return !empty($_SESSION['user']['isAdmin']) ? $_SESSION['user']['isAdmin'] : false;
    }

    public static function pageNotFound(): void
    {
        require_once 'views/404.php';
        http_response_code(404);
    }

    public static function notify($msg, $class = 'danger', $field = [])
    {
        if (empty($field)) {
            $_SESSION['notify'] = compact('msg', 'class');
        } else {
            $_SESSION['notify']['error'][$field] = compact('msg', 'class');
        }

    }

    public static function getRequestType(): string
    {
        $type = filter_input(INPUT_POST, 'type');
        unset($_POST['type']);
        return htmlspecialchars($type ?? '');
    }

    public static function remUserSes(): void
    {
        unset($_SESSION['user']);
        self::redirect();
    }

    public static function view(string $view, string $folder = null, $data = [])
    {
        extract($data);
        if ($folder) {
            return require_once "views/{$folder}/{$view}.view.php";

        }
        return require_once "views/{$view}.view.php";
    }

    public static function emptyFieldsErrorMsg($request): bool
    {
        $emptyFields = array_keys($request, "");
        if (!empty($emptyFields)) {
            foreach ($emptyFields as $field) {
                self::notify("Field '{$field}' is empty", field: $field);
            }
            return true;
        }
        return false;
    }

    public static function accessForAdmin(): bool
    {
        if (!empty($_SESSION['user'])){
            if (!$_SESSION['user']['isAdmin']){
                return false;
            }
        }
        return true;
    }

}
