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
        if ($isAdmin) {
            isAdmin();
        }
        notify($msg);
        redirect($path);
        return $return;
    }
}

function isAdmin(): bool
{
//if user admin allow access
    if (!$_SESSION['user']['isAdmin']) {
        redirect($_SERVER['HTTP_REFERER']);
        return false;
    }
    return true;
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

function selectRecord($row, string $table, mixed $value = null, $where = false, $email = false, $isNotSingle = false)
{
    $query = "select {$row} from {$table}";
    $query .= $where ? " where id = :value" : "";
    $query .= $email ? " where email = :value" : "";
    $select = PDO_Connect::connect()->prepare($query);
    if (!empty($value)) {
        $select->execute([
            ':value' => htmlspecialchars($value)
        ]);
    } else {
        $select->execute();
    }
    return $isNotSingle ? $select->fetchAll(PDO::FETCH_ASSOC) : $select->fetch(PDO::FETCH_ASSOC);
}

function deleteRecord(string $from, int $id): void
{
    $query = "delete from {$from} where id = :id";
    $query = PDO_Connect::connect()->prepare($query);
    $query->execute([
        ':id' => htmlspecialchars($id),
    ]);
}

function updateRecord(string $table, string $value, mixed $setValue, int $id): void
{
    $update = "update {$table} set {$value} = :new where id = :id";
    $update = PDO_Connect::connect()->prepare($update);
    $update->execute([
        ':new' => htmlspecialchars($setValue),
        ':id' => htmlspecialchars($id)
    ]);
}


function insertRecord(string $table, array $data): void
{
    $query = "insert into " . $table .
        "(" . htmlspecialchars(implode(", ", array_keys(($data)))) . ") values (:" . implode(", :", array_keys($data)) . ")";
    $query = PDO_Connect::connect()->prepare($query);
    foreach ($data as $column => $value) {
        $query->bindValue(":" . $column, $value);
    }
    $query->execute();
}

function isEmpty($value): bool
{
    if (empty($value)) {
        return false;
    }
    return true;
}
