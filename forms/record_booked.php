<?php

require_once('./init.inc.php');

//------------------------------ TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:login.php");

//--------------------------------- AFFICHAGE HTML ---------------------------------//



if (internauteEstConnecteEtEstAdmin()) {
    require_once("./headAdmin.php");
}
elseif (internauteEstConnecte()) {
  require_once("./head.php");
}





//--------------------------------- TRAITEMENTS PHP Modification ---------------------------------//

if($_POST)
{
    debug($_POST);
   
    $stmt = $mysqli->query("SELECT * FROM user, booking, time_booked");
    $result = $stmt->fetch_assoc();



   // if (empty($time_book)) {
    //    echo 'a remplir';
    

    } else        

            // $_POST['mdp'] = md5($_POST['mdp']);
            foreach($_POST as $indice => $valeur)
            {
                $_POST[$indice] = htmlEntities(addSlashes($valeur));
            }
   

            executeRequete("INSERT INTO booking (id_user, date_booking, time_booking, nbr_people) VALUES ('$_POST[id_user]', '$_POST[date]', '$_POST[time_book]', '$_POST[guests] ,')");
            $contenu .= "<div class='validation'>Votre réservation pour le " .$_POST['date']. " à " .$_POST['time_book']. " est confirmée!</div>";
            echo $contenu;    


?>