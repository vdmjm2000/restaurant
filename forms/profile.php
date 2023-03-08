<?php
require_once("./init.inc.php");
require_once("./head.php");



//------------------------------ TRAITEMENTS PHP ---------------------------------//
if (!internauteEstConnecte()) header("location:login.php");

//--------------------------------- AFFICHAGE HTML ---------------------------------//


//debug($_SESSION);
$id = $_SESSION['user']['id'];


$stmt = $mysqli->query("SELECT * FROM user, booking WHERE user.id = $id");
$result = $stmt->fetch_assoc();

$id = $_SESSION['user']['id'];

$contenu .= '<form action="update.php" method="get">';
//$contenu .= '<p class="centre">id <strong>' . $_SESSION['user']['id'] . '</strong></p>';
$contenu .= '<p class="centre">Bonjour <strong>' . $result['prenom'] . '</strong></p>';
$contenu .= '<div class="cadre"><h2> Voici vos informations </h2>';
$contenu .= 'votre email est: ' . $result['email'] . '<br>';
$contenu .= 'votre téléphone est: ' . $result['tel'] . '<br>';
$contenu .= 'votre ville est: ' . $result['ville'] . '<br>';
$contenu .= 'votre cp est: ' . $result['cp'] . '<br>';
$contenu .= 'Commentaires: ' . $result['commentaire'] . '<br>';
$contenu .= 'votre adresse est: ' . $result['adresse'] . '</p></div><br><br>';
$contenu .= '<form action="traitement.php" method="get">
<input type="hidden" name="id" value=' . $_SESSION['user']['id'] . '>
<input type="submit" value="Modifier">
</form>';


// Exécuter la requête SQL
$sql = "SELECT *, DATE_FORMAT(date_booking, '%d/%m') AS formatted_date_booking, DATE_FORMAT(time_booking, '%Hh%i') AS formatted_hour_booking FROM booking WHERE id_user = $id AND DATE(date_booking) >= CURDATE() ORDER BY date_booking ASC, time_booking ASC";
$resultat = executeRequete($sql);

    
echo $contenu;

echo '<br>';
echo '<br>';

echo 'Mes reservations';
//echo ($id);
echo '<br>';


// Vérifier si la requête a renvoyé des résultats
if ($resultat && $resultat->num_rows > 0) {
    // Boucler sur les résultats et les afficher
    while ($row = $resultat->fetch_assoc()) {
        echo 'Réservation le ' . $row['formatted_date_booking'] . ' à ' . $row['formatted_hour_booking'] . ' pour ' . $row['nbr_people'] . ' personnes<br>';
    }
} else {
    echo " Vous n'avez aucune réservation en cours. ";
}


echo '<br>';




require_once("./footer.php");
