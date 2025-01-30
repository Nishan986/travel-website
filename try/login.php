<?php
session_start();

$host = 'localhost';
$db = 'travel_website';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
   // Assuming $stmt is already defined and executed
if ($stmt->fetch() && password_verify($password, $hashed_password)) {
    // Correct credentials
    $_SESSION['user_id'] = $id;
    header("Location: home.php");
    exit();
} else {
    // Incorrect credentials
    echo "<script>
            alert('Invalid username or password.');
            window.location.href = 'index.php'; // Redirect to the index page after alert
          </script>";
}
$stmt->close();  
}
$conn->close();
?>
