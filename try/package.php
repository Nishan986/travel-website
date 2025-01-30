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
  
  
</head>
<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']); // Assuming you set user_id in the session upon login
?>

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
<div class="heading" style="background: url(image/package\ herader3.jpeg);">
    <h1>package</h1>
</div>
<!--package section starts-->
<section class="package">
  <h1 class="heading-title">Top Destinations</h1>
  <div class="box-container">

      <!-- Sample destination boxes with unique images and content -->
      <div class="box">
          <div class="image">
              <img src="image/package.jpeg" alt="Adventure & Tour">
          </div>
          <div class="content">
              <h3>Adventure & Tour</h3>
              <p>Our travel packages are designed to give you the perfect blend of adventure and relaxation. Whether you're looking for a weekend getaway, a cultural escape, or a long vacation, we’ve got a package that fits your needs.</p>
              <a href="book.php?destination=Advanture&tour" class="btn">Book now</a>
          </div>
      </div>

      <div class="box">
          <div class="image">
              <img src="image/dubai.webp" alt="Dubai">
          </div>
          <div class="content">
              <h3>Dubai</h3>
              <p>Dubai is known for luxury shopping, ultramodern architecture, and vibrant nightlife. Famous for attractions like the Burj Khalifa and Palm Jumeirah, this city blends tradition with modern innovation.</p>
              <a href="book.php?destination=Dubai" class="btn">Book now</a>
          </div>
      </div>

      <div class="box">
          <div class="image">
              <img src="image/berlin.jpeg" alt="Berlin">
          </div>
          <div class="content">
              <h3>Berlin</h3>
              <p>Berlin, the capital of Germany, is rich in history, culture, and art, known for landmarks like the Berlin Wall and Brandenburg Gate, as well as its vibrant art scene.</p>
              <a href="book.php?destination=Berlin" class="btn">Book now</a>
          </div>
      </div>

      <div class="box">
          <div class="image">
              <img src="image/new-york.jpg" alt="New York">
          </div>
          <div class="content">
              <h3>New York</h3>
              <p>New York City, known as "The Big Apple," is a bustling metropolis famous for iconic landmarks like Times Square, the Statue of Liberty, and the Empire State Building.</p>
              <a href="book.php?destination=New York" class="btn">Book now</a>
          </div>
      </div>

<div class="box">
  <div class="image">
    <img src="image/tokyo.jpeg" alt="tokyo">
  </div>
  <div class="content">
    <h3> tokyo</h3>
    <p>Tokyo, Japan's bustling capital, is a dynamic city where cutting-edge technology meets deep-rooted tradition. Known for its neon-lit skyscrapers, historic temples, and efficient public transport, Tokyo offers a unique blend of the modern and the traditional</p>
    <a href="book.php?destination=Tokyo" class="btn">Book now</a>
  </div>
</div>

<div class="box">
  <div class="image">
    <img src="image/sydney.jpg" alt="sydney">
  </div>
  <div class="content">
    <h3> sydney</h3>
    <p>Sydney, Australia’s largest city, is renowned for its stunning harbor and iconic landmarks, such as the Sydney Opera House and Sydney Harbour Bridge. With beautiful beaches like Bondi and Manly, it’s a paradise for surfers and beach lovers alike. </p>
    <a href="book.php?destination=Sydney" class="btn">Book now</a>
  </div>
</div>

<div class="box">
  <div class="image">
    <img src="image/queenstown.jpg" alt="queenstown">
  </div>
  <div class="content">
    <h3>queenstown</h3>
    <p>Queenstown, New Zealand, is a picturesque resort town set along Lake Wakatipu and surrounded by the Southern Alps. Known as the "Adventure Capital of the World," it offers thrilling activities like bungee jumping, skiing, and jet boating. </p>
    <a href="book.php?destination=Queenstown" class="btn">Book now</a>
  </div>
</div>

<div class="box">
  <div class="image">
    <img src="image/burkina faso.jpg" alt="burkina faso">
  </div>
  <div class="content">
    <h3> burkina faso</h3>
    <p>Burkina Faso, a landlocked country in West Africa, is known for its rich cultural heritage and warm, hospitable people. Its capital, Ouagadougou, is a center for West African art and music, hosting events like FESPACO, Africa's largest film festival. </p>
    <a href="book.php?destination=Bukina Faso" class="btn">Book now</a>
  </div>
</div>


<div class="box">
  <div class="image">
    <img src="image/bangkok.webp">
  </div>
  <div class="content">
    <h3> bangkok</h3>
    <p>Bangkok, the vibrant capital of Thailand, is a bustling city known for its mix of modernity and tradition. Famous for its ornate temples like Wat Arun and Wat Phra Kaew, as well as the Grand Palace, it’s a top destination for cultural exploration. </p>
    <a href="book.php?destination=Bangkok" class="btn">Book now</a>
  </div>
</div>

<div class="box">
  <div class="image">
    <img src="image/beijing.webp">
  </div>
  <div class="content">
    <h3> beijing</h3>
    <p>Beijing, the capital of China, is a city steeped in history and culture, blending ancient traditions with modernity. It is home to iconic landmarks like the Forbidden City, the Temple of Heaven, and the Summer Palace, showcasing its imperial past. </p>
    <a href="book.php?destination=Beijing" class="btn">Book now</a>
  </div>
</div>


<div class="box">
  <div class="image">
    <img src="image/the-great-wall-of-china.jpg">
  </div>
  <div class="content">
    <h3> great wall of China</h3>
    <p>The Great Wall of China is an awe-inspiring ancient structure stretching over 13,000 miles across northern China. Originally built to protect Chinese states from invasions, the wall dates back over 2,000 years, with sections built by different dynasties, notably the Qin and Ming. </p>
    <a href="book.php?destination=China" class="btn">Book now</a>
  </div>
</div>


<div class="box">
  <div class="image">
    <img src="image/phuket.jpg">
  </div>
  <div class="content">
    <h3> phuketk</h3>
    <p>Phuket, Thailand's largest island, is famous for its stunning beaches, turquoise waters, and vibrant nightlife. Known for spots like Patong Beach, Kata Beach, and the Phi Phi Islands, it’s a paradise for sun-seekers and adventure lovers alike. </p>
    <a href="book.php?destination=Phuket" class="btn">Book now</a>
  </div>
</div>


<div class="box">
  <div class="image">
    <img src="image/los vegas.webp">
  </div>
  <div class="content">
    <h3> los vegas</h3>
    <p>Las Vegas, known as the Entertainment Capital of the World, is famous for its vibrant nightlife, luxurious casinos, and dazzling lights. Located in the Nevada desert, this city offers endless entertainment, from world-class shows and concerts to thrilling casinos along the famous Las Vegas Strip. </p>
    <a href="book.php?destination=Las Vegas" class="btn">Book now</a>
  </div>
</div>


<div class="box">
  <div class="image">
    <img src="image/bali.jpeg">
  </div>
  <div class="content">
    <h3> bali</h3>
    <p>Bali, known as the "Island of the Gods," is a tropical paradise in Indonesia renowned for its stunning beaches, lush rice terraces, and vibrant culture. It offers a mix of natural beauty and rich traditions, with iconic temples like Tanah Lot and Uluwatu perched on scenic cliffs. </p>
    <a href="book.php?destination=Bali" class="btn">Book now</a>
  </div>
</div>


</section>



<div class="load-more"><span class="btn">load more</span></div>

<!--package section ends-->













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
  <script src="js/script.js"></script>
  </body>
  </html>
  <!-- Swiper JavaScript -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
 document.querySelector(".load-more .btn").addEventListener("click", function() {
    // Select all currently hidden boxes
    let hiddenBoxes = document.querySelectorAll(".package .box-container .box:not([style*='display: block'])");

    // Show the next 3 hidden boxes
    for (let i = 0; i < 3 && i < hiddenBoxes.length; i++) {
        hiddenBoxes[i].style.display = "block";
    }

    // Hide the "Load More" button if no more boxes are hidden
    if (document.querySelectorAll(".package .box-container .box:not([style*='display: block'])").length === 0) {
        this.style.display = "none";
    }
});
</script>
<script>
  function checkLogin(actionUrl) {
    <?php if (!$is_logged_in): ?>
      if (confirm("You need to log in to access this feature. Would you like to log in now?")) {
        window.location.href = "index.php"; // Redirect to the login page
      }
    <?php else: ?>
      window.location.href = actionUrl; // Proceed to the action URL
    <?php endif; ?>
  }
</script>
