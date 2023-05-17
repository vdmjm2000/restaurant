<?php

if(isset($_GET['action']) && $_GET['action'] == "suppression")
{
    $resultat6 = executeRequete("SELECT * from menu");

    $produit_a_supprimer = $resultat6->fetch_assoc();
    executeRequete("DELETE FROM menu WHERE id= $_GET[id]");
    $contenu_menu .= '<div class="validation">Suppression du produit : ' . $_GET['id'] . '</div>';
    $_GET['action'] = '#menu';

}

$resultat6 = executeRequete("SELECT * FROM menu");

$contenu_menu .= '<h2> Affichage des menus </h2>';
$contenu_menu .= 'Nombre de menus : ' . $resultat6->num_rows;
$contenu_menu .= '<table class="table table-striped" id="profile" border="1"><tr>';

while ($colonne = $resultat6->fetch_field()) {
    $contenu_menu .= '<th>' . $colonne->name . '</th>';
}

$contenu_menu .= '<th>Suppression</th>';
$contenu_menu .= '</tr>';

while ($ligne = $resultat6->fetch_assoc()) {
    $contenu_menu .= '<tr>';
    foreach ($ligne as $indice => $information) {
        $contenu_menu .= '<td>' . $information . '</td>';
    }
    $contenu_menu .= '<td><a href="?action=suppression&id=' . $ligne['id'] . '"><img src="../images/poubelle.gif"></a></td>';
    $contenu_menu .= '</tr>';
}
$contenu_menu .= '</table><br><hr><br>';

echo $contenu_menu;

?>
