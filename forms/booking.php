<?php

use LDAP\Result;

require_once("./init.inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:login.php");

//--------------------------------- AFFICHAGE HTML ---------------------------------//



if (internauteEstConnecteEtEstAdmin()) {
    require_once("./headAdmin.php");
}
elseif (internauteEstConnecte()) {
    require_once("./head.php");
}

// Requête pour récupérer les données

$stmt = $mysqli->query("SELECT * FROM user");
$result = $stmt->fetch_assoc();

$id = $_SESSION['user']['id'];
$nom = $_SESSION['user']['nom'];
$email = $_SESSION['user']['email'];
$tel = $_SESSION['user']['tel'];



//--------------------------------- TRAITEMENTS PHP Modification ---------------------------------//

if($_POST)
{
    debug($_POST);
   
    $stmt = $mysqli->query("SELECT * FROM user, booking, time_booked");
    $result = $stmt->fetch_assoc();



            // $_POST['mdp'] = md5($_POST['mdp']);
            foreach($_POST as $indice => $valeur)
            {
                $_POST[$indice] = htmlEntities(addSlashes($valeur));
            }

            $time_book = $_POST['time_book'];

            executeRequete("INSERT INTO booking (id_user, date_booking, time_booking, nbr_people) VALUES ('$_POST[id_user]', '$_POST[date]', '$time_book', '$_POST[guests]')");
            $contenu .= "<div class='validation'>Votre réservation pour le " .$_POST['date']. " à " .$time_book. " est confirmée!</div>";
            echo $contenu;    
            


        }

        $stmt = $mysqli->query("SELECT * FROM time_booked");
        $result = $stmt->fetch_assoc();

        $time_booking=$result['time_book'];

        echo ($time_booking);
    


?>


<form action=" " method="post">

<label for="name"></label>
  <input type="hidden" id="id_user" name="id_user" placeholder="id" value="<?php echo ($id) ?>"><br><br>

  <label for="name">Nom</label>
  <input type="text" id="name" name="name" placeholder="Entrez votre nom" value="<?php echo ($nom) ?>"><br><br>

  <label for="email">Email</label>
  <input type="email" id="email" name="email" placeholder="Entrez votre email" value="<?php echo ($email) ?>" required><br><br>

  <label for="phone">Numéro de téléphone</label>
  <input type="tel" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" value="<?php echo ($tel) ?>" required><br><br>

  <label for="date">Date</label>
  <input type="date" id="date" name="date" required><br><br>

  <label for="date">Heure</label>
  <div class="check">
 
  <?php
$result = $mysqli->query("SELECT time_book FROM time_booked");

while ($row = $result->fetch_array()) {
    echo '<input type="checkbox" name="time_book" value="'.$row['time_book'].'">'.$row['time_book'].'<br>';
}
?>
</div><br><br>
 
  <label for="guests">Nombre de personnes</label>
  <input type="number" id="guests" name="guests" min="1" max="10" required><br><br>

  <input type="submit" value="Réserver">
</form>



<?php

require_once("./footer.php");

?>