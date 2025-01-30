<?php
$host = 'localhost';
$db = 'travel_website';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullName = $username = $email = $password = ''; // Initialize variables

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate full name (should contain at least one space)
    if (!preg_match('/\s/', $fullName)) {
        echo "<script>
                alert('Full name should contain a space between first and last name.');
                window.location.href = 'index.php'; // Redirect back to index page
              </script>";
        exit();
    }

    // Validate email (should contain @gmail.com)
    if (!str_ends_with($email, '@gmail.com')) {
        echo "<script>
                alert('Email should be a @gmail.com address.');
                window.location.href = 'index.php'; // Redirect back to index page
              </script>";
        exit();
    }

    // Validate password (should contain both letters and numbers)
    if (!preg_match('/[a-zA-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
        echo "<script>
                alert('Password must contain both letters and numbers.');
                window.location.href = 'index.php'; // Redirect back to index page
              </script>";
        exit();
    }

    // Hash the password
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (full_name, username, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullName, $username, $email, $passwordHashed);

    if ($stmt->execute()) {
        echo "Registration successful! <a href='index.php'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
