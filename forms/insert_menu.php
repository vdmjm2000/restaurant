<?php 

include_once('init.inc.php');
include_once('./head.php');

//------------------------------ TRAITEMENTS PHP ---------------------------------//
if (!internauteEstConnecte()) header("location:login.php");
if (!internauteEstConnecteEtEstAdmin()) header("location:login.php");

// Récupération des données soumises par le formulaire
$name = $_POST['name'];
$recipe1 = $_POST['recipe1'];
$recipe2 = $_POST['recipe2'];
$recipe3 = $_POST['recipe3'];
$price = $_POST['price'];

// Insertion des données dans la base de données
$sql = "INSERT INTO menu (menu_name, recipe1, recipe2, recipe3, price)
        VALUES ('$name', '$recipe1', '$recipe2', '$recipe3', '$price')";

if (mysqli_query($mysqli, $sql)) {
    echo "Le menu a été enregistré avec succès.";
} else {
    echo "Erreur : " . mysqli_error($conn);
}

// Fermeture de la connexion à la base de données
mysqli_close($mysqli);
?>
