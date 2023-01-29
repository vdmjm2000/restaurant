<?php



require_once("./init.inc.php");






//------------------------------ TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:login.php");

//--------------------------------- AFFICHAGE HTML ---------------------------------//


// Requête pour récupérer les données

$stmt = $mysqli->query("SELECT * FROM user");
$result = $stmt->fetch_assoc();

$id = $_SESSION['user']['id'];
$nom = $_SESSION['user']['nom'];
$email = $_SESSION['user']['email'];
$tel = $_SESSION['user']['tel'];


$guest=$_POST['guests'];


//--------------------------------- TRAITEMENTS PHP Modification ---------------------------------//

if($_POST)
{
    //debug($_POST);
   
    $stmt = $mysqli->query("SELECT * FROM user, booking, time_booked");
    $result = $stmt->fetch_assoc();

    $time_book = $_POST['time_book'];

    if (empty($time_book)) {
        echo 'a remplir';
    

    } else        

            // $_POST['mdp'] = md5($_POST['mdp']);
            foreach($_POST as $indice => $valeur)
            {
                $_POST[$indice] = htmlEntities(addSlashes($valeur));
            }

       

     

            executeRequete("INSERT INTO booking (id_user, date_booking, time_booking, nbr_people) VALUES ('$_POST[id_user]', '$_POST[date]', '$time_book', '$_POST[guests]')");
            $contenu .= "<div class='validation'>Votre réservation pour le " .$_POST['date']. " à " .$time_book. " est confirmée!</div>";
            echo $contenu;    
            


        }


    


?>


<form action="hour_select.php " method="post" id="form_booking">

<label for="name"></label>
  <input type="hidden"  id="id_user" name="id_user" placeholder="id" value="<?php echo ($id) ?>"><br><br>

  <label for="name">Nom</label>
  <input type="text" disabled="disabled" id="name" name="name" placeholder="Entrez votre nom" value="<?php echo ($nom) ?>"><br><br>

  <label for="email">Email</label>
  <input type="email" disabled="disabled" id="email" name="email" placeholder="Entrez votre email" value="<?php echo ($email) ?>" required><br><br>

  <label for="phone">Numéro de téléphone</label>
  <input type="tel" disabled="disabled" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" value="<?php echo ($tel) ?>" required><br><br>

  <label for="date">Date</label>
  <input type="date" id="date" name="date" required><br><br>


 
  <label for="guests">Nombre de personnes</label>
  <input type="number" id="guests" name="guests" min="1" max="10" value="<?php echo ($email) ?>" required><br><br>

</form>