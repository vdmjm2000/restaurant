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

//debug($_SESSION);








$stmt = $mysqli->query("SELECT * FROM user, booking");
$result = $stmt->fetch_assoc();

$id = $_SESSION['user']['id'];

$contenu .= '<form action="update.php" method="get">';
$contenu .= '<p class="centre">id <strong>' . $_SESSION['user']['id'] . '</strong></p>';
$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['user']['prenom'] . '</strong></p>';
$contenu .= '<div class="cadre"><h2> Voici vos informations </h2>';
$contenu .= '<p> votre email est: ' . $_SESSION['user']['email'] . '<br>';
$contenu .= 'votre ville est: ' . $_SESSION['user']['ville'] . '<br>';
$contenu .= 'votre cp est: ' . $_SESSION['user']['cp'] . '<br>';
$contenu .= 'Commentaires: ' . $_SESSION['user']['commentaire'] . '<br>';
$contenu .= 'votre adresse est: ' . $_SESSION['user']['adresse'] . '</p></div><br><br>';
$contenu .= '<form action="traitement.php" method="get">
<input type="hidden" name="id" value=' . $_SESSION['user']['id'] . '>
<input type="submit" value="Modifier">
</form>';


$stmt = $mysqli->query("SELECT *, DATE_FORMAT('date_booking', '%d/%m')  FROM booking WHERE id_user= $id ORDER BY date_booking ASC , date_booking > NOW()");
$result = $stmt->fetch_assoc();

$date_booking = $result['date_booking'];
$time_booking = $result['time_booking'];


//--------------------------------- AFFICHAGE HTML ---------------------------------//


if (internauteEstConnecteEtEstAdmin()) {
    require_once("./headAdmin.php");
}
elseif (internauteEstConnecte()) {
    require_once("./head.php");
}


echo $contenu;

echo '<br>';
echo '<br>';

 echo 'Mes reservations';
 echo '<br>';

echo ($id);

echo '<br>';
echo 'Ma prochaine réservation est le '.$date_booking.' à '.$time_booking;


require_once("./footer.php");