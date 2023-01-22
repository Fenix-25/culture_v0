<?php

function getUrl(): string
{
    $path = $_SERVER['REQUEST_URI'];
    $path = trim($path, '/');
    return explode('?', $path)[0];
}

function redirect($path = '/')
{
    header("Location: {$path}");
    exit();
}

function rdrCondition($condition, $path = '/', $msg ="", $class ="danger", $return ="")
{
    if ($condition) {
        notify($msg, $class);
        redirect($path);
        return $return;
    }
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