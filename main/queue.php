<?php
function sendToQueue() {
    global $con;

    if (!isset($_POST['mailingName']) || !isset($_POST['mailingText'])) {
        echo json_encode(['error' => 'Mailing details not provided']);
        return;
    }

    $mailingName = $_POST['mailingName'];
    $mailingText = $_POST['mailingText'];

    // Check if mailing is stopped
    session_start();
    $mailingStatus = isset($_SESSION['mailing_status']) ? $_SESSION['mailing_status'] : 'active';
    session_write_close();

    if ($mailingStatus === 'stopped') {
        echo json_encode(['success' => false, 'message' => 'Mailing is currently stopped']);
        return;
    }

    $result = mysqli_query($con, 'SELECT * FROM users');

    if ($result) {
        $successCount = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $userId = $row['id'];

            $checkIfSent = mysqli_query($con, "SELECT * FROM mailing_queue WHERE user_id = $userId AND mailing_name = '$mailingName'");

            if (mysqli_num_rows($checkIfSent) == 0) {
                mysqli_query($con, "INSERT INTO mailing_queue (user_id, mailing_name, mailing_text) VALUES ($userId, '$mailingName','$mailingText')");
                sendToMailingQueue($userId, $mailingName, $mailingText);
                $successCount++;
            }
        }

        echo json_encode(['success' => true, 'message' => "$successCount users sent to mailing queue successfully"]);
    } else {
        echo json_encode(['error' => 'Error fetching users from the database']);
    }
}
