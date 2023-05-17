
<?php

require_once("./init.inc.php");

require_once("./head.php");



//--------------------------------- AFFICHAGE HTML ---------------------------------//


//debug($_SESSION);

//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if($_POST)
{
     $contenu .=  "email : " . $_POST['email'] . "<br>mdp : " .  $_POST['mdp'] . "";
    $resultat = executeRequete("SELECT * FROM user WHERE email='$_POST[email]'");
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
        $contenu .= '<div class="erreur">Erreur d\'e-mail</div>';
    }
}

?>

<?php echo $contenu; ?>
<div class="text-center">

<a class="btn-book-a-table" href="./booking_visitor.php">Réserver une table sans se connecter</a>

</div>

<br> 
<div class="login">
<form class="form" method="post" action="">
    <label for="pseudo">E-mail</label><br>
    <input type="email" name="email" placeholder="Adresse e-mail" required>
    <br>
    <br>         
    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" placeholder="Mot de passe"><br><br>
 
     <input type="submit" id="submit_login" value="Se connecter">
</form>
</div>
<br>
<br>
<div class="form">
Vous n'avez toujours pas de compte ? Alors c'est par <a href="./register.php"> ici </a>
</div>
<br>


<?php include 'footer.php';