<?php


require_once("./init.inc.php");

header('dashbordAdmin.php');

//------------------------------ TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:login.php");

//--------------------------------- AFFICHAGE HTML ---------------------------------//


//debug($_POST);



if (isset($_POST['categorie'])) {
   $categorie = strtoupper($_POST['categorie']);

   // Insérer la nouvelle catégorie dans la table   
   $sql = "INSERT INTO categorie_recipe (categorie_recipe.name) VALUES ('$categorie')";
   $contenu .= "<div class='validation'>L'ajout de la catégorié " .$categorie. " est confirmée!</div>";
   echo $contenu; 
}

   if (mysqli_query($mysqli, $sql)) {

 echo '<script type="text/javascript">
             alert("La catégorie ' . $categorie . ' a été ajoutée avec succès !");
             window.close();
             window.opener.location.href = "dashbordAdmin.php";
         </script>';
   }

 
   ?>