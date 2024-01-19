<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailing List Management</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h1 class="mb-4">Mailing List Management</h1>

<div class="mb-4">
    <label for="csvFileInput">Select CSV File:</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="csvFileInput" accept=".csv">
        <label class="custom-file-label" for="csvFileInput">Choose file</label>
    </div>
    <button class="btn btn-primary mt-2" onclick="loadUsers()">Load Users</button>
</div>

<hr>

<div class="form-group">
    <label for="mailingName">Mailing Name:</label>
    <input type="text" class="form-control" id="mailingName">
</div>

<div class="form-group">
    <label for="mailingText">Mailing Text:</label>
    <textarea class="form-control" id="mailingText"></textarea>
</div>

<button class="btn btn-success" onclick="sendToQueue()">Send to Queue</button>
<button class="btn btn-danger" onclick="stopMailing()">Stop Mailing</button>
<button class="btn btn-primary" onclick="resumeMailing()">Resume Mailing</button>

<!-- Include Bootstrap JS (Popper.js and Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="public/index.js"></script>
</body>
</html>
