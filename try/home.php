<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
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
<!--home section starts-->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

<section class="home">
  <div class="swiper home-slider">
    <div class="swiper-wrapper">

      <div class="swiper-slide slide" style="background: url(image/home1.avif)no-repeat;">
        <div class="content">
          <span>explore, discover, travel</span>
          <h3>travel around the world</h3>
          <a href="javascript:void(0);" onclick="checkLogin('package.php')" class="btn">discover more</a>
        </div>
      </div>
      <div class="swiper-slide slide" style="background: url(image/image4.7.avif)no-repeat;">
        <div class="content">
          <span>explore, discover, travel</span>
          <h3>discover new place</h3>
          <a href="javascript:void(0);" onclick="checkLogin('package.php')" class="btn">discover more</a>
        </div>
      </div>


      <div class="swiper-slide slide" style="background: url(image/home5.webp)no-repeat;">
        <div class="content">
          <span>explore, discover, travel</span>
          <h3>make your tour worthwhile</h3>
          <a href="javascript:void(0);" onclick="checkLogin('package.php')" class="btn">discover more</a>
        </div>

      </div>
      
      <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    </div>
  </div>
</section>

<!--home section ends-->




<!--service section start-->
<section class="services-container">
  <h2 class="services-title">Our Services</h2> <!-- Added title here -->
</section>
<section class="services">
  
  <div class="service-card">
      <img src="image/ad.png" alt="Adventure">
      <h3>Adventure</h3>
  </div>
  <div class="service-card">
      <img src="image/tour.png" alt="Tour Guide">
      <h3>Tour Guide</h3>
  </div>
  <div class="service-card">
      <img src="image/tracking11.png" alt="Trekking">
      <h3>Trekking</h3>
  </div>
  <div class="service-card">
      <img src="image/camping123.png" alt="Camp Fire">
      <h3>Camp Fire</h3>
  </div>
  <div class="service-card">
      <img src="image/offroad.png" alt="Off Road">
      <h3>Off Road</h3>
  </div>
  <div class="service-card">
      <img src="image/camp icon.png" alt="Camping">
      <h3>Camping</h3>
  </div>
</section>



<!--service section end-->
<!--home about section starts-->

<section class="home-about">

  <div class="image">
    <img src="image/about1.jpg" alt="">

  </div>

<div class="content">
  <h3> aboutus</h3>
  <p>"Discover the world with ease! Our travel agency is here to help you explore dream destinations with personalized planning and hassle-free bookings. Whether you're seeking adventure, relaxation, or cultural experiences, we provide tailored trips that suit your desires. Let us handle the details, so you can focus on making memories!"
  </p>
  <a href="javascript:void(0);" onclick="checkLogin('about.php')" class="btn">Read more</a>

</div>
</section>

<!--home about section ends-->
<!--home package section starts-->
<section class="home-package">
    <h2 class="package-tittle">Our package</h2>
  <div class="box-container">


    <div class="box">
    <div class="image">
      <img src="image/package.jpeg" alt="">
    </div>
    <div class="contact">
      <h3>adventure & tour</h3>
      <p>"Our travel packages are designed to give you the perfect blend of adventure and relaxation. Whether you're looking for a weekend getaway, a cultural escape, or a long vacation, we’ve got a package that fits your needs. Enjoy exclusive deals, curated itineraries, and the convenience of an all-in-one experience. Let us craft the perfect trip for you!"
      </p>
      <a href="book.php?destination=Advanture&tour" class="btn">Book now</a>
    </div>
    </div>

    <div class="box">
      <div class="image">
        <img src="image/package2.webp" alt="">
      </div>
      <div class="contact">
        <h3>adventure & tour</h3>
        <p>"Our travel packages are designed to give you the perfect blend of adventure and relaxation. Whether you're looking for a weekend getaway, a cultural escape, or a long vacation, we’ve got a package that fits your needs. Enjoy exclusive deals, curated itineraries, and the convenience of an all-in-one experience. Let us craft the perfect trip for you!"
        </p>
        <a href="book.php?destination=Advanture&tour" class="btn">Book now</a>
      </div>
      </div>

      <div class="box">
        <div class="image">
          <img src="image/package3.jpg" alt="">
        </div>
        <div class="contact">
          <h3>adventure & tour</h3>
          <p>"Our travel packages are designed to give you the perfect blend of adventure and relaxation. Whether you're looking for a weekend getaway, a cultural escape, or a long vacation, we’ve got a package that fits your needs. Enjoy exclusive deals, curated itineraries, and the convenience of an all-in-one experience. Let us craft the perfect trip for you!"
          </p>
          <a href="book.php?destination=Advanture&tour" class="btn">Book now</a>
        </div>
        </div>
  </div>
  <div class="load-more"> <a href="javascript:void(0);" onclick="checkLogin('package.php')" class="btn">load-more</a></div>
</section>
 
<!--home package section ends-->

<!--home offer sections starts-->

<section class="home-offer">
  <div class="contect">
    <h3>up to 35% off</h3>
    <P>Discover incredible travel packages with discounts of up to 35%! Whether you're planning a relaxing beach vacation, an adventurous mountain trek, or a city tour, our offers make your dream trip more affordable than ever. Book now to secure these limited-time deals and start packing for your next adventure!
     </P>
     <a href="javascript:void(0);" onclick="checkLogin('book.php')" class="btn">book now</a>
  </div>
</section>

<!--home offer sections ends-->













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
      <a href="https://mail.google.com/mail/u/0/#inbox"> <i class="fas fa-angle-right"></i> ask question</a>
      <a href="about.php"> <i class="fas fa-angle-right"></i> about us</a>
      <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
      <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
    </div>

    <div class="box">
      <h3>extra links</h3>
      <a href="#"> <i class="fas fa-phone"></i> +977-9862274274</a>
      <a href="#"> <i class="fas fa-phone"></i> +977-9841396011</a>
      <a href="https://mail.google.com/mail/u/0/#inbox"> <i class="fas fa-envelope"></i> nishanthapa320@gmail.com </a>
      <a href="https://www.google.com/maps/@27.6704922,85.2491518,13z?entry=ttu&g_ep=EgoyMDI0MTAyOS4wIKXMDSoASAFQAw%3D%3D"> <i class="fas fa-map"></i> kathmandu, kritipur, nepal</a>
    </div>

    <div class="box">
      <h3>follow us</h3>
      <a href="https://www.facebook.com/nishan.thapa.3745496"> <i class="fab fa-facebook"></i> facebook</a>
      <a href="https://www.instagram.com/_nishan.thapa_/"> <i class="fab fa-twitter"></i> twitter</a>
      <a href="https://www.instagram.com/_nishan.thapa_/"> <i class="fab fa-instagram"></i> instagram</a>
      <a href="https://www.linkedin.com/in/nishan-thapa-6788b0260/"> <i class="fab fa-linkedin"></i> linkedin</a>
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
  var swiper = new Swiper('.home-slider', {
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      autoplay: {
        delay: 2000, 
      },
  });
</script>
<script>
  function checkLogin(actionUrl) {
    <?php if (!$is_logged_in): ?>
      if (confirm("You need to log in to access this feature. Would you like to log in now?")) {
        window.location.href = "index.php"; 
      }
    <?php else: ?>
      window.location.href = actionUrl; 
    <?php endif; ?>
  }
</script>
