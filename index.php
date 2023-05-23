<?php

require_once('./forms/init.inc.php')

?>



<!DOCTYPE html>
<html lang="fr">

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
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
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
      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="./images/logo.jpg" alt="" width="120" height="80px">
      </a>

      <?php

      if (internauteEstConnecteEtEstAdmin()) {

        echo ' <nav id="navbar" class="navbar">';
        echo ' <ul> ';
        echo ' <li><a href="#hero">Accueil</a></li>';
        echo ' <li><a href="#about">A propos</a></li>';
        echo ' <li><a href="#menu">Plats</a></li>';
        echo ' <li><a href="#events">Menus</a></li>';
        echo ' <li><a href="#contact">Contact</a></li>';
        echo ' <li><a href="./forms/profile.php">Profil</a></li>';
        echo ' <li><a href="./forms/dashbordAdmin.php">Admin</a></li>';
        echo ' <li><a href="./forms/logout.php">Déconnexion</a></li>';



        echo ' </ul>';
        echo '</nav><!-- .navbar -->';
      } elseif (internauteEstConnecte()) {

        echo ' <nav id="navbar" class="navbar">';
        echo ' <ul> ';
        echo ' <li><a href="#hero">Accueil</a></li>';
        echo ' <li><a href="#about">A propos</a></li>';
        echo ' <li><a href="#menu">Plats</a></li>';
        echo ' <li><a href="#events">Menus</a></li>';
        echo ' <li><a href="#contact">Contact</a></li>';
        echo ' <li><a href="./forms/profile.php">Profil</a></li>';
        echo ' <li><a href="./forms/logout.php">Déconnexion</a></li>';
        echo ' </ul>';
        echo '</nav><!-- .navbar -->';
      } else {

        echo ' <nav id="navbar" class="navbar">';
        echo ' <ul> ';
        echo ' <li><a href="#hero">Accueil</a></li>';
        echo ' <li><a href="#about">A propos</a></li>';
        echo ' <li><a href="#menu">Plats</a></li>';
        echo ' <li><a href="#events">Menus</a></li>';
        echo ' <li><a href="#contact">Contact</a></li>';

        echo '  <li><a href="./forms/register.php">S\'inscrire</a></li>';
        echo '   <li><a href="./forms/login.php">Se connecter</a></li>';

        echo ' </ul>';
        echo '</nav><!-- .navbar -->';
      }

      ?>
      <a class="btn-book-a-table" href="./forms/booking.php">Réserver une table</a>
      <!-- <a class="btn-signup" href="./forms/register.php">S'enregistrer</a> -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->

  <?php
  $resultat_imageIndex = executeRequete1("SELECT image FROM recipe ORDER BY id_recipe desc");

  if ($resultat_imageIndex->num_rows > 0) {
    $ligne = $resultat_imageIndex->fetch_assoc();
    $Image_index = $ligne['image'];
  }
  ?>

  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Venez apprécier<br>Nos délicieux plats</h2>
          <p data-aos="fade-up" data-aos-delay="100">Venez découvrir nos spécialités</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="./forms/booking.php" class="btn-book-a-table">Réservez une table</a>
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Voir nos plats</span></a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="<?php echo $Image_index; ?>" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>A propos de nous</h2>
          <p>Découvrir <span>qui nous sommes</span></p>
        </div>
        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4>Réservez une table pas téléphone</h4>
              <p> 04.67.77.07.07</p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Notre restaurant vous offre une expérience culinaire inoubliable, avec une ambiance chaleureuse et conviviale. Nous mettons à votre disposition une sélection variée de plats savoureux, préparés avec des ingrédients frais et de qualité.
                <br>
                Notre menu propose des options pour tous les goûts, des entrées alléchantes aux desserts délicieux.
                <br>
                Nos chefs talentueux utilisent des techniques innovantes pour créer des plats qui sont à la fois esthétiquement beaux et délicieux.
                <br>
                Nous sommes fiers de proposer des plats végétariens et végétaliens qui raviront tous les convives. Vous pourrez également accompagner vos plats avec notre sélection de vins de qualité supérieure.
                <br>
                Notre équipe de service amicale et attentionnée est à votre disposition pour vous guider tout au long de votre repas et pour répondre à tous vos besoins. Nous sommes ouverts pour le déjeuner et le dîner, du lundi au samedi, et nous serions ravis de vous accueillir pour une expérience culinaire mémorable.
              </p>

              <div class="position-relative mt-4">
                <img src="assets/img/about-2.jpg" class="img-fluid" alt="">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Pourquoi choisir Le quai antique</h3>
              <p>
                Nous sommes convaincus que vous serez enchanté(e) par notre restaurant, où notre équipe attentionnée est à votre disposition pour vous offrir un service exceptionnel et vous guider dans le choix de vos plats.
                <br>
                Venez découvrir notre menu varié, qui propose des options pour tous les goûts, et laissez-nous vous offrir une expérience culinaire mémorable.
              </p>
          </div>
          </div><!-- End Why Box -->
          <div class="col-lg-8 d-flex align-items-center">
            <div class="row gy-4">
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-egg"></i>
                  <h4>Qualité</h4>
                  <p>nous mettons un point d'honneur à privilégier la qualité et l'authenticité. Chaque bouchée que vous dégusterez est le fruit d'un travail minutieux, réalisé avec passion par nos chefs talentueux.</p>
                </div>
              </div><!-- End Icon Box -->
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-egg-fill"></i>
                  <h4>Artisanat</h4>
                  <p>Nous comprenons que la satisfaction des sens est essentielle pour une expérience culinaire réussie. C'est pourquoi notre menu est élaboré avec soin, en combinant des saveurs délicates et des présentations artistiques.</p>
                </div>
              </div><!-- End Icon Box -->
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-egg-fried"></i>
                  <h4>Fraicheur</h4>
                  <p>Nous croyons fermement que la bonne cuisine est synonyme de bonheur. Nous vous invitons à découvrir les plaisirs gustatifs que nous avons à offrir, à vous laisser emporter par les saveurs exquises et les textures raffinées.</p>
                </div>
              </div><!-- End Icon Box -->
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">



      <?php

      $resultat1 = executeRequete1("SELECT categorie_recipe.name ,  recipe.title  AS Plat, recipe.description AS Descrition, recipe.price AS 'Prix €', recipe.image AS image FROM recipe , categorie_recipe WHERE recipe.id_categorie_recipe = categorie_recipe.id_categorie_recipe");

      //$plat=$resultat1['recipe.title'];

      ?>


      <div class="why-box">

        <?php
        $contenu_plat .= '<h2 data-aos="fade-up"> Nos plats </h2>';
        ?>
        <br>
      </div>
      <div class="row">

        <?php


        // Récupération des données de la table "recipe"
        $resultat = executeRequete("SELECT title, description, price, image FROM recipe");

        // Initialisation de la variable contenant le contenu des cards
        $contenu_cards = '';

        // Parcours des résultats de la requête
        while ($recette = $resultat->fetch_assoc()) {

          // Construction de la card pour chaque recette
          $contenu_cards .= '<div class="" style="width: 18rem;">';
          $contenu_cards .= '<div class="card-body">';
          $contenu_cards .= '<img class="card-img-top" src="' . $recette['image'] . '" alt="Card image cap"  style="width:200px;height:150px" onclick="openImage()" style="cursor:pointer;">';
          $contenu_cards .= '<h5 class="card-title">' . $recette['title'] . '</h5>';
          $contenu_cards .= '<p class="card-text">' . $recette['description'] . '</p>';
          $contenu_cards .= '<p class="card-text">' . $recette['price'] . ' €</p>';
          $contenu_cards .= '</div>';
          $contenu_cards .= '</div>';
        }

        // Affichage des cards
        echo $contenu_cards;
        ?>

  
      </div>
    </section><!-- End Menu Section -->
    <!-- ======= Events Section ======= -->
    <?php

    // Vérifier la connexion
    if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
    }

    // Récupérer les données de la table de menu
    $sql = "SELECT * FROM menu";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
      // Afficher les menus dans la section HTML
      echo '<section id="events" class="events section-bg">';
      echo '<div class="container-fluid" data-aos="fade-up">';
      echo '<div class="section-header">';
      echo '<p>Partagez<span> Vos Moments</span> Dans notre Restaurant';
      echo '<br>';
      echo '<span> Avec nos Menus Maison</span></p>';
      echo '</div>';
      echo '<div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">';
      echo '<div class="swiper-wrapper">';
      while($row = $result->fetch_assoc()) {
        echo '<div class="swiper-slide event-item d-flex flex-column justify-content-start" style="background-image: url(./images/visuel-menu.jpg)">';
        echo '<div class="text-container">';
        echo '<div class="text-menu-name"><h2><u>'.$row["menu_name"].'</u></h2></div>';
        echo '<br>';
        echo '<div class="text-menu-price"><h3>'.$row["price"].' €</h3></div>';
        echo '<div class="text-menu-recipe1"><h3>'.$row["recipe1"].'</h3></div>';
        echo '<br>';
        echo '<div class="text-menu-recipe2"><h3>'.$row["recipe2"].'</h3></div>';
        echo '<br>';
        echo '<div class="text-menu-recipe3"><h3>'.$row["recipe3"].'</h3></div>';
        echo '</div>';
        echo '</div>';
      }
      echo '</div>';
      echo '<div class="swiper-pagination"></div>';
      echo '</div>';
      echo '</div>';
      echo '</section>';
      
  } else {
      echo "0 results";
  }
  $mysqli->close();
  
    ?>



    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Contact</h2>
          <p>Besoin d'aide ? <span>Contactez-nous</span></p>
        </div>
        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46242.904109597264!2d3.7420683!3d43.581935550000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6ad59d1e6a48f%3A0xa8d7d5b3717cd39f!2s5%20Rue%20Cl%C3%A9ment%20Ader%2C%2034570%20Pignan!5e0!3m2!1sfr!2sfr!4v1681721584570!5m2!1sfr!2sfr" frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->
        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Notre adresse</h3>
                <p> Rue clément Ader, 34570 Pignan</p>
              </div>
            </div>
          </div><!-- End Info Item -->
          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p>contact@example.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->
          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Appelez-nous</h3>
                <p>+33 (0)467676767</p>
              </div>
            </div>
          </div><!-- End Info Item -->
          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Heure d'ouverture</h3>
                <div><strong>Lun-Dim:</strong> 11h - 23h;
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->
        </div>
         
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Adresse</h4>
            <p>
              5 Rue Clément Ader <br>
              34570 Pignan<br>
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
             </div>
        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Horaires</h4>
            <p>
              <strong>Lun-Dim: 11H</strong> - 23H<br>
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Réseaux sociaux</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <!-- End Footer -->
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    function openImage() {
      window.open("path/to/aa.jpg");
    }
  </script>

  </script>
</body>

</html>