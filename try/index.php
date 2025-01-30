<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: #fff;
        }

        /* Main Container */
        .container {
            width: 900px;
            background: #fff;
            color: #333;
            border-radius: 20px;
            box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.2);
            display: flex;
            overflow: hidden;
        }

        /* Forms Section */
        .forms {
            flex: 1;
            padding: 60px 40px;
        }
        .forms h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .forms .input-group {
            margin-bottom: 20px;
        }
        .forms input {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        .forms button {
            width: 100%;
            padding: 12px;
            border: none;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: #fff;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .forms button:hover {
            background: linear-gradient(135deg, #8f94fb, #4e54c8);
        }
        .forms .form-footer {
            margin-top: 20px;
            font-size: 14px;
        }
        .forms .form-footer a {
            color: #4e54c8;
            text-decoration: none;
            font-weight: 600;
        }

        /* Welcome Section */
        .welcome {
            flex: 1;
            background: linear-gradient(135deg, #8f94fb, #4e54c8);
            padding: 60px 40px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .welcome h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .welcome p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .welcome img {
            max-width: 100%;
            height: auto;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .welcome {
                padding: 40px 20px;
            }
            .forms {
                padding: 40px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome">
            <h2>Welcome to Our Website</h2>
            <p>Your gateway to a seamless experience. Sign in or create an account to get started.</p>
            <img src="image/index.jpg" alt="Welcome Image">
        </div>

        <!-- Forms Section -->
        <div class="forms">
            <!-- Login Form -->
            <form id="login-form" method="POST" action="login.php">
                <h2>Login</h2>
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Login</button>
                <div class="form-footer">
                    Don't have an account? <a href="#" onclick="showRegister()">Register here</a>
                </div>
            </form>

            <!-- Register Form -->
            <form id="register-form" method="POST" action="register.php" style="display: none;">
                <h2>Register</h2>
                <div class="input-group">
                    <input type="text" name="full_name" placeholder="Full Name" required>
                </div>
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Register</button>
                <div class="form-footer">
                    Already have an account? <a href="#" onclick="showLogin()">Login here</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const loginForm = document.getElementById("login-form");
        const registerForm = document.getElementById("register-form");

        function showRegister() {
            loginForm.style.display = "none";
            registerForm.style.display = "block";
        }

        function showLogin() {
            registerForm.style.display = "none";
            loginForm.style.display = "block";
        }
    </script>
</body>
</html>
