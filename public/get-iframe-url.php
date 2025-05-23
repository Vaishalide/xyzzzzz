<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); // Optional: restrict to your frontend domain

$url = getenv('IFRAME_URL');

echo json_encode(['iframeUrl' => $url]);
