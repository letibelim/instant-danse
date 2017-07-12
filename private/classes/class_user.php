<?php

class UserTable extends Model
{
		function afficherUser()
	{
		$objetPDOStatement = $this->lireTable("user"); // je récupère le PDOStatement donné par lireTable
		
		$html=
<<<HTMLHEAD

<table>
	<thead>
			<td>Id</td>
			<td>Login</td>
			<td>Email</td>
			<td>Date d'inscription</td>
			<td>Level</td>
			<td>Détails</td>
			<td>Update</td>
			<td>Supprimer</td>
	</thead>
	<tbody>
	
HTMLHEAD;

	while ($ligne = $objetPDOStatement->fetch())
	{
		$id = htmlspecialchars($ligne['id']);
		$login = htmlspecialchars($ligne['login']);
		$email = htmlspecialchars($ligne['email']);
		$dateInscription = htmlspecialchars($ligne['dateInscription']);
		$level = htmlspecialchars($ligne['level']);
				
		$html .=
<<<HTMLLIGNE

<tr>
	<td>$id</td>
	<td>$login</td>
	<td>$email</td>
	<td>$dateInscription</td>
	<td>$level</td>
	<td><a href="details.php?idUser=$id">détails</a></td>
	<td><a href="update-user.php?id=$id">update</a></td>
	<td><a href="admin.php?id=$id&table=user&traitement=suppression-user">supprimer</a></td>
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

?>