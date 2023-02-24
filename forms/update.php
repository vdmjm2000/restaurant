<?php



require_once("./init.inc.php");

if(!internauteEstConnecte()) header("location:login.php");


require_once("./head.php");

if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] == $_GET['id']) {
    // L'utilisateur est autorisé à accéder à cette page
} else {
    session_destroy(); // détruire la session en cours
    header('login.php');
    echo 'Vous n avez pas les accés à cette page';

}


//--------------------------------- TRAITEMENTS PHP Modification ---------------------------------//

if($_POST)
{
    //debug($_POST);
   
    $stmt = $mysqli->query("SELECT * FROM user where id= $_GET[id]");
    $result = $stmt->fetch_assoc();

            // $_POST['mdp'] = md5($_POST['mdp']);
            foreach($_POST as $indice => $valeur)
            {
                $_POST[$indice] = htmlEntities(addSlashes($valeur));
            }
            executeRequete("UPDATE user SET civilite = '$_POST[civilite]', nom = '$_POST[nom]', prenom = '$_POST[prenom]', email = '$_POST[email]',tel = '$_POST[tel]', ville = '$_POST[ville]', cp = '$_POST[cp]', adresse = '$_POST[adresse]',  commentaire = '$_POST[commentaire]' WHERE id = '$_GET[id]'");
            $contenu .= "<div class='validation'>Les modifications ont été faites!</u></a></div>";
            echo $contenu; 


        }



        

// Requête pour récupérer les données

$stmt = $mysqli->query("SELECT * FROM user where id= $_GET[id]");
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
$pseudo = $result['pseudo'];
$mdp = $result['mdp'];
//var_dump($adresse);



?>



<div class="form">
    <form method="post" action="">

        <label for="civilite">Civilité</label><br>
        <input name="civilite" value="m" checked="" type="radio">Homme
        <input name="civilite" value="f" type="radio">Femme<br><br>

      <!----  <label for="nom">ID</label><br>
        <input type="text" id="id" name="id" placeholder="votre nom" value=" <?php echo ($id) ?>"> -->
        <br>
        <br>

        <label for="nom">Nom</label><br>
        <input type="text" id="nom" name="nom" placeholder="votre nom" value="<?php echo ($nom) ?>"><br><br>

        <label for="prenom">Prénom</label><br>
        <input type="text" id="prenom" name="prenom" placeholder="votre prénom" value="<?php echo ($prenom) ?>"><br><br>

        <label for="email">Email</label><br>
        <input type="e4mail" id="email" name="email" placeholder="exemple@gmail.com" value="<?php echo ($email) ?>"><br><br>

        <label for="email">Téléphone</label><br>
        <input type="e4mail" id="tel" name="tel" placeholder="Votre tel" value="<?php echo ($tel) ?>"><br><br>

        <label for="ville">Ville</label><br>
        <input type="text" id="ville" name="ville" placeholder="votre ville" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_." value="<?php echo ($ville) ?>"><br><br>

        <label for="cp">Code Postal</label><br>
        <input type="text" id="cp" name="cp" placeholder="code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9" value="<?php echo ($cp) ?>"><br><br>

        <label for="adresse">Adresse</label><br>
        <input type="text"  id="adresse" name="adresse" placeholder="votre adresse" pattern="[a-zA-Z0-9-_." title="caractères acceptés :  a-zA-Z0-9-_." value="<?php echo ($adresse) ?>"><br><br>

        <label for="commentaire=">Commentaires</label><br>
        <input type="text"  id="commentaire" name="commentaire" placeholder="commentaire" title="250 caractères max  :  a-zA-Z0-9-_." value="<?php echo ($commentaire) ?>"></textarea><br><br>

        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" disabled="disabled"  maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required" value="<?php echo ($pseudo) ?>"><br><br>

        <!---<label for="mdp">Mot de passe</label><br>
        <input type="password" id="mdp" name="mdp" required="required" value="<?php echo ($mdp) ?>"><br><br>-->

        <input type="submit" name="inscription" value="Modifier">
    </form>
</div>

<?php 
require_once("./footer.php");

?>