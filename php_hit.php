<?php
// Set the allowed host
$allowed_host = 'http://feqnpsiawtqmdgdusartjdrpebprs1yge.oast.fun'; // Replace with your allowed host

// Check the request method
if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check the origin of the request
    if ($_SERVER['HTTP_ORIGIN'] === $allowed_host) {
        // Get data from the request
        $name = isset($_REQUEST['name']) ? htmlspecialchars($_REQUEST['name']) : 'Guest';
        
        // Prepare a response
        $response = [
            'message' => "Hello, $name! You have reached my PHP project.",
            'method' => $_SERVER['REQUEST_METHOD'],
            'host' => $_SERVER['HTTP_ORIGIN']
        ];
        
        // Set the response header
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Respond with a forbidden status
        header('HTTP/1.1 403 Forbidden');
        echo json_encode(['error' => 'Access denied.']);
    }
} else {
    // Invalid request method
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
