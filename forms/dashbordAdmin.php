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


        <div class="tab-pane fade" id="recipe">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Plats</h3>
          </div>
          <?php
          $resultat_catégoriePlat = executeRequete1("SELECT name FROM categorie_recipe");
          ?>

          <div class="container">
            <h2>Formulaire d'enregistrement de plats</h2>
            <form enctype="multipart/form-data" action="record_recipe.php" method="post">
              <div class="form-group">
                <label for="list_category">Catégorie</label>
                <select required name="list_category" id="list_category">
                  <option value="" required="required">--Sélectionnez une catégorie de plat--</option>
                  <?php while ($row = $resultat_catégoriePlat->fetch_assoc()) : ?>
                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                  <?php endwhile; ?>
                </select>
              </div>
              </div>
              <div class="form-group">
                <label for="titre">Titre:</label>
                <input type="text" class="form-control" id="titre" name="titre">
              </div>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
              </div>
              <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="number" class="form-control" id="prix" name="prix">
              </div>
              <div class="form-group">
                <label for="image">Image:</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                <input type="file" name="image" size=50 />
              </div>
              <button type="submit" class="btn btn-default">Enregistrer</button>
            </form>
          </div>
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
        <form action="./record_dailyHour.php" method="post">


          <br>
          <br>
          <div class="form-group">
            <label for="titre">Jour</label>
            <select required name="list_day" id="list_day">
              <option value="" required="required">--Sélectionnez un jour--</option>
              <option value="Lundi">Lundi</option>
              <option value="Mardi">Mardi</option>
              <option value="Mercredi">Mercredi</option>
              <option value="Jeudi">Jeudi</option>
              <option value="Vendredi">Vendredi</option>
              <option value="Samedi">Samedi</option>
              <option value="Dimanche">Dimanche</option>

            </select>
            <div>
              <br>
              <br>
              <label for="open_timelunch">Heure d'ouverture matin :</label>
              <input type="time" id="open_timelunch" name="open_timelunch">
              <br>
              <br>
              <label for="close_timelunch">Heure de fermeture matin :</label>
              <input type="time" id="close_timelunch" name="close_timelunch">
              <br>
              <br>
              <label for="open_timedinner">Heure d'ouverture après-midi :</label>
              <input type="time" id="open_timedinner" name="open_timedinner">
              <br>
              <br>
              <label for="close_timedinner">Heure de fermeture après-midi :</label>
              <input type="time" id="close_timedinner" name="close_timedinner">
              <br>
              <br>
              <input type="submit" value="Enregistrer les horaires">
        </form>
        <?php

        $resultat2 = executeRequete("SELECT * FROM time_table");



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
          $contenu_heures .= '<td><a href="?action=suppression&id_timeTable=' . $ligne['id_timeTable'] . '");"><img src="../photo/icone/delete.png"></a></td>';
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