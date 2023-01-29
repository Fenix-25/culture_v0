<?php

function getUrl(): string
{
    $path = $_SERVER['REQUEST_URI'];
    $path = trim($path, '/');
    return explode('?', $path)[0];
}

function redirect($path = '/')
{
    $url = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/" . $path;
    header("Location: {$url}");
    exit();
}

function rdrCondition($condition, $path = '/', $msg = null, $return = null)
{
    if ($condition) {
        notify($msg);
        redirect($path);
        return $return;
    }
}

function isAdmin(): bool
{
//if user admin allow access
    return isset($_SESSION['user']) ? $_SESSION['user']['isAdmin'] : false;
}

function pageNotFound(): void
{
    require_once 'pages/404.php';
    http_response_code(404);
}

function notify($msg, $class = 'danger'): void
{
    $_SESSION['notify'] = compact('msg', 'class');
}

function getRequestType(): string
{
    $type = filter_input(INPUT_POST, 'type');
    unset($_POST['type']);
    return htmlspecialchars($type ?? '');
}

function remUserSes(): void
{
    unset($_SESSION['user']);
    redirect();
}

function isEmpty($value): bool
{
    if (empty($value)) {
        return false;
    }
    return true;
}

function controller($controller)
{
    if ($controller == "Controller") {
        return require_once "app/{$controller}.php";
    }
    if ($controller == "Route") {
        return require_once "app/{$controller}.php";
    }
    return require_once "app/Controllers/{$controller}Controller.php";
}

function view(string $view, $controller = null, string $folder=null)
{
    controller($controller);
    if ($folder){
        return require_once "views/{$folder}/{$view}.view.php";

    }
    return require_once "pages/{$view}.view.php";
}