<?php

//header("location:dashbordAdmin.php#recipe");


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


if (isset($_POST['list_category'],  $_POST['titre'], $_POST['description'], $_POST['prix'], $_FILES['image']['tmp_name'])) {
   $list_categorie = $_POST['list_category'];
   $titre = $_POST['titre'];
   $description = $_POST['description'];
   $prix = $_POST['prix'];
   $image = $_FILES['image'];
   $image_path = "../images/".basename($image['name']);

   // Créer la requête SQL pour récupérer l'ID correspondant au nom de la catégorie sélectionnée
   $sql = "SELECT id_categorie_recipe FROM categorie_recipe WHERE name = '$list_categorie'";

   // Exécuter la requête et récupérer le résultat
   $resultat = executeRequete($sql);

   // Vérifier si la requête a renvoyé au moins un résultat
   if (mysqli_num_rows($resultat) > 0) {
      // Récupérer la première ligne du tableau qui contient l'ID de la catégorie correspondante
      $id_categorie = $resultat->fetch_assoc()['id_categorie_recipe'];
   } else {
      // Si la requête n'a renvoyé aucun résultat, afficher un message d'erreur ou définir $id_categorie à une valeur par défaut
      $id_categorie = null; // ou afficher un message d'erreur
   }

   if (is_uploaded_file($image['tmp_name'])) {
      if (move_uploaded_file($image['tmp_name'], $image_path)) {
         // Connect to the database
         //$mysqli = new mysqli("localhost", "root", "", "restaurant");

         // Insert the image information into the database
         $nom_du_fichier = "images/".$_FILES['image']['name'];
         $sql = "INSERT INTO recipe (id_categorie_recipe, title, description, price, image) VALUES ('$id_categorie', '$titre', '$description', '$prix', '$nom_du_fichier')";

         if (mysqli_query($mysqli, $sql)) {
            echo "Image enregistrée dans la base de données avec succès.";
         } else {
            echo "Erreur lors de l'enregistrement de l'image dans la base de données.";
         }

         mysqli_close($mysqli);
      } else {
         echo "Erreur lors de la déplacement de l'image vers le répertoire de stockage.";
      }
   } else {
      echo "Erreur lors du téléchargement de l'image.";
   }
}

?>
