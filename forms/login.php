
<?php

require_once("./init.inc.php");

require_once("./head.php");



//--------------------------------- AFFICHAGE HTML ---------------------------------//


//debug($_SESSION);

//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if($_POST)
{
    // $contenu .=  "pseudo : " . $_POST['pseudo'] . "<br>mdp : " .  $_POST['mdp'] . "";
    $resultat = executeRequete("SELECT * FROM user WHERE pseudo='$_POST[pseudo]'");
    if($resultat->num_rows != 0)
    {
        // $contenu .=  '<div style="background:green">pseudo connu!</div>';
        $user = $resultat->fetch_assoc();
        if($user['mdp'] == $_POST['mdp'])
        {
            //$contenu .= '<div class="validation">mdp connu!</div>';
            foreach($user as $indice => $element)
            {
                if($indice != 'mdp')
                {
                    $_SESSION['user'][$indice] = $element;
                }
            }
            header("location:profile.php");
            return;

        }
        else
        {
            $contenu .= '<div class="erreur">Erreur de MDP</div>';
        }       
    }
    else
    {
        $contenu .= '<div class="erreur">Erreur de pseudo</div>';
    }
}

?>

<?php echo $contenu; ?>
<div class="text-center">

<a class="btn-book-a-table" href="./booking_visitor.php">Réserver une table sans se connecter</a>

</div>

<br> 
<form class="form" method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br> <br>
         
    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp"><br><br>
 
     <input type="submit" class="btn btn-outline-info" value="Se connecter">
</form>

<br>
<br>
<div class="form">
Vous n'avez toujours pas de compte ? Alors c'est par <a href="./register.php"> ici </a>
</div>
<br>


<?php include 'footer.php';