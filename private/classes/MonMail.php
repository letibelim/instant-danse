<?php

/*Définition de la classe MonMail qui permet
notamment d'envoyer des mails*/

class MonMail
{

	function envoyerMail($destinataire, $sujet, $contenu)
	{
		echo "fonction envoyer email";
		$emailFrom = "contact@monsite.fr";

		$headers = "From: $emailFrom" . "\r\n" .
    		"Reply-To: $emailFrom" . "\r\n" .
    		"X-Mailer: PHP/" . phpversion();

	mail($destinataire, $sujet, $contenu, $headers);

	// Comme l'envoie de mail est impossible dsur XAMP ou ide.c9.io
	//On va stocker le ail dans la table MySQL Mail
	// TABLE Mail
	// id 					INT PRIMARY A_I
	// destinataire			VARCHAR(512)
	// sujet 				VARCHAR(255)
	// contenu 				TEXT
	// date 				DATETIME

	$dateEnvoi = date("Y-m-d H:i:s");

	// ON fait intervenir la classe Model
	$objetModel = new Model;
	$objetModel->insererLigne("Mail",
			[
			"destinataire"	=> $destinataire,
			"sujet"			=> $sujet,
			"contenu"		=> $contenu,
			"dateEnvoi"		=> $dateEnvoi
			]
		);
	}
}