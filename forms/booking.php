<?php

require_once("./init.inc.php");



//------------------------------ TRAITEMENTS PHP ---------------------------------//
if (!internauteEstConnecte()) header("location:login.php");


require_once("./head.php");


//connexion à la table 

$id = $_SESSION['user']['id'];

$stmt = $mysqli->query("SELECT * FROM user where id= $id");
$result = $stmt->fetch_assoc();


// Affectation de la valeur à un champ
$id = $result['id'];
$nom = $result['nom'];
$prenom = $result['prenom'];
$email = $result['email'];
$tel = $result['tel'];
$adresse = $result['adresse'];
$ville = $result['ville'];
$cp = $result['cp'];
$commentaire = $result['commentaire'];
$mdp = $result['mdp'];







?>

<div class="text-center">

  <form action="./hour_select.php " method="post" id="form_booking">

    <label for="name"></label>
    <input type="hidden" id="id_user" name="id_user" placeholder="id" value="<?php echo ($id) ?>"><br><br>

    <label for="name">Nom</label>
    <br>
    <input type="text" disabled="disabled" id="name" name="name" placeholder="Entrez votre nom" value="<?php echo ($nom) ?>"><br><br>

    <label for="email">Email</label>
    <br>
    <input type="email" disabled="disabled" id="email" name="email" placeholder="Entrez votre email" value="<?php echo ($email) ?>" required><br><br>

    <label for="phone">Numéro de téléphone</label>
    <br>
    <input type="tel" disabled="disabled" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" value="<?php echo ($tel) ?>" required><br><br>

    <label for="date">Date :</label>

    <input type="date" id="date" name="date" min="<?php echo date("Y-m-d"); ?>" required> &ensp; &ensp;



    <label for="guests">Nombre de personnes</label>

    <input type="number" id="guests" name="guests" min="1" max="10" required><br><br>

    <input type="submit" value="Trouver un créneau disponible">
  </form>
</div>

<?php require_once('./footer.php');
?>