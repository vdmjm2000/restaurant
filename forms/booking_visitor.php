
<?php

require_once("./init.inc.php");
require_once("./head.php");



?>
<br>
<br>
<form action="./hour_selectVisitor.php " method="post" id="form_booking">

<label for="name"></label>

  <label for="name">Nom</label>
  <input type="text"  id="name" name="name" placeholder="Entrez votre nom" value=""><br><br>

  <label for="email">Email</label>
  <input type="email" id="email" name="email" placeholder="Entrez votre email" value=" " required><br><br>

  <label for="phone">Numéro de téléphone</label>
  <input type="tel"  id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" required><br><br>

  <label for="date">Date :</label>
<input type="date" id="date" name="date" min="<?php echo date("Y-m-d"); ?>" required><br><br>


   
  <label for="guests">Nombre de personnes</label>
  <input type="number" id="guests" name="guests" min="1" max="10" required><br><br>

  <input type="submit" value="Trouver un créneau disponible">
</form>

<?php require_once('./footer.php');
?>

