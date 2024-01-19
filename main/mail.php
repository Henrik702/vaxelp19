<?php


function stopMailing() {
    session_start();
    $_SESSION['mailing_status'] = 'stopped';
    session_write_close();

    echo json_encode(['success' => true, 'message' => 'Mailing stopped']);
}

function resumeMailing() {
    session_start();
    $_SESSION['mailing_status'] = 'resumed';
    session_write_close();
    echo json_encode(['success' => true, 'message' => 'Mailing resumed']);
}

function sendToMailingQueue($userId, $mailingName, $mailingText) {
    global $con;

    $checkIfSent = mysqli_query($con, "SELECT * FROM mailing_queue WHERE user_id = $userId AND mailing_name = '$mailingName'");

    if (mysqli_num_rows($checkIfSent) == 0) {
        // Simulate sending to a mailing queue
        // In a real-world scenario, you would add the user to a queue for further processing
        // For now, let's just log the details to the console

        // Prepare the SQL statement
        $stmt = mysqli_prepare($con, "INSERT INTO mailing_queue (user_id, mailing_name, mailing_text) VALUES (?, ?, ?)");

        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "iss", $userId, $mailingName, $mailingText);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);

        echo json_encode([
            'success' => true,
            'message' => "User #$userId added to mailing queue for '$mailingName' with text: '$mailingText'"
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => "User #$userId is already in the mailing queue for '$mailingName'"
        ]);
    }
}
