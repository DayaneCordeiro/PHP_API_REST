<?php

namespace App\Services;

use App\Models\User;

class UserService {
    public function get($id = null) {
        if ($id) {
            return User::findById($id);
        } else {
            return User::findAll();
        }
    }

    public function create() {
        $method  = $_SERVER['REQUEST_METHOD'];

        if ($method != "POST") {
            return throw new \Exception("HTTP method must be 'POST'");
        }

        $_POST = file_get_contents('php://input');
        return User::insert(json_decode($_POST));
    }

    public function login() {
        $_POST = file_get_contents('php://input');
        return User::login(json_decode($_POST));
    }

    public function update() {
        $_PUT = file_get_contents('php://input');
        return User::update(json_decode($_PUT));
    }

    public function delete() {
        $_DELETE = file_get_contents('php://input');
        return User::delete(json_decode($_DELETE));
    }
}