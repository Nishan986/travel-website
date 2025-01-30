<?php
include 'db.php';

// Define the default Admin PIN
define('DEFAULT_ADMIN_PIN', '7777');

$registrationSuccess = false; // Flag to indicate success

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);
    $adminPin = trim($_POST['admin_pin']);

    // Check if PIN matches the default admin PIN
    if ($adminPin !== DEFAULT_ADMIN_PIN) {
        echo "<script>alert('Invalid Admin PIN. Access denied.');</script>";
    } elseif ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
    } else {
        // Check if username already exists
        $stmt = $conn->prepare("SELECT username FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "<script>alert('The username is already in use. Please choose another username.');</script>";
        } else {
            // Hash the password for security
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the SQL statement to insert the new user
            $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashedPassword);

            if ($stmt->execute()) {
                $registrationSuccess = true; // Mark success
            } else {
                echo "<script>alert('Error: Unable to register. Please try again later.');</script>";
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Admin Register</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #444;
            margin: 0;
        }

        .form-container {
            background: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.6s ease;
        }

        .form-container h2 {
            margin-bottom: 25px;
            font-size: 30px;
            color: #1e3c72;
            font-weight: bold;
        }

        .form-container .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-container .form-group label {
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .form-container .form-group input {
            width: 100%;
            padding: 12px 15px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-container .form-group input:focus {
            border-color: #1e3c72;
            box-shadow: 0 0 8px rgba(30, 60, 114, 0.4);
            outline: none;
        }

        .form-container .btn {
            width: 100%;
            padding: 12px 20px;
            background: linear-gradient(90deg, #1e3c72, #2a5298);
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-container .btn:hover {
            background: linear-gradient(90deg, #2a5298, #1e3c72);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .form-container .register-link {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }

        .form-container .register-link a {
            color: #1e3c72;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .form-container .register-link a:hover {
            color: #2a5298;
        }

        /* Accessibility: Focus Styles */
        input:focus, .btn:focus {
            outline: 2px dashed #1e3c72;
            outline-offset: 3px;
        }

        /* Fade-in Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Admin Registration</h2>
    <form method="POST" action="" class="register-form">
        <div class="form-group">
            <label for="username"><i class="fa fa-user"></i> Username</label>
            <input type="text" id="username" name="username" placeholder="Enter a username" required>
        </div>
        <div class="form-group">
            <label for="password"><i class="fa fa-lock"></i> Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password"><i class="fa fa-lock"></i> Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
        </div>
        <div class="form-group">
            <label for="admin_pin"><i class="fa fa-key"></i> Admin PIN</label>
            <input type="password" id="admin_pin" name="admin_pin" placeholder="Enter Admin PIN" required>
        </div>
        <button type="submit" class="btn">Register</button>
        <p class="register-link">Already have an account?<a href="index.php"> Login</a></p>
    </form>
</div>

<script>
    // Password confirmation validation
    document.querySelector(".register-form").addEventListener("submit", function (e) {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm_password").value;

        if (password !== confirmPassword) {
            e.preventDefault();
            alert("Passwords do not match. Please try again.");
        }
    });

    // Registration success popup and redirection
    <?php if ($registrationSuccess): ?>
        setTimeout(function () {
            alert("Congratulations! You are now a member of the admin. Please log in.");
            window.location.href = "index.php"; // Redirect to login page
        }, 100);
    <?php endif; ?>
</script>
</body>
</html>