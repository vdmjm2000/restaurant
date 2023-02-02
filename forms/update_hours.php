<?php

include 'init.inc.php';


//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if($_POST)
{
    // $contenu .=  "pseudo : " . $_POST['pseudo'] . "<br>mdp : " .  $_POST['mdp'] . "";
    $resultat = executeRequete("UPDATE time_table SET id_timeTable = $_POST[id_timeTable], open_timelunch =$_POST[open_timelunch],close_timelunch= $_POST[close_timelunch],open_timeDinner=$_POST[open_timeDinner],close_timeDinner = $_POST[close_timeDinner] ");
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
<?php include 'head.php'; ?>

<?php echo $contenu; ?>


 
<form class="form" method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br> <br>
         
    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp"><br><br>
 
     <input type="submit" class="btn btn-outline-info value="Se connecter">
</form>

<br>
<br>
<br>


<?php include 'footer.php';