<?php

include_once('init.inc.php');
include_once('./head.php');

//------------------------------ TRAITEMENTS PHP ---------------------------------//
if (!internauteEstConnecte()) header("location:login.php");
if (!internauteEstConnecteEtEstAdmin()) header("location:login.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Bootstrap Nav Pills</title>
  
</head>

<body>
  <nav class="nav nav-tabs nav-fill">
    <a class="nav-item nav-link active" data-toggle="pill" href="#reservation">Réservation</a>
    <a class="nav-item nav-link" data-toggle="pill" href="#plat"> Plats</a>
    <a class="nav-item nav-link" data-toggle="pill" href="#menu"> Menus</a>
    <a class="nav-item nav-link" data-toggle="pill" href="#horaire"> Horaires</a>
  </nav>


  <div class="tab-content mt-3">
    <div class="tab-pane fade show active" id="reservation">
      <h3>Reservation</h3>
      <p>Tableau de reservations en cours</p>
      <?php
      $resultat = executeRequete("SELECT user.nom AS Nom , user.tel AS Téléphone, user.commentaire, DATE_FORMAT(booking.date_booking, '%d/%m/%y') AS Jour, DATE_FORMAT(booking.time_booking, '%H:%i') AS Heure, booking.nbr_people AS Nombre
                  FROM user 
                  JOIN booking 
                  ON user.id = booking.id_user 
                  AND DATE(booking.date_booking) >= CURDATE()
                  ORDER BY date_booking asc; ");

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
        $contenu_reservation .= '<tr>';
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


    <div class="tab-pane fade" id="plat">
      <h3>Plats</h3>
      <p>Ajout/suppression de plats</p>
      <?php

      // Affichage de la popup print
      echo '<script type="text/javascript">
        function showPrintPopup() {
            var printPopup = window.open("", "printPopup", "width=500,height=500");
            printPopup.document.write("<html><head><title>Popup print</title></head><body>");
            printPopup.document.write("<h1>Ajouter une nouvelle catégorie</h1>");
            printPopup.document.write("<form method=\"post\" action=\"ajouter_categorie.php\">"); // Ouvre le formulaire avec laction "ajouter_categorie.php"
            printPopup.document.write("<label for=\"name\">Nom :</label>"); // Utilise "name" comme identifiant plutôt que "categorie_recipe"
            printPopup.document.write("<input type=\"text\" id=\"categorie\" name=\"categorie\" placeholder=\"Entrez le nom de la catégorie\">"); // Ajoute un champ texte pour le nom de la catégorie
            printPopup.document.write("<input type=\"submit\" value=\"Ajouter catégorie\">");
            printPopup.document.write("</form>");
            printPopup.document.write("</body></html>");
            printPopup.document.close();
        }
        </script>';

      // Bouton pour afficher la popup print
      echo '<button onclick="showPrintPopup()">Ajouter catégorie</button>';



      $resultat_catégoriePlat = executeRequete1("SELECT name FROM categorie_recipe");
      ?>

      <div class="container">
        <form enctype="multipart/form-data" action="record_recipe.php" method="post">
          <div class="form-group">
            <label for="list_category">Catégorie</label>
            <br>
            <br>
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
      <br>
      <div class="form-group">
        <label for="image">Image:</label>
        <br>
        <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
        <input type="file" name="image" size=50 capture />
      </div>
      <br>
      <div class="form-group">
        <button type="submit" class="">Enregistrer</button>
      </div>
      </form>

      <?php require_once("./recipe.php"); ?>
    </div>





    <div class="tab-pane fade" id="menu">
      <h3>Menus</h3>
      <p>Ajout/suppression de menus</p>
      <form action="insert_menu.php" method="post">
        <label for="name">Nom du menu :</label>
        <input type="text" id="name" name="name" required><br>

        <label for="recipe1">Recette 1 :</label>
        <select id="recipe1" name="recipe1" required>
          <?php
          $resultat = executeRequete("SELECT title from recipe");
          // Affichage des options de la liste déroulante
          while ($row = mysqli_fetch_assoc($resultat)) {
            echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
          }
          ?>
        </select><br>

        <label for="recipe2">Recette 2 :</label>
        <select id="recipe2" name="recipe2">
          <?php
          $resultat = executeRequete("SELECT title from recipe");
          // Affichage des options de la liste déroulante
          while ($row = mysqli_fetch_assoc($resultat)) {
            echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
          }
          ?>
        </select><br>

        <label for="recipe3">Recette 3 :</label>
        <select id="recipe3" name="recipe3">
          <?php
          $resultat = executeRequete("SELECT title from recipe");
          // Affichage des options de la liste déroulante
          while ($row = mysqli_fetch_assoc($resultat)) {
            echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
          }
          ?>

        </select><br>

        <label for="price">Prix :</label>
        <input type="text" id="price" name="price" required><br>

        <input type="submit" value="Enregistrer">
      </form>

      <?php require_once("./show_recipe.php"); ?>
    </div>




    <div class="tab-pane fade" id="horaire">
      <h3>Horaires</h3>
      <p>Ajout/suppression d'horaires ouverture/fermeture.</p>

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
          </div>
        </div>

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
        $contenu_heures .= '<td><a href="?action=suppression&id_timeTable=' . $ligne['id_timeTable'] . '");"><img src=" ../images/poubelle.gif"></a></td>';
        $contenu_heures .= '</tr>';
      }
      $contenu_heures .= '</table><br><hr><br>';

      echo $contenu_heures;
      ?>
    </div>
  </div>
<?php require_once("./footer.php");
?>

</body>

</html>