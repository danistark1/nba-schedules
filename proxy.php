<?php
// /var/www/nba-schedule/proxy.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Allows your HTML to talk to this PHP script

$apiKey = "3c323f46-9908-466d-961f-f4632863776d";
$url = "https://api.balldontlie.io/v1/games?start_date=2026-03-25&end_date=2026-04-01";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: $apiKey"
]);

$response = curl_exec($ch);
curl_close($ch);

echo $response;