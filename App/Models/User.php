<?php

namespace App\Models;
use Firebase\JWT\JWT;

class User {
    private static $table = 'user';
    private static $log_table = 'log_change_user';
    private static $secret_key = "YOUR_SECRET_KEY";

    public static function findById($id) {
        if (!$id == (int) $id) {
            return throw new \Exception("ID must be integer.");
        }

        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        $sql  = 'SELECT * FROM ' . self::$table . ' WHERE id = ?';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            return throw new \Exception("No users found!");
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
            return throw new \Exception("No users found!");
        }
    }

    public static function insert($data) {
        if (is_null($data->email)) {
            throw new \Exception("Email is required!");
        } else {
            $data->email = filter_var($data->email, FILTER_SANITIZE_EMAIL);

            if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
                return throw new \Exception("Invalid email!");
            }
        }

        if (is_null($data->password)) {
            return throw new \Exception("Password is required!");
        }

        if (is_null($data->name)) {
            return throw new \Exception("Name is required!");
        }

        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        $sql  = 'INSERT INTO ' . self::$table . ' (email, password, name) VALUES (?, ?, ?)';
        $stmt = $conn->prepare($sql);
        
        $stmt->bindValue(1, $data->email);
        $stmt->bindValue(2, md5($data->password));
        $stmt->bindValue(3, $data->name);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $sql  = 'SELECT id FROM ' . self::$table . ' ORDER BY id DESC LIMIT 1';
            $stmt = $conn->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            $id     = $result['id'];

            self::log($data, 'insert', $id);
            return "User successfully inserted.";
        } else {
            return throw new \Exception("Failed to insert user!");
        }
    }

    public static function login($data) {
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

                $jwt = JWT::encode($token, self::$secret_key);
                return array(
                        "message" => "Successfully logged in.",
                        "token" => $jwt,
                        "email" => $email,
                        //"expireAt" => $expire_claim
                );
            } else {
                throw new \Exception("Incorrect password!");
            }
        } else {
            throw new \Exception("Email not found!");
        }
    }

    public static function update($data) {
        if (is_null($data->id)) {
            return throw new \Exception("ID is required");
        } else if (!$data->id == (int) $data->id) {
            return throw new \Exception("ID must be integer.");
        }

        $conditions = null;
        $authHeader = explode(":", $_SERVER['HTTP_AUTHORIZATION']);
        $jwt        = $authHeader[1];
        $token      = JWT::decode($jwt, self::$secret_key, ['HS256']);

        if ($data->id != $token->data->id) {
            return throw new \Exception("You can only update your owwn user!");
        }
        
        if (isset($data->email) && !is_null($data->email)) {
            $data->email = filter_var($data->email, FILTER_SANITIZE_EMAIL);

            if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
                return throw new \Exception("Invalid email!");
            }

            $conditions .= ' SET email = "' . $data->email . '"';
        }

        if (isset($data->password) && !is_null($data->password)) {
            if (!is_null($conditions)) {
                $conditions .= ",";
            } else {
                $conditions .= ' SET';
            }

            $conditions .= ' password = "' . md5($data->password) . '"';
        }

        if (isset($data->name) && !is_null($data->name)) {
            if (!is_null($conditions)) {
                $conditions .= ",";
            } else {
                $conditions .= ' SET';
            }
            
            $conditions .= ' name = "' . $data->name . '"';
        }

        if (is_null($conditions)) {
            return throw new \Exception("Any data to be updated!");
        }

        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        $sql  = 'UPDATE ' . self::$table . $conditions . ' WHERE id = ?';
        $stmt = $conn->prepare($sql);

        
        self::log($data, 'update');

        $stmt->bindValue(1, $data->id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "User successfully updated.";
        } else {
            return throw new \Exception("Failed to update user!");
        }
    }

    public static function delete($data) {
        if (is_null($data->id)) {
            return throw new \Exception("ID is required");
        } else if (!$data->id == (int) $data->id) {
            return throw new \Exception("ID must be integer.");
        }

        $authHeader = explode(":", $_SERVER['HTTP_AUTHORIZATION']);
        $jwt        = $authHeader[1];
        $token      = JWT::decode($jwt, self::$secret_key, ['HS256']);

        if ($data->id != $token->data->id) {
            return throw new \Exception("You can only delete your own user!");
        }

        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        $sql  = 'DELETE FROM ' . self::$table . ' WHERE id = ?';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(1, $data->id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "User successfully deleted.";
        } else {
            return throw new \Exception("Failed to delete user!");
        }
    }

    public static function log($data, $method, $id = null) {
        $conn = new \PDO(DBDRIVE .': host=' . DBHOST . '; dbname=' . DBNAME, DBUSER, DBPASS);
        if ($method == 'insert') {
            $dataArray             = (array) $data;
            $dataArray['password'] = md5($dataArray['password']);

            foreach ($dataArray as $data => $value) {
                $sql  = 'INSERT INTO ' . self::$log_table . '(id_user, changed_field, new_value) VALUES (?, ?, ?)';
                $stmt = $conn->prepare($sql);

                $stmt->bindValue(1, $id);
                $stmt->bindValue(2, $data);
                $stmt->bindValue(3, $value);
                $stmt->execute();
            }
         } else {
            // UPDATE
            $dataArray = (array) $data;
            $id        = $dataArray['id'];
            unset($dataArray['id']);

            foreach ($dataArray as $data => $value) {
                $sql  = 'SELECT ' . $data . ' FROM ' . self::$table . ' WHERE id = ?';
                $stmt = $conn->prepare($sql);

                $stmt->bindValue(1, $id);
                $stmt->execute();

                $result   = $stmt->fetch(\PDO::FETCH_ASSOC);
                $old_value = $result[$data];

                $sql  = 'INSERT INTO ' . self::$log_table . '(id_user, changed_field, old_value, new_value) VALUES (?, ?, ?, ?)';
                $stmt = $conn->prepare($sql);

                $stmt->bindValue(1, $id);
                $stmt->bindValue(2, $data);
                $stmt->bindValue(3, $old_value);
                $stmt->bindValue(4, $value);
                $stmt->execute();
            }
        }
    }
}