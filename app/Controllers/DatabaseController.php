<?php
namespace Culture;
use PDO;
use PDO_Connect;

class DatabaseController
{
    public static function selectRecord($row, string $table, mixed $value = null, $where = false, $email = false, $isNotSingle = false)
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

    public static function deleteRecord(string $from, int $id): void
    {
        $query = "delete from {$from} where id = :id";
        $query = PDO_Connect::connect()->prepare($query);
        $query->execute([
            ':id' => htmlspecialchars($id),
        ]);
    }

    public static function updateRecord(string $table, string $value, mixed $setValue, int $id): void
    {
        $update = "update {$table} set {$value} = :new where id = :id";
        $update = PDO_Connect::connect()->prepare($update);
        $update->execute([
            ':new' => htmlspecialchars($setValue),
            ':id' => htmlspecialchars($id)
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