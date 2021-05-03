<?php

// Simulating an applicantion that will consume the API
$url   = "http://localhost/projects/PHP_API_REST/public_html/api";
$class = "/user";
$param = "/1";

// Gets URL content
$response = file_get_contents($url.$class.$param);