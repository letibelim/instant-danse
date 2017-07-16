<?php

error_reporting(E_ALL); // niveau de débuggage

// DECLARER MES VARIABLES POUR CHAQUE PROJET
// A CHANGER POUR CHAQUE PROJET

$GLOBALS['baseDB']= "instant-danse";
$GLOBALS['hostDB'] = "localhost";
$GLOBALS['userDB'] = "root";
$GLOBALS['passwordDB'] = "";
$GLOBALS['nomDomaine'] = "localhost/instant-danse";

//chargement des fonctions, classes
require_once("private/functions.php"); 
require_once("private/classes/model.php");
require_once("private/classes/class_user.php");
require_once("private/classes/MonMail.php");

$traitement = lireChamp("traitement"); // on lit le champ traitement

if ($traitement != "")
{
	require_once("private/controller/traitement-$traitement.php"); // on appelle le bon fichier
}

session_start();


?>

