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

function rdrCondition($condition, $path = '/', $msg = null, $return = null, $isAdmin = false)
{
    if ($condition) {
//        isAdmin();
        notify($msg);
        redirect($path);
        return $return;
    }
}

//function isAdmin():bool
//{
//
//}

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

function selectRecord($row, $table, $value)
{
    $query = "select {$row} from {$table} where id = :id";
    $select = PDO_Connect::connect()->prepare($query);
    $select->execute([
        ':id' => htmlspecialchars($value)
    ]);
    return $select->fetch(PDO::FETCH_ASSOC);
}
function deleteRecord(string $from, int $id): void
{
    $query = "delete from {$from} where id = :id";
    $query = PDO_Connect::connect()->prepare($query);
    $query->execute([
        ':id' => htmlspecialchars($id),
    ]);
}
function updateRecord($table, $value, $setValue, $id): void
{
    $update = "update {$table} set {$value} = :new where id = :id";
    $update = PDO_Connect::connect()->prepare($update);
    $update->execute([
        ':new' =>htmlspecialchars($setValue),
        ':id' => htmlspecialchars($id)
    ]);
}

function isEmpty($value): bool
{
    if (empty($value)) {
        return false;
    }
    return true;
}
