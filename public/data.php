<?php
$allowed_origin = "https://pwthor.ct.ws";

if (isset($_SERVER['HTTP_ORIGIN'])) {
    if ($_SERVER['HTTP_ORIGIN'] === $allowed_origin) {
        header("Access-Control-Allow-Origin: $allowed_origin");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Content-Type");
    } else {
        http_response_code(403);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Forbidden: Access denied']);
        exit;
    }
} else {
    http_response_code(403);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Forbidden: No origin']);
    exit;
}

header('Content-Type: application/json');

// Prevent other domains from embedding your page in iframe
header("Content-Security-Policy: frame-ancestors 'self' $allowed_origin");

$url = getenv('IFRAME_URL');
if (!$url) {
    http_response_code(500);
    echo json_encode(['error' => 'IFRAME_URL environment variable not set']);
    exit;
}

echo json_encode(['iframeUrl' => $url]);
?>

