<?php

header("location:dashbordAdmin.php");


require_once("./init.inc.php");
require_once("./head.php");


//------------------------------ TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:login.php");

//--------------------------------- AFFICHAGE HTML ---------------------------------//


if($_POST)
{
    //debug($_POST);

    foreach($_POST as $indice => $valeur)
    {
        $_POST[$indice] = htmlEntities(addSlashes($valeur));
    }
    executeRequete("INSERT INTO time_table (day, open_timeLunch, close_timeLunch, open_timeDinner, close_timeDinner) VALUES ('$_POST[list_day]','$_POST[open_timelunch]', '$_POST[close_timelunch]', '$_POST[open_timedinner]', '$_POST[close_timedinner]')");

}


?>
