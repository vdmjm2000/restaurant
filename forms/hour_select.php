<?php



require_once("./init.inc.php");






//------------------------------ TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:login.php");

//--------------------------------- AFFICHAGE HTML ---------------------------------//



if (internauteEstConnecteEtEstAdmin()) {
    require_once("./headAdmin.php");
}
elseif (internauteEstConnecte()) {
  require_once("./head.php");
}


$id = $_SESSION['user']['id'];
$nom = $_SESSION['user']['nom'];
$email = $_SESSION['user']['email'];
$tel = $_SESSION['user']['tel'];

$date_book = $_POST['date'];
$guests = $_POST['guests'];




?>




<form action="./record_booked.php " method="post" id="form_booking">

<label for="name"></label>
  <input type="hidden"  id="id_user" name="id_user" placeholder="id" value="<?php echo ($id) ?>"><br><br>

  <label for="name">Nom</label>
  <input type="text" disabled="disabled" id="name" name="name" placeholder="Entrez votre nom" value="<?php echo ($nom) ?>"><br><br>

  <label for="email">Email</label>
  <input type="email" disabled="disabled" id="email" name="email" placeholder="Entrez votre email" value="<?php echo ($email) ?>" required><br><br>

  <label for="phone">Numéro de téléphone</label>
  <input type="tel" disabled="disabled" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" value="<?php echo ($tel) ?>" required><br><br>

  <label for="date">Date</label>
  <input type="date" disabled="disabled" id="date" name="date" value="<?php echo ($date_book) ?>" required><br><br>


 
  <label for="guests">Nombre de personnes</label>
  <input type="number" disabled="disabled" id="guests" name="guests" value="<?php echo ($guests) ?>" min="1" max="10" required><br><br>


<label for="date">Heure</label>
<div class="check">

<?php
   
$selected_date=$_POST['date'];

 ?>

  <div class="check">
  <?php
      $query = "SELECT SUM(nbr_people) as total_people FROM booking WHERE date_booking='$selected_date'";
      $result = mysqli_query($mysqli, $query);
      $row = mysqli_fetch_assoc($result);
      $total_people = $row['total_people'];

      $query2 = "SELECT time_book, capacity FROM time_booked ORDER BY time_book ASC";
      $result2 = mysqli_query($mysqli, $query2);
      $available_times = array();

      while ($row2 = mysqli_fetch_assoc($result2)) {
        if (($total_people + $_POST['guests']) <= $row2['capacity']) {
          array_push($available_times, $row2['time_book']);
        }
      }

      if (count($available_times) > 0) {
        foreach ($available_times as $time) {
          echo '<input type="checkbox" name="time_book" value="' . $time . '">&nbsp;&nbsp;'. $time . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    
        }
      } else {
        echo 'Aucun horaire disponible pour la date sélectionnée avec le nombre de personnes renseigné';
        echo 'Veuillez renseigner une autre date <a href="./booking.php"> ici </a>';
      }

      //echo 'le nombre de personne sélectionné est ' . $_POST['guests'];
    ?>


          <br>
          <div>
          <input type="submit" value="Réserver">
          <div>
 
  </form>       

      


