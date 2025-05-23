<?php
// Only allow access from your specific domain
$allowed_origin = "https://pwthor.ct.ws";

if (isset($_SERVER['HTTP_ORIGIN'])) {
    if ($_SERVER['HTTP_ORIGIN'] === $allowed_origin) {
        header("Access-Control-Allow-Origin: $allowed_origin");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Content-Type");
    } else {
        // Deny access if origin is not allowed
        http_response_code(403);
        echo "Forbidden";
        exit;
    }
}
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); // Optional: restrict to your frontend domain

$url = getenv('IFRAME_URL');

echo json_encode(['iframeUrl' => $url]);
