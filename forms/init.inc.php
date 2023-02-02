<?php
//--------- BDD
$mysqli = new mysqli("localhost", "root", "", "restaurant");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
// $mysqli->set_charset("utf8");
 
//--------- SESSION
session_start();

 
//--------- CHEMIN
//define("RACINE_SITE","/restaurant/");
 
//--------- VARIABLES
$contenu = '';
$contenu_footer = '';
$contenu_reservation = '';
$contenu_plat = '';
$contenu_heures = '';

 
//--------- AUTRES INCLUSIONS
require_once("fonction.inc.php");