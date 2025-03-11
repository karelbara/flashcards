<?php
header("Content-Type: application/json");

$filename = "flashcards.json";

// Load existing flashcards (GET)
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (file_exists($filename)) {
        echo file_get_contents($filename);
    } else {
        echo json_encode([]);
    }
    exit;
}

// Save new flashcards (POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
    echo json_encode(["status" => "success"]);
    exit;
}
?>
