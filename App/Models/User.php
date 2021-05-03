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

    public static function insert($data) {
        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        $sql  = 'INSERT INTO ' . self::$table . ' (email, password, name) VALUES (?, ?, ?)';
        $stmt = $conn->prepare($sql);
        
        $stmt->bindValue(1, $data['email']);
        $stmt->bindValue(2, $data['password']);
        $stmt->bindValue(3, $data['name']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "User successfully inserted.";
        } else {
            throw new \Exception("Failed to insert user!");
        }
    }
}