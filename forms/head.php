<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Le Quai Antique</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/aa.ico" rel="icon">
  <link href="../assets/img/aa.ico" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap-reboot.min.css">



  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <!-- script   -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>



  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy - v1.3.0
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  
</head>
  
<body>

 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">
   <div class="container d-flex align-items-center justify-content-between">
     <a href="../index.php" class="logo d-flex align-items-center me-auto me-lg-0">
       <!-- Uncomment the line below if you also wish to use an image logo -->
      <img src="../images/logo.jpg" alt="" width="60px" height="60px">
      <!-- <h1>Chef Jeanmich<span>.</span></h1>-->
     </a>

     <?php 

     if (internauteEstConnecteEtEstAdmin()) {      

     echo ' <nav id="navbar" class="navbar">';
     echo ' <ul> ';
     echo ' <li><a href="../index.php">Accueil</a></li>';
     echo ' <li><a href="./profile.php">Profil</a></li>';
     echo ' <li><a href="./dashbordAdmin.php">Admin</a></li>';
     echo ' <li><a href="./logout.php">Déconnexion</a></li>';
     echo ' </ul>';
     echo '</nav><!-- .navbar -->';

     }   elseif (internauteEstConnecte())  {

       echo ' <nav id="navbar" class="navbar">';
       echo ' <ul> ';
       echo ' <li><a href="../index.php">Accueil</a></li>';
       echo ' <li><a href="./profile.php">Profil</a></li>';  
       echo ' <li><a href="./logout.php">Déconnexion</a></li>';
       echo ' </ul>';
       echo '</nav><!-- .navbar -->';


     }  else {

       echo ' <nav id="navbar" class="navbar">';
       echo ' <ul> ';
       echo ' <li><a href="#hero">Accueil</a></li>';
       echo ' <li><a href="#about">A propos</a></li>';
       echo ' <li><a href="#menu">Menu</a></li>';
       echo ' <li><a href="#events">Evénement</a></li>';
       echo ' <li><a href="#gallery">Gallerie</a></li>';
       echo ' <li><a href="#contact">Contact</a></li>';
       echo '  <li><a href="./register.php">S\'inscrire</a></li>';
       echo '   <li><a href="./login.php">Se connecter</a></li>'; 
       echo ' </ul>';
       echo '</nav><!-- .navbar -->';



     }

     ?>

<a class="btn-book-a-table" href="./booking.php">Réserver une table</a>
      <!-- <a class="btn-signup" href="./forms/register.php">S'enregistrer</a> -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header><!-- End Header -->
</header>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

</body>


