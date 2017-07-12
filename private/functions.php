<?php

function lireChamp($champ)
/*Cette fonction regarde dans $_REQUEST si le champ
$champ existe et retourne sa valeur si c'est le cas,
un string vide dans le cas contraire. Elle enlève les tags
HTML pour éviter les attaques XSS*/
{
	$valeur = "";

	if (isset($_REQUEST["$champ"]))
	{	// Enlevons les espaces avant et après
		$valeur = trim($_REQUEST["$champ"]);
		// Enlevons les balises pour plus de sécurité avec strip_tags
		$valeur = strip_tags($valeur);

	}

	return $valeur;

}

function lireChampHTML($champ)
/*Cette fonction fait la même chose que LireChamp
mais autorise les balises html pour la mise en forme
A utiliser avec prudence !*/
{
	$valeur = "";

	if (isset($_REQUEST["$champ"]))
	{	// Enlevons les espaces avant et après
		$valeur = trim($_REQUEST["$champ"]);
		
	}

	return $valeur;

}

function afficherVarGlob($nomVar)
/*Affiche la variable globale $nmVar si
elle existe*/
{
	if (isset($GLOBALS["$nomVar"]))
	{
		echo $GLOBALS ["$nomVar"];
	}
}

function verifierEmail($email)
{
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}



function afficheDiaporama($lienDossier)
/*fonction qui prend en paramètre une chaîne de caractère
du lien vers un dossier d'images et qui affiche les images en
HTML*/
{
	$pattern = $lienDossier . "*.{gif,jpg,jpeg,png}";
	
	$listOfUrl = glob($pattern, GLOB_BRACE);
	
	$html = "";
	foreach ($listOfUrl as $url)
	{
		$html .=
<<<MONHTML
<figure><a href="#"><img src="$url" /></a></figure>
MONHTML;
	}

	echo $html;
}

function afficheDiaporamaProduits($lienDossier)
/*fonction qui prend en paramètre une chaîne de caractère
du lien vers un dossier d'images et qui affiche les images en
HTML, modifiée pour la section produits*/
{
	$pattern = $lienDossier . "*.{gif,jpg,jpeg,png}";
	
	$listOfUrl = glob($pattern, GLOB_BRACE);
	
	$html = "";
	foreach ($listOfUrl as $url)
	{
		$html .=
<<<MONHTML
<div><figure><img src="$url" /></figure></div>
MONHTML;
	}

	echo $html;

}


function lireSession($cle)
{
	$resultat ="";
	if (session_id() == "") // On vérifie si une session a déjà été démarrée
		session_start();  // Sinon, on la démarre

	if (isset($_SESSION["$cle"]))
		$resultat .= $_SESSION["$cle"];

	return $resultat ;
}

function ecrireSession($cle, $valeur)
{
	
	if (session_id() == "") // On vérifie si une session a déjà été démarrée
		session_start();  // Sinon, on la démarre

	$_SESSION["$cle"] = $valeur;
}

function dateToDateFR($aTimeStamp)
// pred un datetime sous la forme 23/06/2010
{
	return date("d/m/y", $aTimeStamp);
}