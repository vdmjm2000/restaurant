<?Php 

function executeRequete($req)
{
    global $mysqli;
    $resultat = $mysqli->query($req);
    if(!$resultat) // 
    {
        die("Erreur sur la requete sql.<br>Message : " . $mysqli->error . "<br>Code: " . $req);
    }
    return $resultat; // 
}

function executeRequete1($req)
{
    global $mysqli;
    $resultat1 = $mysqli->query($req);
    if(!$resultat1) // 
    {
        die("Erreur sur la requete sql.<br>Message : " . $mysqli->error . "<br>Code: " . $req);
    }
    return $resultat1; // 
}

function executeRequete2($req)
{
    global $mysqli;
    $resultat1 = $mysqli->query($req);
    if(!$resultat1) // 
    {
        die("Erreur sur la requete sql.<br>Message : " . $mysqli->error . "<br>Code: " . $req);
    }
    return $resultat1; // 
}



 //---- mode débug ----//


function debug($var, $mode = 1)
{
    echo '<div style="background: orange; padding: 5px; float: right; clear: both; ">';
    $trace = debug_backtrace();
    $trace = array_shift($trace);
    echo 'Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].';
    if($mode === 1)
    {
        echo '<pre>'; print_r($var); echo '</pre>';
    }
    else
    {
        echo '<pre>'; var_dump($var); echo '</pre>';
    }
    echo '</div>';
}

//------------------------------------
function internauteEstConnecte()
{ 
    if(!isset($_SESSION['user'])) return false;
    else return true;
}
//------------------------------------
function internauteEstConnecteEtEstAdmin()
{
    if(internauteEstConnecte() && $_SESSION['user']['admin'] == 1) return true;
    else return false;
}

//---------fonction pour avoir la date de jour-------///
function getCurrentDay() {
  return date("l");
}

 getCurrentDay();


 //------------ Focntion pour obtenir la categorie

 function getCategoriesFromDB() {
    $categories = array();
    $conn = mysqli_connect("localhost", "root", "", "restaurant");
    $query = "SELECT categorie_recipe.name, recipe.*
    FROM categorie_recipe
    INNER JOIN recipe ON categorie_recipe.id_categorie_recipe = recipe.id_categorie_recipe
    ORDER BY categorie_recipe.name";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $categories[] = $row;
    }
    mysqli_close($conn);
    return $categories;
  }


  
