<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://example.com'); // Replace with the domain
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo $response;
}

curl_close($ch);
?>
