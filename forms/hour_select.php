<?php



require_once("./init.inc.php");


require_once("./head.php");




//------------------------------ TRAITEMENTS PHP ---------------------------------//
if (!internauteEstConnecte()) header("location:login.php");

//--------------------------------- AFFICHAGE HTML ---------------------------------//




$id = $_SESSION['user']['id'];
$nom = $_SESSION['user']['nom'];
$email = $_SESSION['user']['email'];
$tel = $_SESSION['user']['tel'];

$date_book = $_POST['date'];
$guests = $_POST['guests'];



?>


<div class="text-center">

<form action="./record_booked.php " method="post" id="form_booking">

  <label for="name"></label>
  <input type="hidden" id="id_user" name="id_user" placeholder="id" value="<?php echo ($id) ?>"><br><br>

  <label for="name">Nom</label>
  <br>
  <input type="text" disabled="disabled" id="name" name="name" placeholder="Entrez votre nom" value="<?php echo ($nom) ?>"><br><br>

  <label for="email">Email</label>
  <br>
  <input type="email" disabled="disabled" id="email" name="email" placeholder="Entrez votre email" value="<?php echo ($email) ?>" required><br><br>

  <label for="phone">Numéro de téléphone</label>
  <br>
  <input type="tel" disabled="disabled" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" value="<?php echo ($tel) ?>" required><br><br>

  <label for="date">Date</label>
  <input type="date" id="date" name="date" value="<?php echo ($date_book) ?>" required> &ensp; &ensp;

  <label for="guests">Nombre de personnes</label>
  
  <input type="number" id="guests" name="guests" value="<?php echo ($guests) ?>" min="1" max="10" required><br><br>



  <?php
  $selected_date = $_POST['date'];
  ?>

  <?php
  $selected_date = $_POST['date'];

  // Obtenir la capacité totale pour la date sélectionnée
  $query = "SELECT DATE_FORMAT(time_book, '%H:%i') AS formatted_hour_booking, capacity FROM time_booked ORDER BY time_book ASC";
  $result = mysqli_query($mysqli, $query);
  $available_times = array();



  while ($row = mysqli_fetch_assoc($result)) {
    $time = $row['formatted_hour_booking'];
    $capacity = $row['capacity'];
    $query2 = "SELECT SUM(nbr_people) as total_people FROM booking WHERE date_booking='$selected_date' AND time_booking='$time'";
    $result2 = mysqli_query($mysqli, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $total_people = $row2['total_people'];
    if (($total_people + $_POST['guests']) <= $capacity) {
      $remaining_capacity = $capacity - $total_people;
      array_push($available_times, array("time" => $time, "capacity" => $remaining_capacity));
    }
  }

  if (count($available_times) > 0) {

      foreach ($available_times as $time_capacity) {
        echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
        echo '<label class="btn btn-secondary">';
        echo '<input type="radio" name="time_book"  value="' . $time_capacity['time'] . '">&nbsp;&nbsp;' . $time_capacity['time'] . '&nbsp;&nbsp;&nbsp;';
      echo '(' . $time_capacity['capacity'] . ')&nbsp;&nbsp;&nbsp;';
      echo '</div>';
    }
  } else {
    echo 'Aucun horaire disponible pour la date sélectionnée avec le nombre de personnes renseigné';
    echo '<br>';
    echo 'Veuillez renseigner une autre date <a href="./booking.php">&nbsp; ici </a>';
  }

  //echo 'le nombre de personne sélectionné est ' . $_POST['guests'];




  // n'affiche pas le bouton "Reserver" si il n'y a plus de créneau disponilble

  if (count($available_times) > 0) {

    echo '<div>
        <br>
          <input type="submit" value="Réserver">
          <div>';
  }
  ?>
</form>

</div>

<!-- votre code HTML actuel -->
<?php
include_once('./footer.php');
?>