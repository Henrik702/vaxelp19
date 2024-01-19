<?php
function loadUsers() {
    global $con;

    if (isset($_FILES['csvFile'])) {
        $file = $_FILES['csvFile'];

        if ($file['error'] == UPLOAD_ERR_OK) {
            $csvFilename = $file['tmp_name'];

            // Read data from CSV file and insert into the database
            $handle = fopen($csvFilename, 'r');
            $stmt = mysqli_prepare($con, 'INSERT INTO users (number, name) VALUES (?, ?)');
            mysqli_stmt_bind_param($stmt, 'ss', $number, $name);

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $number = $data[0];
                $name = $data[1];
                mysqli_stmt_execute($stmt);
            }

            fclose($handle);
            mysqli_stmt_close($stmt);

            echo json_encode(['success' => true, 'message' => 'Users loaded successfully']);
        } else {
            echo json_encode(['error' => 'File upload failed']);
        }
    } else {
        echo json_encode(['error' => 'CSV file not provided']);
    }
}