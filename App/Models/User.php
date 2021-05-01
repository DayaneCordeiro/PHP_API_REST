<?php

namespace App\Models;

class User {
    private static $table = 'user';

    public static function findById($id) {
        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        $sql  = 'SELECT * FROM ' . self::$table . ' WHERE id = ?';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("No users found!");
        }
    }

    public static function findAll() {
        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        $sql  = 'SELECT * FROM ' . self::$table;
        $stmt = $conn->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("No users found!");
        }
    }
}