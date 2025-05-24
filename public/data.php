<?php
// Enable CORS for a specific domain (uncomment and set your domain if needed)
// $allowed_origin = "https://pwthor.ct.ws";
// if (isset($_SERVER['HTTP_ORIGIN'])) {
//     if ($_SERVER['HTTP_ORIGIN'] === $allowed_origin) {
//         header("Access-Control-Allow-Origin: $allowed_origin");
//         header("Access-Control-Allow-Methods: GET, POST");
//         header("Access-Control-Allow-Headers: Content-Type");
//     } else {
//         // Deny access if origin is not allowed
//         http_response_code(403);
//         echo json_encode(['error' => 'Forbidden']);
//         exit;
//     }
// }

// You can also allow all origins for testing by:
header("Access-Control-Allow-Origin: *");

header('Content-Type: application/json');

// Get the iframe URL from an environment variable (make sure it's set)
$url = getenv('IFRAME_URL');

// Fallback or error if URL is not set
if (!$url) {
    http_response_code(500);
    echo json_encode(['error' => 'IFRAME_URL environment variable not set']);
    exit;
}

echo json_encode(['iframeUrl' => $url]);
?>

