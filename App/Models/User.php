<?php

namespace App\Models;
use Firebase\JWT\JWT;

class User {
    private static $table = 'user';

    public static function findById($id) {
        if (!$id == (int) $id) {
            throw new \Exception("Error: ID must be integer.");
        }

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
        if (is_null($data->email)) {
            throw new \Exception("Email is required!");
        } else {
            $data->email = filter_var($data->email, FILTER_SANITIZE_EMAIL);

            if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
                throw new \Exception("Invalid email!");
            }
        }

        if (is_null($data->password)) {
            throw new \Exception("Password is required!");
        }

        if (is_null($data->name)) {
            throw new \Exception("Name is required!");
        }

        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        $sql  = 'INSERT INTO ' . self::$table . ' (email, password, name) VALUES (?, ?, ?)';
        $stmt = $conn->prepare($sql);
        
        $stmt->bindValue(1, $data->email);
        $stmt->bindValue(2, md5($data->password));
        $stmt->bindValue(3, $data->name);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "User successfully inserted.";
        } else {
            throw new \Exception("Failed to insert user!");
        }
    }

    public static function login($data) {
        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        $sql  = 'SELECT * FROM ' . self::$table . ' WHERE email = ?';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(1,  $data->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user     = $stmt->fetch(\PDO::FETCH_ASSOC);
            $id       = $user['id'];
            $email    = $user['email'];            
            $password = $user['password'];
            $name     = $user['name'];

            // Validates the password
            if (md5($data->password) == $password) {
                $secret_key = "YOUR_SECRET_KEY";
                $issuer_claim = "serie_login"; // this can be the servername
                $audience_claim = "client";
                $issuedat_claim = time(); // issued at
                $notbefore_claim = $issuedat_claim + 10; //not before in seconds
                //$expire_claim = $issuedat_claim + 60; // expire time in seconds
                $token = array(
                    "iss" => $issuer_claim,
                    "aud" => $audience_claim,
                    "iat" => $issuedat_claim,
                    "nbf" => $notbefore_claim,
                    //"exp" => $expire_claim,
                    "data" => array(
                        "id" => $id,
                        "email" => $email,
                        "name" => $name,
                ));

                http_response_code(200);

                $jwt = JWT::encode($token, $secret_key);
                return array(
                        "message" => "Successful login.",
                        "jwt" => $jwt,
                        "email" => $email,
                        //"expireAt" => $expire_claim
                );
            }
        } else {
            throw new \Exception("Email not found!");
        }
    }

    public static function update($data) {
        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        $sql  = 'UPDATE ' . self::$table . ' SET email = ?, password = ?, name = ? WHERE id = ?';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(1, $data->email);
        $stmt->bindValue(2, md5($data->password));
        $stmt->bindValue(3, $data->name);
        $stmt->bindValue(4, $data->id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "User successfully updated.";
        } else {
            throw new \Exception("Failed to update user!");
        }
    }

    public static function delete($data) {
        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        $sql  = 'DELETE FROM ' . self::$table . ' WHERE id = ?';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(1, $data->id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "User successfully deleted.";
        } else {
            throw new \Exception("Failed to delete user!");
        }
    }
}