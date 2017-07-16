<?php

class Message extends Model
{
	function __construct($nom, $email,$message)
	{
		$this->nom 		= $nom;
		$this->email 	= $email;
		$this->message 	= $message;
	}

	function verifierEmail()
	{
		return verifierEmail($this->email);
	}


	function putInDB()
	{
		if ($this->nom != "" && $this->email != ""  && $this->message != "") // On vérifie que les champs sont bien rempli
		{	
			if ($this->verifierEmail()) // on vérifie si l'email est correct
			{
				$this->insererLigneToken("contact", ["nom"=> $this->nom, "email"=> $this->email, "message" => $this->message]);

			}

		}	
	}
}

class Newsletter extends Model
{
	function __construct($nom, $email)
	{
		$this->nom 		= $nom;
		$this->email 	= $email;

	}

	function verifierEmail()
	{
		return verifierEmail($this->email);
	}

	function checkform()
	{
		$is_Valid = true;
		if ($this->nom == "")
		{
			$GLOBALS["message-newsletter"] = "<p>Mettez votre nom !</p>";
			$is_Valid = false;
		}

		else if(!$this->verifierEmail())
		{
			$GLOBALS["message-newsletter"] = "<p>Veuillez rentrer un email valide</p>";
			$is_Valid = false;
		}

		return $is_Valid;

	}

	function putInDB()
	{

		if ($this->checkform())
		{
			
			$date = date("Y-m-d H:i:s"); // On récupère la date sous format 2017-06-22 09:51:22
			
			$ip =  $_SERVER["REMOTE_ADDR"]; // Fournit par Apache dans le tableau $_SERVER avec la clef "REMOTE_ADDR"
			
			$ligne = array
			(
				"nom" => $this->nom,
				"email" => $this->email,
				"date" => $date,
				"ip" => $ip

			 );

			$this->insererLigneToken("newsletter", $ligne);

			$GLOBALS["message-newsletter"] = "<p>Vous êtes inscrit à notre newsletter</p>";
		}
	}

	function afficherAbonnes()
	{
		$objetPDOStatement = $this->lireTable("newsletter"); // je récupère le PDOStatement donné par lireTable
		$objetPDOStatement->setFetchMode(PDO::FETCH_ASSOC);  // Permet d'avoir un simple tableau associatif


		$html=
<<<HTMLHEAD

<table>
	<thead>
		<td>Id</td>
		<td>Nom</td>
		<td>Email</td> 
		<td>Détails</td>
		<td>Modifier</td>
		<td>Supprimer</td>
	</thead>
	<tbody>
	
HTMLHEAD;

		while ($ligne = $objetPDOStatement->fetch()) // Je fais la boucle sur les lignes (fetch renvoie false quand il n'yen a plus)
		{
			$id = htmlspecialchars($ligne['id']); //htmlspecialchars "désactive" le language html en changeant certains caractère
			$nom = htmlspecialchars($ligne['nom']);
			$email = htmlspecialchars($ligne['email']);
			
			$html .=
<<<HTMLLIGNE

<tr>
	<td>$id</td>
	<td>$nom</td>
	<td>$email</td>
	<td><a href="details.php?id=$id">détails</a></td>
	<td><a href="update.php?id=$id">Modifier</a></td>
	<td><a href="delete.php?id=$id&table=newsletter">supprimer</a></td>
</tr>
HTMLLIGNE;
		}


		$html .=
<<<HTMLFOOT
</tbody>
</table>
HTMLFOOT;
	
		return $html;

	}

}

			

class Membre extends Model
{
	private $password;

	function __construct($pseudo,$email,$password)
	{
		$this->pseudo = $pseudo;
		$this->email = $email;
		$this->password = $password;
	}

	function verifierEmail()
	{
		return verifierEmail($this->email);
	}


	function checkform()
	{
		$is_Valid = true;

		if ($this->pseudo == "")
		{
			$GLOBALS["message-membership"] = "<p>Mettez votre nom !</p>";
			$is_Valid = false;
			
		}

		else if(!$this->verifierEmail())
		{
			$GLOBALS["message-membership"] = "<p>Veuillez rentrer un email valide</p>";
			$is_Valid = false;	
		}

		else if (mb_strlen($this->password)<6)
		{
			$GLOBALS["message-membership"] = "<p>Votre mot de passe doit faire au moins 6 caractères</p>";
			$is_Valid = false;
		}	

		return $is_Valid;

	}


	function putInDB()
	{

		if ($this->checkform())
		{
			$this->date = date("Y-m-d H:i:s"); // On récupère la date sous format 2017-06-22 09:51:22
			$this->ip =  $_SERVER["REMOTE_ADDR"];
			$ligne = array
			(
				"pseudo" => $this->pseudo,
				"email" => $this->email,
				"password" => $this->password,
				"date" => $this->date,
				"ip" => $this->ip
			 );

			$this->insererLigneToken("membres", $ligne);

			$GLOBALS["message-membership"] = "<p>Vous êtes inscrit dans notre communauté</p>";
		}
	}

	function afficherMembre()
	{
		$objetPDOStatement = $this->lireTable("membres"); // je récupère le PDOStatement donné par lireTable
		$objetPDOStatement->setFetchMode(PDO::FETCH_ASSOC);  // Permet d'avoir un simple tableau associatif


		$html=
<<<HTMLHEAD

<table>
	<thead>
			<td>id</td>
			<td>pseudo</td>
			<td>email</td>
			<td>date</td>
			<td>ip</td>
			<td>Détails</td>
			<td>Update</td>
			<td>Supprimer</td>
	</thead>
	<tbody>
	
HTMLHEAD;

	while ($ligne = $objetPDOStatement->fetch())
	{
		$id = htmlspecialchars($ligne['id']);
		$pseudo = htmlspecialchars($ligne['pseudo']);
		$email = htmlspecialchars($ligne['email']);
		$date = htmlspecialchars($ligne['date']);
		$ip = htmlspecialchars($ligne['ip']);
		
		$html .=
<<<HTMLLIGNE

<tr>
	<td>$id</td>
	<td>$pseudo</td>
	<td>$email</td>
	<td>$date</td>
	<td>$ip</td>
	<td><a href="details.php?id=$id">détails</a></td>
	<td><a href="update.php?id=$id">update</a></td>
	<td><a href="delete.php?id=$id&table=membres">supprimer</a></td>
</tr>
HTMLLIGNE;
	}


	$html .=
<<<HTMLFOOT
</tbody>
</table>
HTMLFOOT;
	
	return $html;

	}

	
}

