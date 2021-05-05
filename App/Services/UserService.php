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
        return User::insert($_POST);
    }

    public function login() {
        return User::login($_POST);
    }

    public function update() {
        $_PUT = file_get_contents('php://input');
        return User::update(json_decode($_PUT));
    }

    public function delete() {
        //
    }
}