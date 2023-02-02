<?php

namespace Culture;

use PDO;
use PDO_Connect;

class DatabaseController extends Controller
{
    public static function selectRecord($row, string $table, $condition = "", $isSingle = true)
    {
        $query = "select {$row} from {$table}";
        $query .= $condition ? " where {$condition}" : "";
        $select = PDO_Connect::connect()->prepare($query);
        $select->execute();
        return $isSingle ? $select->fetch(PDO::FETCH_ASSOC) : $select->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deleteRecord(string $from, int $id): void
    {
        $query = "delete from {$from} where id = :id";
        $query = PDO_Connect::connect()->prepare($query);
        $query->execute([
            ':id' => htmlspecialchars($id),
        ]);
    }

    public static function updateRecord(string $table, string $colum, mixed $setValue, $condition): void
    {
        $update = "update {$table} set {$colum} = :new where {$condition}";
        $update = PDO_Connect::connect()->prepare($update);
        $update->execute([
            ':new' => htmlspecialchars($setValue),
        ]);
    }


    public static function insertRecord(string $table, array $data): void
    {
        $query = "insert into " . $table .
            "(" . htmlspecialchars(implode(", ", array_keys(($data)))) . ") values (:" . implode(", :", array_keys($data)) . ")";
        $query = PDO_Connect::connect()->prepare($query);
        foreach ($data as $column => $value) {
            $query->bindValue(":" . $column, $value);
        }
        $query->execute();
    }
}