<?php
// /var/www/html/nba-schedules/proxy.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$apiKey = "3c323f46-9908-466d-961f-f4632863776d";
$url = "https://api.balldontlie.io/v1/games?start_date=2026-03-25&end_date=2026-04-01";

// Create a stream context to pass the Authorization header without cURL
$options = [
    "http" => [
        "header" => "Authorization: " . $apiKey . "\r\n",
        "method" => "GET",
        "ignore_errors" => true
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    http_response_code(500);
    echo json_encode(["error" => "PHP failed to fetch data. Check your internet connection."]);
} else {
    echo $response;
}