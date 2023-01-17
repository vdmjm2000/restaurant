<?php
require_once("./init.inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:login.php");
// debug($_SESSION);
$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['user']['prenom'] . '</strong></p>';
$contenu .= '<div class="cadre"><h2> Voici vos informations </h2>';
$contenu .= '<p> votre email est: ' . $_SESSION['user']['email'] . '<br>';
$contenu .= 'votre ville est: ' . $_SESSION['user']['ville'] . '<br>';
$contenu .= 'votre cp est: ' . $_SESSION['user']['cp'] . '<br>';
$contenu .= 'votre adresse est: ' . $_SESSION['user']['adresse'] . '</p></div><br><br>';


//--------------------------------- AFFICHAGE HTML ---------------------------------//

if (internauteEstConnecteEtEstAdmin()) {
    require_once("./headAdmin.php");
}
elseif (internauteEstConnecte()) {
    require_once("./head.php");
}




echo $contenu;
require_once("./footer.php");