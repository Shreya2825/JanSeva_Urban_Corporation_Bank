<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_register";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if an ID was passed through POST to mark as solved
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // SQL query to update the status of the entry to 'solved'
    $update_sql = "UPDATE contacts SET status='solved' WHERE id='$id'";

    if ($conn->query($update_sql) === TRUE) {
        $message = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Success!</strong> Record marked as solved.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
    } else {
        $message = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Error!</strong> Error updating record: " . $conn->error . ".
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
    }
}

// SQL query to retrieve all unsolved entries from the 'contacts' table
$sql = "SELECT * FROM contacts WHERE status IS NULL OR status != 'solved'";
$result = $conn->query($sql);

// SQL query to retrieve all solved entries from the 'contacts' table
$solved_sql = "SELECT * FROM contacts WHERE status='solved'";
$solved_result = $conn->query($solved_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Submissions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #e9ecef;
            color: #495057;
        }
        .container {
            margin-top: 30px;
        }
        .table th {
            background-color: #5996EB;
            color: #ffffff;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .alert {
            margin-top: 20px;
        }
        .no-records {
            text-align: center;
            font-style: italic;
        }
        .btn-custom {
            background-color: #28a745;
            color: #ffffff;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .card-header {
            background-color: #343a40;
            color: #ffffff;
        }
        .card-body {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Dashboard Of JanSevabank</h1>
        <a href="Logout.php" class="btn btn-warning">Logout</a>
    </div>

    <?php if (isset($message)) echo $message; ?>

    <!-- Unsolved Queries Section -->
    <div class="mb-4">
        <div class="card">
            <div class="card-header">
                <h2 class="h4 mb-0">Unsolved Queries</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Submitted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            // Output data of each unsolved row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . htmlspecialchars($row['username']) . "</td>
                                        <td>" . htmlspecialchars($row['email']) . "</td>
                                        <td>" . htmlspecialchars($row['phone']) . "</td>
                                        <td>" . htmlspecialchars($row['subject']) . "</td>
                                        <td>" . htmlspecialchars($row['message']) . "</td>
                                        <td>" . $row['created_at'] . "</td>
                                        <td>
                                            <form action='' method='POST'>
                                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                                <button type='submit' class='btn btn-custom btn-sm'>Mark as Solved</button>
                                            </form>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='no-records'>No unsolved records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Solved Queries Section -->
    <div>
        <div class="card">
            <div class="card-header">
                <h2 class="h4 mb-0">Solved Queries</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($solved_result->num_rows > 0) {
                            // Output data of each solved row
                            while ($row = $solved_result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . htmlspecialchars($row['username']) . "</td>
                                        <td>" . htmlspecialchars($row['email']) . "</td>
                                        <td>" . htmlspecialchars($row['phone']) . "</td>
                                        <td>" . htmlspecialchars($row['subject']) . "</td>
                                        <td>" . htmlspecialchars($row['message']) . "</td>
                                        <td>" . $row['created_at'] . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='no-records'>No solved queries found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9jyhbSeO00y5j3zwl8ZmN9mF56cK7c94hL1A4L7tPgtTOeG4+1Z" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-mQ93xB+B4mIIxj5gU6vwKYxkM08D32gjO0/tT97B2G7kLl9RYZEkHZ69NjbR5N01" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
