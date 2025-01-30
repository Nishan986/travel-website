<?php
$connection = mysqli_connect('localhost', 'root', '', 'travel_website');

// Checking connection
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $location = mysqli_real_escape_string($connection, $_POST['location']);
    $guests = mysqli_real_escape_string($connection, $_POST['guests']);
    $arrivals = mysqli_real_escape_string($connection, $_POST['arrivals']);
    $leaving = mysqli_real_escape_string($connection, $_POST['leaving']);

    // Check if any required field is empty
    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($location) || empty($guests) || empty($arrivals) || empty($leaving)) {
        echo "<script>
                alert('Please fill  all the information.');
                window.history.back();
              </script>";
    } 
    
    elseif (!ctype_digit($phone)) {
        echo "<script>
                alert('Please enter a valid phone number with only digits.');
                window.history.back();
              </script>";
    }
    
    elseif (!preg_match("/@gmail\.com$/", $email)) {
        echo "<script>
                alert('Please enter a valid email ending with @gmail.com.');
                window.history.back();
              </script>";
    }
    
    elseif (!ctype_digit($guests)) {
        echo "<script>
                alert('Please enter a valid number of guests.');
                window.history.back();
              </script>";
    }
    
    elseif (empty($arrivals) || empty($leaving)) {
        echo "<script>
                alert('Please select valid arrival and leaving dates.');
                window.history.back();
              </script>";
    }
    
    elseif (empty($location)) {
        echo "<script>
                alert('Please enter a valid location.');
                window.history.back();
              </script>";
    }
    else {
        
        $request = "INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving) 
                    VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";

        
        if (mysqli_query($connection, $request)) {
            
            echo "<script>
                    alert('Booking successfully saved!');
                    window.location.href = 'book.php';
                  </script>";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
} else {
    echo 'Please submit the form.';
}

mysqli_close($connection);
