<?php
require_once('connection/connect.php');
include 'main/users.php';
include 'main/queue.php';
include 'main/mail.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = $_POST;

    if (isset($requestData['action'])) {
        switch ($requestData['action']) {
            case 'loadUsers':
                loadUsers();
                break;
            case 'sendToQueue':
                sendToQueue();
                break;
            case 'stopMailing':
                stopMailing();
                break;
            case 'resumeMailing':
                resumeMailing();
                break;
            default:
                echo json_encode(['error' => 'Invalid action']);
                break;
        }
    } else {
        echo json_encode(['error' => 'Action not specified']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}





?>
