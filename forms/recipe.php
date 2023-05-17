<?php

if(isset($_GET['action']) && $_GET['action'] == "suppression")
{   //$contenu .= $_GET['id_produit'];
    $resultat5 = executeRequete("SELECT categorie_recipe.name, recipe.title, recipe.description, recipe.price
    FROM recipe, categorie_recipe 
    WHERE recipe.id_recipe = categorie_recipe.id_categorie_recipe");

    $produit_a_supprimer = $resultat5->fetch_assoc();
    //$chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $produit_a_supprimer['photo'];
    //if(!empty($produit_a_supprimer['photo']) && file_exists($chemin_photo_a_supprimer)) unlink($chemin_photo_a_supprimer);
    executeRequete("DELETE FROM recipe WHERE id_recipe=$_GET[id_recipe]");
    $contenu_plat .= '<div class="validation">Suppression du produit : ' . $_GET['id_recipe'] . '</div>';
   $_GET['action'] = '#recipe';

}

$resultat5 = executeRequete("SELECT recipe.id_recipe, categorie_recipe.name, recipe.title, recipe.description, recipe.price
FROM recipe, categorie_recipe 
WHERE recipe.id_categorie_recipe = categorie_recipe.id_categorie_recipe");

$contenu_plat .= '<h2> Affichage des plats </h2>';
$contenu_plat .= 'Nombre de plats : ' . $resultat5->num_rows;
$contenu_plat .= '<table class="table table-striped"p id="profile" border="1"><tr>';

while ($colonne = $resultat5->fetch_field()) {
  $contenu_plat .= '<th>' . $colonne->name . '</th>';
}

//$contenu .= '<th>Modification</th>';
$contenu_plat .= '<th>Supression</th>';
$contenu_plat .= '</tr>';

while ($ligne = $resultat5->fetch_assoc()) {
  $contenu_plat .= '<tr>';
  foreach ($ligne as $indice => $information) { {
      $contenu_plat .= '<td>' . $information . '</td>';
    }
  }
  // $contenu .= '<td><a href="?action=modification&id_produit=' . $ligne['id_booking'] .'"><img src="../photo/icone/edit.png"></a></td>';
  $contenu_plat .= '<td><a href="?action=suppression&id_recipe=' . $ligne['id_recipe'] .'");"><img src="../photo/icone/delete.png"></a></td>';
  $contenu_plat .= '</tr>';
}
$contenu_plat .= '</table><br><hr><br>';

echo $contenu_plat;

?>


