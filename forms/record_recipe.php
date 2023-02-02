<?php

header("location:dashbordAdmin.php");


require_once("./init.inc.php");

//------------------------------ TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:login.php");

//--------------------------------- AFFICHAGE HTML ---------------------------------//

if (internauteEstConnecteEtEstAdmin()) {
    require_once("./headAdmin.php");
}
elseif (internauteEstConnecte()) {
    require_once("./head.php");
}

if($_POST)
{
    //debug($_POST);

    foreach($_POST as $indice => $valeur)
    {
        $_POST[$indice] = htmlEntities(addSlashes($valeur));
    }
    executeRequete("INSERT INTO recipe (title, description, price) VALUES ('$_POST[titre]', '$_POST[description]', '$_POST[prix]')");

}
?>
