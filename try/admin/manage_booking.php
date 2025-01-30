<?php
// Start session and include necessary files
require_once 'db.php';
session_start();

// Assuming the admin's first name is stored in the session after login
// If you store it in a database, you would fetch it here
$adminFirstName = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Travel Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
          /* Global Styles */
          * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: #f4f7fc;
            color: #333;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #007b8f;
        }

        /* Sidebar */
        .sidebar {
            width: 270px;
            background: #004d56;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            display: flex;
            text-transform: uppercase;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.5rem;
            font-size: 1.7rem;
            font-weight: 600;
            text-align: center;
            background: #00383b;
            border-bottom: 2px solid #1a4649;
        }

        .menu {
            list-style: none;
            padding: 1.5rem 0;
        }

        .menu li {
            margin: 1rem 0;
        }

        .menu li a {
            display: flex;
            align-items: center;
            padding: 1rem 1.8rem;
            border-radius: 0.5rem;
            font-size: 1.2rem;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .menu li a i {
            margin-right: 1.3rem;
            font-size: 1.4rem;
        }

        .menu li a:hover,
        .menu li a.active {
            background: #007b8f;
            color: #f1f1f1;
        }

        /* Main Content */
        .main {
            flex: 1;
            margin-left: 270px; /* Matches sidebar width */
            padding: 2rem 3rem;
        }

        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .main-header h1 {
            font-size: 2.4rem;
            font-weight: 700;
            color: #004d56;
            letter-spacing: 1px;
        }

        .theme-toggle {
            cursor: pointer;
            padding: 0.8rem 1.5rem;
            background: #004d56;
            color: #fff;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.1rem;
            transition: background 0.3s ease;
        }

        .theme-toggle:hover {
            background: #00383b;
        }

        /* Analytics Section */
        .analytics {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .analytics-card {
            background: linear-gradient(135deg, #007b8f, #005e68);
            color: #fff;
            padding: 2.2rem;
            border-radius: 0.75rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
        }

        .analytics-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        }

        .analytics-card h3 {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .analytics-card p {
            font-size: 2.6rem;
            font-weight: bold;
        }

       /* Table Styling */
table {
    width: 100%;
    border-collapse: separate; 
    border-spacing: 0;
    margin-top: 2rem;
    background: #ffffff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    border-radius: 15px; 
    overflow: hidden; 
}

table th,
table td {
    padding: 1rem 1.5rem;
    text-align: left;
    font-size: 1rem;
    border-bottom: 1px solid #e6e6e6; 
}

table th {
    background: #004d56;
    color: #fff;
    font-weight: bold;
}

table tr:nth-child(even) {
    background: #fafafa; /* Alternating row background */
}

table tr:hover {
    background: #f4f7fc; /* Highlight effect on row hover */
}

/* Rounded corners for the first and last rows */
table thead tr:first-child th:first-child {
    border-top-left-radius: 15px; /* Top-left corner rounded */
}

table thead tr:first-child th:last-child {
    border-top-right-radius: 15px; /* Top-right corner rounded */
}

table tbody tr:last-child td:first-child {
    border-bottom-left-radius: 15px; /* Bottom-left corner rounded */
}

table tbody tr:last-child td:last-child {
    border-bottom-right-radius: 15px; /* Bottom-right corner rounded */
}

/* Responsive Design */
@media (max-width: 768px) {
    table th,
    table td {
        padding: 0.8rem;
        font-size: 0.9rem;
    }

    table {
        font-size: 0.85rem;
    }
}



             /* Dark Mode */
body.dark-mode {
    background: #121212; 
    color: #e0e0e0; 
    font-family: 'Roboto', sans-serif;
    transition: all 0.3s ease-in-out;
}

body.dark-mode .sidebar {
    background: #1e1e1e; 
    border-right: 1px solid #333;
    color: #dcdcdc;
    box-shadow: 4px 0 15px rgba(0, 0, 0, 0.5);
    transition: background 0.3s ease;
}

body.dark-mode .menu li a {
    color: #ccc; /* Muted light color for items */
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: color 0.3s ease, background 0.3s ease, transform 0.3s ease;
}

body.dark-mode .menu li a:hover,
body.dark-mode .menu li a.active {
    background: #5c6bc0; /* Hover color with a subtle glow */
    color: #fff;
    transform: translateX(5px); /* Slight movement on hover */
}

body.dark-mode .analytics-card {
    background: linear-gradient(135deg, #00b894, #8e44ad); /* Neon gradient effect */
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
    border-radius: 15px;
    color: #fff;
    padding: 1.5rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

body.dark-mode .analytics-card:hover {
    transform: translateY(-10px); /* Elevated hover effect */
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
}

body.dark-mode .timeline-item .content {
    background: #1f2a36; /* Deep navy background */
    color: #ecf0f1; /* High contrast text */
    border: 1px solid #444;
    border-radius: 10px;
    padding: 1.5rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

body.dark-mode .timeline-item .content:hover {
    transform: scale(1.05); /* Slight zoom-in effect */
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.4);
}

body.dark-mode .timeline-item i {
    background: #3f9cbb; /* Bright accent color */
    color: #fff;
    border: 2px solid #3f9cbb;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    padding: 0.6rem;
    font-size: 1.8rem;
    border-radius: 50%;
    transition: all 0.3s ease;
}

body.dark-mode .timeline-item i:hover {
    transform: rotate(360deg); 
    background: #f39c12; 
}

body.dark-mode footer {
    color: #95a5a6;
    text-align: center;
    padding: 0rem 0;
    position: relative;
}
/* Professional Dark Mode Table Styling */
body.dark-mode table {
    background: #202027; /* Modern dark background */
    color: #e8e8e8; /* Soft white text for readability */
    width: 100%; /* Full-width table */
    border-collapse: collapse;
    border-radius: 12px; /* Smooth edges */
    overflow: hidden;
    margin: 20px 0;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5); /* Clean shadow for depth */
    font-family: 'Poppins', sans-serif; /* Elegant font */
    transition: all 0.3s ease;
}

body.dark-mode table th {
    background: linear-gradient(135deg, #3a3a3a, #2c2c2c); /* Subtle gradient */
    color: #ffffff; /* Bright text */
    padding: 1rem;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-align: left;
    position: sticky; /* Fixed header on scroll */
    top: 0;
    z-index: 10;
    border-bottom: 2px solid #555; /* Separator */
}

body.dark-mode table td {
    background: #292929; /* Slightly lighter background */
    color: #dcdcdc; /* Neutral light color */
    padding: 1rem;
    font-size: 0.95rem;
    border-bottom: 1px solid #3a3a3a; /* Row separators */
    text-align: left;
    transition: background 0.3s ease, color 0.3s ease;
}

body.dark-mode table tr:nth-child(even) td {
    background: #252525; /* Alternating row color */
}

body.dark-mode table tr:hover td {
    background: #333; /* Highlighted background on hover */
    color: #ffffff; /* Brighter text */
    transition: all 0.3s ease-in-out;
}

body.dark-mode table caption {
    font-size: 1.2rem;
    color: #b3b3b3;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    font-weight: bold;
}

caption {
    font-size: 1.5rem;
    font-weight: 900;
    color: #004d56;
    margin-bottom: 0.5rem;
    text-align: center;
    padding: 0.5rem;
    border-radius: 8px;
    font-weight: bold;
    font-family: 'Arial', sans-serif;
}
/* Footer */
footer {
    color:gray;
    text-align: center;
    padding: 2.5rem 0;
    font-size: 0.9rem;
}


    </style>
</head>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">Travel Pro</div>
        <ul class="menu">
        <li><a href="dashboard.php" class="active"><i class="fa-solid fa-user"></i> <span>Dashboard</span></a></li>
            <li><a href="http://localhost/try/admin/manage_booking.php"><i class="fa-solid fa-plane"></i> <span>Manage Bookings</span></a></li>
            <li><a href="user_list.php"><i class="fa-solid fa-users"></i> <span>Manage user</span></a></li>
            <li><a href="#"><i class="fa-solid fa-comments"></i> <span>Feedback</span></a></li>
            <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span></a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main">
        <header class="main-header">
            <h1>Welcome, <?php echo $adminFirstName; ?>!</h1>
            <div class="theme-toggle" id="themeToggle">
                <i class="fa-solid fa-moon"></i>
                <span>Dark ModeToggle</span>
            </div>
        </header>

        <?php
            $user_query = 'SELECT * FROM users';
            $book_form_query = 'SELECT * FROM book_form';
            $user_query_result = $conn->query($user_query);
            $book_form_query_result = $conn->query($book_form_query);
        ?>

        <!-- Analytics Section -->
        <section class="analytics">
            <div class="analytics-card">
                <h3><i class="fa-solid fa-users"></i> Total Users</h3>
                <p><?php echo $user_query_result->num_rows; ?></p>
            </div>
            <div class="analytics-card">
                <h3><i class="fa-solid fa-plane"></i> Total Bookings</h3>
                <p><?php echo $book_form_query_result->num_rows; ?></p>
            </div>
            <div class="analytics-card">
                <h3><i class="fa-solid fa-comment"></i> Feedbacks</h3>
                <p>78</p>
            </div>
        </section>


    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Tab') {
                sidebar.classList.toggle('collapsed');
                document.querySelectorAll('.menu li a span').forEach(span => {
                    span.classList.toggle('collapsed-text');
                });
            }
        });

        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
        });
    </script>
   <table>
    <caption>Booking Details</caption>
    <thead>
        <tr>
            <th>SN</th>
            <th>NAME</th>
            <th>PHONE</th>
            <th>ADDRESS</th>
            <th>EMAIL</th>
            <th>LOCATION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = 'SELECT * FROM book_form';
        $res = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($res);
        $sn = 1;

        if ($row > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <tr>
                    <td data-label="SN"><?php echo $sn++; ?></td>
                    <td data-label="Name"><?php echo $row['name']; ?></td>
                    <td data-label="Phone"><?php echo $row['phone']; ?></td>
                    <td data-label="Address"><?php echo $row['address']; ?></td>
                    <td data-label="Email"><?php echo $row['email']; ?></td>
                    <td data-label="Location"><?php echo $row['location']; ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<!-- Footer Section -->
<footer>
    <p>&copy; 2024 Travel Portal. All Rights Reserved.</p>
</footer>

</body>
</html>