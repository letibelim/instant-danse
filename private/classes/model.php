<?php

// Class générique pour les fonctions génériques
class Model
{
	function connexionDB($baseDB="annonce", $hostDB="localhost", $userDB='root', $passwordDB='')
	/* se connecte à une base de donnée avec les paramètres optionnels
	correspondant au nom de la base, à l'utisateur et au mot
	de passe. Retourne un objet PDO*/
	{	

		$baseDB = $GLOBALS['baseDB'];
		$hostDB = $GLOBALS['hostDB'];
		$userDB = $GLOBALS['userDB'];
		$passwordDB = $GLOBALS['passwordDB'];

		/* Connexion à une base ODBC avec l'invocation de pilote */
		$dsn = "mysql:dbname=$baseDB;host=$hostDB;charset=utf8";
		$user = $userDB;
		$password = $passwordDB;

		// ATTENTION ! A CHANGER EN CAS DE MISE EN PROD !

		try {
		    $dbh = new PDO($dsn, $user, $password);
		} catch (PDOException $e) {
		    echo 'Connexion échouée : ' . $e->getMessage();
		}

		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		return $dbh;

	}

	function requeteSQL($requete, $tabValeurs)
	/*requete SQL se connecte à la base de donnée projet1 avec le user root
	et envoie la requête $requete, qui est une variable de type string*/
	{
		// On se connecte avec la méthode connexionDB et on crée un objet PDO:

		$objetPDO = $this->connexionDB();
		 

		 // on prepare notre requête en créant un objet PDOStatement
		// avec la methode prepare et avec la $requete

		$objetPDOStatement = $objetPDO->prepare($requete);

		// on realise notre requête avec la méthode execute de 
		// l'objet PDO Statement à qui on passe le tableau associatif.
		// il va de lui même comprendre qu'il faut rajouter les ":"
		// avant les valeurs dans les colonnes (!!!)

		$objetPDOStatement->execute($tabValeurs);

		// permet de récuperer un tableau associatif uniquement (et non 
		// un double tableau: asso et indexé)
		$objetPDOStatement->setFetchMode(PDO::FETCH_ASSOC);

		// Dans le cas d'une lecture, on fait un return de l'objet PDO Statement

		return $objetPDOStatement;

	}


	function insererLigne($nomtable, $tabValeurs)
	/* insère une ligne dans la table $nomtable
	avec les couples col=>val de $tabValeurs
	VERSION AVEC TOKEN -> plus sécurisé*/

	{
		$parenthese1 = "(id";
		$parenthese2 = "(NULL";

		foreach ($tabValeurs as $col => $val) {
			$parenthese1.= " ,$col";
			$parenthese2 .= " ,:$col";
		}

		$parenthese1.=")"; // on rajoute la parenthèse finale
		$parenthese2.=")";

	// On crée une requête avec des tokens:
		$requeteTokens =
<<<REQUETEAVECTOKENS
INSERT INTO $nomtable
$parenthese1
VALUE
$parenthese2
REQUETEAVECTOKENS;

	$this->requeteSQL($requeteTokens, $tabValeurs);


	}

	function lireTable($nomTable)
	/*Lit la table entière $nomTable
	retourne un objet PDOStatement*/
	{
		$requete = 
<<<REQUETEREAD
SELECT * FROM $nomTable
REQUETEREAD;
		
		return $this->requeteSQL($requete, []);

	}

	function trouverLigneChamp($table, $tabValeurs)
	/* retourne sous la forme d'un objet PDOStatement
	la ou les lignes de la $table
	dans lesquelles les valeurs des colonnes
	indiquées en clef du tableau associatif
	$tabValeurs [colonne => valeur] correspondent
	aux valeurs indiquées dans ledit tableau
	retourne un objet PDOStatement*/ 
	{
		$requete =
<<<REQUETE
SELECT * FROM $table
WHERE
REQUETE;

		foreach ($tabValeurs as $col => $valeur) {
			$requete.= " $col = :$col AND ";
		}

		$requete = substr($requete, 0, -5); // on enlève le AND final
		
		return $this->requeteSQL($requete, $tabValeurs); // on retourne un PDOStatement avec la méthode requeteSQL
	}


	function deleteLine($nomtable, $id)
	/* supprime la ligne ayant l'id $id
	dans la table $nomtable */
	{

		$requeteTokens =
<<<REQUETE
DELETE FROM $nomtable
WHERE id = $id
REQUETE;

	$this->requeteSQL($requeteTokens, []);

	}

	function deleteLineTabValeurs($nomtable, $tabValeurs)
	/* supprime la ligne dont les valeurs des colonnes correspondent à celles 
	du tableau asso $tabValeurs ATTENTION PAS VERIFIE !!*/

	{

		foreach ($tabValeurs as $col => $valeur) {
			$requete.= " $col = :$col AND ";
		}

		$tokens = substr($requete, 0, -5); // on enlève le AND final

		$requeteTokens =
<<<REQUETE
DELETE FROM $nomtable
WHERE$tokens
REQUETE;



		return $this->requeteSQL($requeteTokens, $tabValeurs); // on retourne un PDOStatement avec la méthode requeteSQL

	}

	function updateLine($nomtable, $id, $tabValeurs)
	{
	/*  méthode permettant de modifier la ligne de l'id $id dans la table
	$nomtable avec les valeurs de $tabValeurs (tableau asso qui
	donne les noms de colonnes à changer et les nouvelles valeurs*/ 
		$expression = "";
		foreach ($tabValeurs as $nomCol => $val) {
			$expression .= " $nomCol = :$nomCol,";
		}
		$expression = rtrim($expression, ',');
		$requeteTokens =
<<<REQUETE
UPDATE $nomtable
SET $expression
WHERE id = $id

REQUETE;
		echo $requeteTokens;

		$this->requeteSQL($requeteTokens, $tabValeurs);
	}


	function lireTableTri ($nomTable, $nomColonne, $tri)
	/*Méthode qui prend en paramètres le nol d'une table,
	le nom d'une colonne et un tri (ascendant ou descendant
	et qui rend */
    {
        $requeteSQL =
<<<CODESQL
SELECT * FROM $nomTable
ORDER BY $nomColonne $tri
CODESQL;

        // on récupère le PDO statement et on le retourne
        $objPDOStatement = $this->requeteSQL($requeteSQL, []);

        return $objPDOStatement;


    }

    function lireTableFiltre($nomTable, $nomColonne, $tri, $nomColonneCherche, $valeurCherchee)
	/*fonction qui renvoie un PDOStatement avec une requête sur une table, cherchant
	la valeurCherchee dans la colonne nomColonneCherche et qui trie selon $tri (ASC ou DESC)
	sur la colonne nomColonne*/

	{

		$requeteSQL =
<<<CODESQL
SELECT * FROM $nomTable
WHERE
$nomColonneCherche = :$nomColonneCherche
ORDER BY $nomColonne $tri
CODESQL;

		// ENVOYER La REQUETE SQL
		$objPDOStatement = $this->requeteSQL($requeteSQL,["$nomColonneCherche"=>$valeurCherchee]);

		return $objPDOStatement; 


	}

	function lireTableFiltreLimite($nomTable, $nomColonne, $tri, $nomColonneCherche, $valeurCherchee, $limite=100, $offset=0)
	/*Même fonction avec deux paramètres supplémentaires optionnelles :
	$limite, qui permet de limiter le nombre de ligne
	retournée et offset, pour décaler le départ de requête.
	Utile pour construire la pagination*/
	{


		$requeteSQL =
<<<CODESQL
SELECT * FROM $nomTable
WHERE
$nomColonneCherche = :$nomColonneCherche
ORDER BY $nomColonne $tri
LIMIT $limite
OFFSET $offset
CODESQL;

		// ENVOYER La REQUETE SQL
		$objPDOStatement = $this->requeteSQL($requeteSQL,["$nomColonneCherche"=>$valeurCherchee]);

		return $objPDOStatement; 


	}

	function lireInnerJoin($tab1, $tab2, $colTab1, $colTab2)
		/*retourne une table de jointure (sous la forme d'un objet PDOStatement)
		entre les $tab1 et $tab2 quand la valeur de la colonne $colTab1 == $colTab2*/
	{
			$requeteSQL =
<<<CODESQL
SELECT *
FROM $tab1
INNER JOIN $tab2 ON $tab1.$colTab1 = $tab2.$colTab2
CODESQL;

	// ENVOYER La REQUETE SQL
		$objPDOStatement = $this->requeteSQL($requeteSQL,[]);

		return $objPDOStatement; 

	}


	function lireInnerJoinTri($tab1, $tab2, $colTab1, $colTab2, $coltri, $tri)
		/*retourne une table de jointure (sous la forme d'un objet PDOStatement)
		entre les $tab1 et $tab2 quand la valeur de la colonne $colTab1 == $colTab2
		et trié par la colonne $coltri selon le sens $tri*/
	{
			$requeteSQL =
<<<CODESQL
SELECT *
FROM $tab1
INNER JOIN $tab2 ON $tab1.$colTab1 = $tab2.$colTab2
ORDER BY $coltri $tri
CODESQL;

	// ENVOYER La REQUETE SQL
		$objPDOStatement = $this->requeteSQL($requeteSQL,[]);

		return $objPDOStatement; 

	}

	function lireInnerJoinFiltreLimite($tab1, $tab2, $colTab1, $colTab2, $coltri, $tri, $nomColonneCherche, $valeurCherchee, $limite=100, $offset=0)
	/* *retourne une table de jointure (sous la forme d'un objet PDOStatement)
		entre les $tab1 et $tab2 quand la valeur de la colonne $colTab1 == $colTab,
		trié par la colonne $coltri selon le sens $tri,
		ou la colonne $nomColonneCherche == $valeurCherchee
		paramètres optionnels: limiter la recherche à un certain nombre de ligne
		(100 par défaut) et démarrant à $offset + 1 */
	{

			$requeteSQL =
<<<CODESQL
SELECT *
FROM $tab1
INNER JOIN $tab2 ON $tab1.$colTab1 = $tab2.$colTab2
WHERE
$nomColonneCherche = :$nomColonneCherche
ORDER BY $coltri $tri
LIMIT $limite
OFFSET $offset
CODESQL;

	// ENVOYER La REQUETE SQL
		$objPDOStatement = $this->requeteSQL($requeteSQL,["$nomColonneCherche"=>$valeurCherchee]);

		return $objPDOStatement;

	} 


}
