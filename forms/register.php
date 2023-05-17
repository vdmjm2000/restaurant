
<?php

include 'init.inc.php';

include 'head.php';


//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if($_POST)
{
    //debug($_POST);
    $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['mdp']); 
    if(!$verif_caractere && (strlen($_POST['mdp']) < 1 || strlen($_POST['mdp']) > 20) ) // 
    {
        $contenu .= "<div class='erreur'>Le mot de passe doit contenir entre 1 et 20 caractères. <br> Caractère accepté : Lettre de A à Z et chiffre de 0 à 9</div>";
        echo $contenu;
    }  
        else
    {
        $user = executeRequete("SELECT * FROM user WHERE email='$_POST[email]'");
        if($user->num_rows > 0)
        {
            $contenu .= "<div class='erreur'>E-mail déjà existant. Veuillez en choisir un autre svp.</div>";
            echo $contenu;
        }
        else
        {
            // $_POST['mdp'] = md5($_POST['mdp']);
            foreach($_POST as $indice => $valeur)
            {
                $_POST[$indice] = htmlEntities(addSlashes($valeur));
            }
            executeRequete("INSERT INTO user (civilite,nom, prenom, email,ville,cp,adresse,commentaire,mdp) VALUES ('$_POST[civilite]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[ville]','$_POST[cp]', '$_POST[adresse]', '$_POST[commentaire]','$_POST[mdp]')");
            $contenu .= "<div>Vous êtes inscrit à notre site web. <a href=\"login.php\"><u>Cliquez ici pour vous connecter</u></a></div>";
            echo $contenu;       

        }
    }
}

?>

<br>
<br>
<br>
<div class="form">
Vous possédez déjà un compte ? <a href="./login.php">c'est par ici chef </a>
</div>
<br>

 <div class="form register">
<form method="post" action="">

    <label for="civilite">Civilité</label><br>
    <input name="civilite" value="m" checked="" type="radio">Homme
    <input name="civilite" value="f" type="radio">Femme<br><br>
          
    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" placeholder="votre nom"><br><br>
          
    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" placeholder="votre prénom"><br><br>
  
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com"><br><br>          
 
                  
    <label for="ville">Ville</label><br>
    <input type="text" id="ville" name="ville" placeholder="votre ville" pattern="[a-zA-Z0-9-_.]{1,15}" title="caractères acceptés : a-zA-Z0-9-_."><br><br>
          
    <label for="cp">Code Postal</label><br>
    <input type="text" id="cp" name="cp" placeholder="code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"><br><br>
          
    <label for="adresse">Adresse</label><br>
    <textarea id="adresse" name="adresse" placeholder="votre adresse" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."></textarea><br><br>

    <label for="commentaire=">Veuillez lister vos éventuelles allergies</label><br>
    <textarea type="textarea id="adresse" name="commentaire" placeholder="commentaire" title="250 caractères max  :  a-zA-Z0-9-_."></textarea><br><br>
          
    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" required="required"><br><br>
 
    <input type="submit" name="inscription" value="S'inscrire">
</form>
</div>
 

<?php include 'footer.php';