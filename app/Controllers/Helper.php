<?php

namespace Culture;

class Helper
{
    public static function getUrl(): string
    {
        $path = $_SERVER['REQUEST_URI'];
        $path = trim($path, '/');
        return explode('?', $path)[0];
    }

    public static function redirect($path = '/')
    {
        $url = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/" . $path;
        header("Location: {$url}");
        exit();
    }

    public static function rdrCondition($condition, $path = 'login', $return = null)
    {
        if ($condition) {
            self::redirect($path);
            return $return;
        }
        return false;
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

    public static function notify($msg, $class = 'danger'): void
    {
        $_SESSION['notify'] = compact('msg', 'class');
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

    public static function isEmpty($value): bool
    {
        if (empty($value)) {
            return false;
        }
        return true;
    }

    public static function view(string $view, string $folder=null)
    {
        if ($folder){
            return require_once "views/{$folder}/{$view}.view.php";

        }
        return require_once "views/{$view}.view.php";
    }

    public static function emptyUserSession()
    {
        return empty($_SESSION['user']) ? self::redirect('login') : "";
    }
    public static function emptyAdminSession()
    {
        return empty($_SESSION['user']['isAdmin']) ?? self::remUserSes();
    }
}