<?php
require_once("./init.inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:login.php");

//--------------------------------- AFFICHAGE HTML ---------------------------------//



if (internauteEstConnecteEtEstAdmin()) {
    require_once("./headAdmin.php");
}
elseif (internauteEstConnecte()) {
    require_once("./head.php");
}



?>

<form action="reservation.php" method="post">
  <label for="name">Nom</label>
  <input type="text" id="name" name="name" placeholder="Entrez votre nom" required><br><br>

  <label for="email">Email</label>
  <input type="email" id="email" name="email" placeholder="Entrez votre email" required><br><br>

  <label for="phone">Numéro de téléphone</label>
  <input type="tel" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" required><br><br>

  <label for="date">Date</label>
  <input type="date" id="date" name="date" required><br><br>

  <label for="time">Heure</label>
  <input type="time" id="time" name="time" required><br><br>

  <label for="guests">Nombre de personnes</label>
  <input type="number" id="guests" name="guests" min="1" max="10" required><br><br>

  <input type="submit" value="Réserver">
</form>


<?php


echo $contenu;
require_once("./footer.php");

?>