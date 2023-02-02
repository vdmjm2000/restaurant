<?php




include_once('init.inc.php');

//------------------------------ TRAITEMENTS PHP ---------------------------------//
if (!internauteEstConnecte()) header("location:login.php");

if (internauteEstConnecteEtEstAdmin()) {
  require_once("headAdmin.php");
} elseif (internauteEstConnecte()) {
  require_once("login.php");
} else {
  $contenu .= '<div class="erreur">Veuillez vous connecter <a href ="./login.php">ici</a> pour acceder à cette page</div> ';
  echo $contenu;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>[Template] Sample Inner Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


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


  <!-- ======= Menu Section ======= -->
  <section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Administration</h2>
      </div>

      <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

        <li class="nav-item">
          <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#reservation">
            <h4>Réservation</h4>
          </a>
        </li><!-- End tab nav item -->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#recipe">
            <h4>Ajouter des plats</h4>
          </a><!-- End tab nav item -->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#horaire">
            <h4>Horaires</h4>
          </a>
        </li><!-- End tab nav item -->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
            <h4>Dinner</h4>
          </a>
        </li><!-- End tab nav item -->

      </ul>

      <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

        <div class="tab-pane fade active show" id="reservation">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>réservation</h3>
          </div>

          <?php

          $resultat = executeRequete("SELECT user.nom,user.adresse, user.commentaire, booking.date_booking, booking.time_booking, booking.nbr_people FROM user JOIN booking ON user.id = booking.id_user ORDER BY date_booking asc; ");

          $contenu_reservation .= '<h2> Affichage des reservations </h2>';
          $contenu_reservation .= 'Nombre de reservation : ' . $resultat->num_rows;
          $contenu_reservation .= '<table class="table table-striped"p id="profile" border="1"><tr>';

          while ($colonne = $resultat->fetch_field()) {
            $contenu_reservation .= '<th>' . $colonne->name . '</th>';
          }

          //$contenu .= '<th>Modification</th>';
          //$contenu .= '<th>Supression</th>';
          $contenu_reservation .= '</tr>';

          while ($ligne = $resultat->fetch_assoc()) {
            $contenu .= '<tr>';
            foreach ($ligne as $indice => $information) { {
                $contenu_reservation .= '<td>' . $information . '</td>';
              }
            }
            // $contenu .= '<td><a href="?action=modification&id_produit=' . $ligne['id_booking'] .'"><img src="../photo/icone/edit.png"></a></td>';
            // $contenu .= '<td><a href="?action=suppression&id_produit=' . $ligne['id_booking'] .'" OnClick="return(confirm(\'En êtes vous certain ?\'));"><img src="../photo/icone/delete.png"></a></td>';
            $contenu_reservation .= '</tr>';
          }
          $contenu_reservation .= '</table><br><hr><br>';

          echo $contenu_reservation;

          ?>

        </div>

        <!-- Fin partie Réservation -->


        <!-- Début partie plats -->



        <div class="tab-pane fade" id="recipe">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Plats</h3>
          </div>

          <div class="container">
            <h2>Formulaire d'enregistrement de plats</h2>

            <form action="record_recipe.php" method="post">
              <div class="form-group">
                <label for="titre">Catégorie</label>
                <select name="pets" id="pet-select">
                  <option value="">--Please choose an option--</option>
                  <option value="dog">Dog</option>
                  <option value="cat">Cat</option>
                  <option value="hamster">Hamster</option>
                  <option value="parrot">Parrot</option>
                  <option value="spider">Spider</option>
                  <option value="goldfish">Goldfish</option>
                </select>
                <div>
                  <label for="titre">Titre:</label>
                  <input type="text" class="form-control" id="titre" name="titre">
                </div>
                <div>
                  <label for="description">Description:</label>
                  <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div>
                  <label for="prix">Prix:</label>
                  <input type="number" class="form-control" id="prix" name="prix">
                </div>
                <button type="submit" class="btn btn-default">Enregistrer</button>
            </form>
            <div>
              
                <?php require_once("./contact.php"); ?>
              

            </div>


          </div>

        </div>

      </div>





  <!-- Fin partie plat -->

  

  <div class="tab-pane fade" id="horaire">

    <div class="tab-header text-center">
      <p>Menu</p>
      <h3>Horaires</h3>
    </div>

    <div>
    <form action="update_hours.php" method="post">

    <label for="open_timelunch">id :</label>
  <input type="text" id="open_timeTable" name="open_timelunch" value = "<?php echo $id_recipe ?>"  required>
  <br>
  <label for="open_timelunch">Heure d'ouverture matin :</label>
  <input type="time" id="open_timelunch" name="open_timelunch" required>
  <br>
  <br>
  <label for="close_timelunch">Heure de fermeture matin :</label>
  <input type="time" id="close_timelunch" name="close_timelunch" required>
  <br>
  <br>
  <label for="open_timedinner">Heure d'ouverture après-midi :</label>
  <input type="time" id="open_timedinner" name="afternoon_open" required>
  <br>
  <br>
  <label for="close_timedinner">Heure de fermeture après-midi :</label>
  <input type="time" id="close_timedinner" name="close_timedinner" required>
  <br>
  <br>
  <input type="submit" value="Enregistrer les horaires">
</form>
<?php
$resultat2 = executeRequete("SELECT * FROM time_table");

$id_recipe = $result['id_recipe'];

$contenu_heures .= '<h2> Affichage des horaires </h2>';
$contenu_heures .= 'Nombre de plats : ' . $resultat2->num_rows;
$contenu_heures .= '<table class="table table-striped"p id="profile" border="1"><tr>';

while ($colonne = $resultat2->fetch_field()) {
  $contenu_heures .= '<th>' . $colonne->name . '</th>';
}

//$contenu .= '<th>Modification</th>';
$contenu_heures .= '<th>Supression</th>';
$contenu_heures .= '</tr>';

while ($ligne = $resultat2->fetch_assoc()) {
  $contenu_heures .= '<tr>';
  foreach ($ligne as $indice => $information) { {
      $contenu_heures .= '<td>' . $information . '</td>';
    }
  }
  // $contenu_heures .= '<td><a href="?action=modification&id_produit=' . $ligne['id_booking'] .'"><img src="../photo/icone/edit.png"></a></td>';
  $contenu_heures .= '<td><a href="?action=suppression&id_timeTable=' . $ligne['id_timeTable'] .'");"><img src="../photo/icone/delete.png"></a></td>';
  $contenu_heures .= '</tr>';
}
$contenu_heures .= '</table><br><hr><br>';

echo $contenu_heures;
?>

    </div>






  </div><!-- Fin partie Horaires -->

  <div class="tab-pane fade" id="menu-dinner">

    <div class="tab-header text-center">
      <p>Menu</p>
      <h3>Dinner</h3>
    </div>

    <div class="row gy-5">

      <div class="col-lg-4 menu-item">
        <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
        <h4>Magnam Tiste</h4>
        <p class="ingredients">
          Lorem, deren, trataro, filede, nerada
        </p>
        <p class="price">
          $5.95
        </p>
      </div><!-- Menu Item -->

      <div class="col-lg-4 menu-item">
        <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img src="assets/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
        <h4>Aut Luia</h4>
        <p class="ingredients">
          Lorem, deren, trataro, filede, nerada
        </p>
        <p class="price">
          $14.95
        </p>
      </div><!-- Menu Item -->

      <div class="col-lg-4 menu-item">
        <a href="assets/img/menu/menu-item-3.png" class="glightbox"><img src="assets/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
        <h4>Est Eligendi</h4>
        <p class="ingredients">
          Lorem, deren, trataro, filede, nerada
        </p>
        <p class="price">
          $8.95
        </p>
      </div><!-- Menu Item -->

      <div class="col-lg-4 menu-item">
        <a href="assets/img/menu/menu-item-4.png" class="glightbox"><img src="assets/img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
        <h4>Eos Luibusdam</h4>
        <p class="ingredients">
          Lorem, deren, trataro, filede, nerada
        </p>
        <p class="price">
          $12.95
        </p>
      </div><!-- Menu Item -->

      <div class="col-lg-4 menu-item">
        <a href="assets/img/menu/menu-item-5.png" class="glightbox"><img src="assets/img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
        <h4>Eos Luibusdam</h4>
        <p class="ingredients">
          Lorem, deren, trataro, filede, nerada
        </p>
        <p class="price">
          $12.95
        </p>
      </div><!-- Menu Item -->

      <div class="col-lg-4 menu-item">
        <a href="assets/img/menu/menu-item-6.png" class="glightbox"><img src="assets/img/menu/menu-item-6.png" class="menu-img img-fluid" alt=""></a>
        <h4>Laboriosam Direva</h4>
        <p class="ingredients">
          Lorem, deren, trataro, filede, nerada
        </p>
        <p class="price">
          $9.95
        </p>
      </div><!-- Menu Item -->

    </div>
  </div><!-- End Dinner Menu Content -->

  </div>

  </div>
  </section><!-- End Menu Section -->


  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>