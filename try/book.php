<?php
// Get the destination from the query parameter, default to an empty string if not set
$destination = isset($_GET['destination']) ? htmlspecialchars($_GET['destination']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>aboutus</title>
  <!-- swiper css link -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!-- font awesome cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- custom css file link -->
  <link rel="stylesheet" href="style.css">
<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap&libraries=places" async defer></script>

<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.min.css" />

  <style>
    #map {
      height: 600px;
      width: 100%;
      margin: 20px 0;
    }
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f7fc;
    }
    .container {
      width: 80%;
      margin: auto;
      text-align: center;
    }
    .routing-form {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 10px 0;
    }
    .input-box {
      flex: 1;
      margin: 0 10px;
    }
    .input-box input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .btn {
      padding: 10px 20px;
      background: #0078ff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn:hover {
      background: #0056b3;
    }
    .error {
      color: red;
      font-size: 14px;
    }
    .info {
      margin: 20px 0;
      font-size: 16px;
      color: #333;
    }
    /* General container styling */
.container {
  width: 100%; 
  margin: 0 auto;
  padding: 50px;
  background: linear-gradient(135deg, #00bcd4, #8e44ad);
  border-radius: 15px;
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
  text-align: center;
  position: relative;
  overflow: hidden;
  transition: all 0.3s ease-in-out;
}

/* Pulse animation background */
.container:before {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  width: 300px;
  height: 300px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  transform: translate(-50%, -50%);
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0% { transform: translate(-50%, -50%) scale(1); opacity: 0.1; }
  50% { transform: translate(-50%, -50%) scale(1.2); opacity: 0.4; }
  100% { transform: translate(-50%, -50%) scale(1); opacity: 0.1; }
}

.container:hover {
  transform: translateY(-15px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

/* Title Styling */
.container h1 {
  font-size: 40px;
  color: #fff;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2px;
  text-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
  margin-bottom: 50px;
  animation: fadeIn 1s ease-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Form Styling */
.routing-form {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 25px;
}

.input-box {
  width: 100%;
  max-width: 500px;
  position: relative;
  margin-bottom: 20px;
}

.input-box input {
  width: 100%;
  padding: 20px;
  border: none;
  border-radius: 10px;
  background: #fff;
  color: #333;
  font-size: 18px;
  font-weight: 400;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.input-box input:focus {
  background: #fafafa;
  border: 2px solid #0078ff;
  box-shadow: 0 4px 8px rgba(0, 120, 255, 0.2);
  outline: none;
}

.input-box label {
  font-size: 16px;
  color: #fff;
  font-weight: 500;
  margin-bottom: 10px;
  display: block;
  text-transform: capitalize;
  transition: color 0.3s ease;
}

.input-box input:focus + label {
  color: #0078ff;
}

.btn {
  padding: 15px 40px;
  background: #0078ff;
  color: #fff;
  border-radius: 50px;
  font-size: 18px;
  font-weight: bold;
  cursor: pointer;
  transition: transform 0.3s ease, background 0.3s ease;
  box-shadow: 0 10px 20px rgba(0, 120, 255, 0.2);
}

.btn:hover {
  background: #0056b3;
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0, 120, 255, 0.3);
}

/* Micro-interaction on input */
.input-box input {
  transition: transform 0.2s ease-out;
}

.input-box input:focus {
  transform: translateY(-5px);
}

/* Map Styling */
#map {
  height: 500px;
  width: 100%;
  border-radius: 20px;
  margin-top: 40px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  transition: box-shadow 0.3s ease-in-out;
}

#map:hover {
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
}

/* Info Text */
.info {
  font-size: 18px;
  color: #fff;
  font-weight: 500;
  margin-top: 30px;
  line-height: 1.6;
  transition: opacity 0.3s ease-in-out;
}

.info:hover {
  opacity: 0.8;
}

/* Error Message */
.error {
  color: #e74c3c;
  font-size: 14px;
  font-weight: bold;
  margin-top: 15px;
  animation: shake 0.3s ease-in-out;
}

@keyframes shake {
  0% { transform: translateX(0); }
  25% { transform: translateX(-10px); }
  50% { transform: translateX(10px); }
  75% { transform: translateX(-10px); }
  100% { transform: translateX(0); }
}

/* Responsive Design */
@media (max-width: 768px) {
  .container {
    padding: 30px;
  }

  .routing-form {
    flex-direction: column;
  }

  .input-box input {
    padding: 15px;
    font-size: 16px;
  }

  .btn {
    padding: 12px 35px;
    font-size: 16px;
  }
}

  </style>
</head>

<body>

<!-- header section starts -->
<section class="header">
  <a href="home.php" class="logo">travel.</a>

  <nav class="navbar">
    <a href="home.php">home</a>
    <a href="about.php">about</a>
    <a href="package.php">package</a>
    <a href="book.php">book</a>
    <a href="logout.php">logout</a>
  </nav>
  <div id="menu-btn" class="fas fa-bars"></div>
</section>
<!-- header section ends -->
<div class="heading" style="background: url(image/booka\ header.xml);">
    <h1>book now</h1>
</div>

<!--booking section stars-->
<section class="booking">
  <div class="book-form">
      <h2 class="heading-title">Book Your Trip!</h2>
      <form action="book_form.php" method="post" class="book-form">
    <div class="flex">
        <div class="inputBox">
            <span>name :</span>
            <input type="text" placeholder="Enter Your Name" name="name">
        </div>
        <div class="inputBox">
            <span>email :</span>
            <input type="text" placeholder="Enter Your email" name="email">
        </div>
        <div class="inputBox">
            <span>phone :</span>
            <input type="text" placeholder="Enter Your Phone" name="phone">
        </div>
        <div class="inputBox">
            <span>address :</span>
            <input type="text" placeholder="Enter Your Address" name="address">
        </div>
        <div class="inputBox">
    <span>where to :</span>
    <input type="text" placeholder="Enter Your Destination" name="location" value="<?php echo $destination; ?>" readonly>
</div>

        </div>
        <div class="inputBox">
            <span>how many :</span>
            <input type="text" placeholder="Number of Guests" name="guests">
        </div>
        <div class="inputBox">
            <span>arrivals :</span>
            <input type="date" name="arrivals" id="arrivals">
        <div class="inputBox">
            <span>leaving :</span>
            <input type="date" name="leaving" id="leaving">
        </div>
    </div>
    <input type="submit" value="submit" class="btn" name="send">
</form>

</section>
<script>
        // Get references to input elements
        const arrivalsInput = document.getElementById('arrivals');
        const leavingInput = document.getElementById('leaving');

        // Disable past dates for the 'arrivals' input
        const today = new Date().toISOString().split('T')[0];
        arrivalsInput.setAttribute('min', today);

        // Event listener for arrivals date change
        arrivalsInput.addEventListener('change', () => {
            const arrivalDate = arrivalsInput.value;

            // Set minimum date for 'leaving' to be one day after 'arrivals'
            if (arrivalDate) {
                const minLeavingDate = new Date(arrivalDate);
                minLeavingDate.setDate(minLeavingDate.getDate() + 1);
                leavingInput.setAttribute('min', minLeavingDate.toISOString().split('T')[0]);
            }
        });

        // Event listener for leaving date validation
        leavingInput.addEventListener('change', () => {
            const arrivalDate = new Date(arrivalsInput.value);
            const leavingDate = new Date(leavingInput.value);

            // Check if the leaving date is not earlier than the arrival date
            if (leavingDate <= arrivalDate) {
                alert("Leaving date must be greater than the arrival date.");
                leavingInput.value = ''; // Clear the invalid leaving date
            }
        });
    </script>

<div class="container">
    <h1>Travel Shortest Route Finder</h1>

    <div class="routing-form">
      <div class="input-box">
        <label for="start">Starting Point:</label>
        <input type="text" id="start" placeholder="Enter starting location (e.g., Nepal)">
      </div>
      <div class="input-box">
        <label for="destination">Destination:</label>
        <input type="text" id="destination" placeholder="Enter destination (e.g., Dubai)">
      </div>
      <button class="btn" onclick="findRoute()">Find Route</button>
    </div>

    <div id="error" class="error"></div>
    <div id="map"></div>
    <div id="info" class="info"></div>
  </div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- Leaflet Routing Machine -->
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.min.js"></script>

<script>
  // Initialize the map
  const map = L.map('map').setView([20, 0], 2);

  // Add OpenStreetMap tiles
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  }).addTo(map);

  // Geocode function
  const geocode = async (location) => {
    const response = await fetch(
      `https://nominatim.openstreetmap.org/search?q=${location}&format=json&limit=1`
    );
    const data = await response.json();
    if (data && data[0]) {
      return [parseFloat(data[0].lat), parseFloat(data[0].lon)];
    } else {
      throw new Error(`Could not find location: ${location}`);
    }
  };

  // Function to calculate distance between two points (Haversine formula)
  function calculateDistance(lat1, lon1, lat2, lon2) {
    const R = 6371; // Earth radius in km
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLon = (lon2 - lon1) * Math.PI / 180;
    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
              Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
              Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return R * c; // Distance in km
  }

  // Function to find route
  async function findRoute() {
    const start = document.getElementById('start').value.trim();
    const destination = document.getElementById('destination').value.trim();
    const errorDiv = document.getElementById('error');
    const infoDiv = document.getElementById('info');
    errorDiv.innerText = '';
    infoDiv.innerText = '';

    if (!start || !destination) {
      errorDiv.innerText = 'Please enter both starting and destination locations.';
      return;
    }

    try {
      // Geocode both start and destination locations
      const [startCoords, destinationCoords] = await Promise.all([
        geocode(start),
        geocode(destination),
      ]);

      // Calculate distance and time
      const distance = calculateDistance(startCoords[0], startCoords[1], destinationCoords[0], destinationCoords[1]);
      const estimatedTime = (distance / 900) * 60; // Assuming average speed of 900 km/h (plane speed in km/h)

      // Display distance and estimated time
      infoDiv.innerHTML = `Distance: ${distance.toFixed(2)} km<br>Estimated Time: ${estimatedTime.toFixed(2)} mins`;

      // Add route line
      const route = L.polyline([startCoords, destinationCoords], {
        color: 'blue',
        weight: 4,
        opacity: 0.7,
      }).addTo(map);

      // Fit map to the route bounds
      map.fitBounds(route.getBounds());

      // Add airplane marker
      const airplaneIcon = L.icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/682/682267.png', // Airplane icon
        iconSize: [30, 30],
      });

      // Create airplane marker at starting location
      const airplaneMarker = L.marker(startCoords, { icon: airplaneIcon }).addTo(map);

      // Animate airplane marker
      let currentLatLng = startCoords;
      const stepTime = estimatedTime * 100 / 50; // Adjust speed based on estimated time

      const interval = setInterval(() => {
        const lat = currentLatLng[0] + (destinationCoords[0] - currentLatLng[0]) / 100;
        const lon = currentLatLng[1] + (destinationCoords[1] - currentLatLng[1]) / 100;
        currentLatLng = [lat, lon];
        airplaneMarker.setLatLng(currentLatLng);
        if (currentLatLng[0] === destinationCoords[0] && currentLatLng[1] === destinationCoords[1]) {
          clearInterval(interval);
          airplaneMarker.bindPopup('You have arrived at your destination!').openPopup();
        }
      }, stepTime);

    } catch (error) {
      // Show error message in div
      errorDiv.innerText = error.message;

      // Display popup on the map showing the error
      const errorPopup = L.popup()
        .setLatLng(map.getCenter())  // Position at the center of the map
        .setContent(`<strong>Error:</strong> ${error.message}`)
        .openOn(map);  // Show the popup
    }
  }
</script>

<!-- footer section starts -->
<section class="footer">
    <div class="box-container">
      <div class="box">
        <h3>quick links</h3>
        <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
        <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
        <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
        <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
      </div>
  
      <div class="box">
        <h3>contact info</h3>
        <a href="#"> <i class="fas fa-angle-right"></i> ask question</a>
        <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
        <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
        <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div>
  
      <div class="box">
        <h3>extra links</h3>
        <a href="#"> <i class="fas fa-phone"></i> +977-9862274274</a>
        <a href="#"> <i class="fas fa-phone"></i> +977-9841396011</a>
        <a href="#"> <i class="fas fa-envelope"></i> nishanthapa320@gmail.com </a>
        <a href="#"> <i class="fas fa-map"></i> kathmandu, kritipur, nepal</a>
      </div>
  
      <div class="box">
        <h3>follow us</h3>
        <a href="#"> <i class="fab fa-facebook"></i> facebook</a>
        <a href="#"> <i class="fab fa-twitter"></i> twitter</a>
        <a href="#"> <i class="fab fa-instagram"></i> instagram</a>
        <a href="#"> <i class="fab fa-linkedin"></i> linkedin</a>
      </div>
    </div>
  <div class="credit">created by <span>mr. Nishan Thapa</span>| all rights reserved!</div>
  
  
  </section>
  <!-- footer section ends -->
  
  <!-- swiper js link -->
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  
  <!-- custom js file link -->
  <script src="js/script.js">
    
  </script>
  </body>
  </html>
  

  
  