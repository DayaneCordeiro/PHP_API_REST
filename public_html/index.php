<?php

header('Content-Type: application/json'); // Returns the data in JSON format

require_once '../vendor/autoload.php';
use Firebase\JWT\JWT;

if ($_GET['url']) {
    // The .htaccess file help us to get the URL -> explode function break url by \ in an array
    $url = explode("/", $_GET['url']);
    $secret_key = "YOUR_SECRET_KEY";

    // Verify if the user is trying to access the API
    if ($url[0] === "api") {
        array_shift($url); // Delete first position of the array
        $service = 'App\Services\\' . ucfirst($url[0]) . 'Service';
        array_shift($url);
        $method  = $url[0];
        array_shift($url);

        if (!empty($_SERVER['HTTP_AUTHORIZATION'])) {
            $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
            $info       = explode(":", $authHeader);
            $jwt        = $info[1];
        }

        if ($method != "login" && isset($jwt)) {
            try {
                $decoded = JWT::decode($jwt, $secret_key, array('HS256'));
            } catch (\Exception $e) {
                http_response_code(401);
                echo json_encode(array('status' => 'error', 'data' => array('message' => 'Access denied.')));
                exit;
            }
        }
        if ($method != "login" && !isset($jwt)) {
            echo json_encode(array('status' => 'error', 'data' => array('message' => 'Authorization token not found.')));
            exit;
        }

        try {
            $response = call_user_func_array(array(new $service, $method), $url);

            http_response_code(200);
            echo json_encode(array('status' => 'success', 'data' => $response));
            exit;
        } catch (\Exception $e) {
            http_response_code(404);
            echo json_encode(array('status' => 'error', 'data' => $e->getMessage()));
            exit;
        }
    }
}

