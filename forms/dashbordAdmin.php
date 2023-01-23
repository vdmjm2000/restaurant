<?php 

include_once('init.inc.php');

if (internauteEstConnecteEtEstAdmin()) {
    require_once("headAdmin.php");
    require_once("dashbordAdmin.php");
}
elseif (internauteEstConnecte()) {
    require_once("login.php");
}

else {
    $contenu .= '<div class="erreur">Veuillez vous connecter <a href ="./login.php">ici</a> pour acceder à cette page</div> ' ;
    echo $contenu;
}

$resultat = executeRequete("SELECT user.nom,user.adresse, user.commentaire, booking.date, booking.time FROM user JOIN booking ON user.id = booking.id_user;");
     
$contenu .= '<h2> Affichage des reservations </h2>';
$contenu .= 'Nombre de reservation : ' . $resultat->num_rows;
$contenu .= '<table class="table table-striped" border="1"><tr>';
 
while($colonne = $resultat->fetch_field())
{    
    $contenu .= '<th>' . $colonne->name . '</th>';
}

//$contenu .= '<th>Modification</th>';
//$contenu .= '<th>Supression</th>';
$contenu .= '</tr>';

while ($ligne = $resultat->fetch_assoc())
{
    $contenu .= '<tr>';
    foreach ($ligne as $indice => $information)
    {
 
        {
            $contenu .= '<td>' . $information . '</td>';
        }
    }
   // $contenu .= '<td><a href="?action=modification&id_produit=' . $ligne['id_booking'] .'"><img src="../photo/icone/edit.png"></a></td>';
   // $contenu .= '<td><a href="?action=suppression&id_produit=' . $ligne['id_booking'] .'" OnClick="return(confirm(\'En êtes vous certain ?\'));"><img src="../photo/icone/delete.png"></a></td>';
    $contenu .= '</tr>';
}
$contenu .= '</table><br><hr><br>';

echo $contenu;

?>



<?php
//include_once('footer.php');


?>