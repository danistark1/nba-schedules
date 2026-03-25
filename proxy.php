<?php
// /var/www/html/nba-schedules/proxy.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$apiKey = "3c323f46-9908-466d-961f-f4632863776d";
$url = "https://api.balldontlie.io/v1/games?start_date=2026-03-25&end_date=2026-04-01";

// Using stream context instead of cURL to avoid extension issues
$opts = [
    "http" => [
        "method" => "GET",
        "header" => "Authorization: " . $apiKey . "\r\n"
    ]
];

$context = stream_context_create($opts);
$response = @file_get_contents($url, false, $context);

if ($response === FALSE) {
    http_response_code(500);
    echo json_encode(["error" => "PHP failed to fetch data. Check your internet connection on starkStation."]);
} else {
    echo $response;
}