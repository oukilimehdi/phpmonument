<?php

	require_once("../../models/connexion.php");

	//function (voir ou chercher)---------------------------------------------------------------------------------------------------------

	function typeMonument_Find( $id ) {
	
		$vId = $id;
		
		// preparation de la requête sql 
		$reqSql = "select * from type_monument where ID_TYPE_Monument = :vId";

		//initialisation de $typemonumenttrouve
		$typemonumenttrouve = array();

		try{
			//établit la connexion à la bdd
			$cnx = connect_db();
			
			//préparation à l'exécution de la requete
			$stmt=$cnx->prepare($reqSql);
							
			// bind parameters
			$stmt->bindParam(':vId', $vId, PDO::PARAM_INT);
			
			//exécution
			$stmt->execute();
			$typemonumenttrouve = $stmt->fetch();
			
			//fermeture du curseur
			$stmt->closeCursor();

		} catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: PageErreur.php" );
		}
		
		//fermer la connexion
		$cnx = null;	
		return $typemonumenttrouve;
	}

    // function insert----------------------------------------------------------------------------------------------------------------

	function typeMonument_Insert( $libelle ) {
		
		// sécurisation des données
		$vLibelle = filter_var($libelle, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vTypeMonumentId = $id;

		// prepare requête sql 
		$reqSql = "insert into type_monument values (:vTypeMonumentId, :vLibelle)";

		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
							
			// bind parameters
			$stmt->bindParam(':vTypeMonumentId', $vTypeMonumentId, PDO::PARAM_INT);
			$stmt->bindParam(':vLibelle', $vLibelle, PDO::PARAM_STR);
			
			//exécution
			$stmt->execute();

			//fermeture du curseur
			$stmt->closeCursor();

			echo "Création réussie";
			
		} catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: PageErreur.php" );
		}
		
		//fermer la connexion
		$cnx = null;			
	}

	//function update (modifier	)---------------------------------------------------------------------------------------------------------

	function typeMonument_Update( $id, $libelle ) {
	

		$vTypeMonumentId = $id;

		// sécurisation des données
		$vLibelle = filter_var($libelle, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		// prepare requête sql 
		$reqSql = "update type_monument set Libelle_TYPE_Monument = :vLibelle " .
				  " where ID_TYPE_Monument = :vTypeMonumentId";


		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
							
			// bind parameters
			$stmt->bindParam(':vTypeMonumentId', $vTypeMonumentId, PDO::PARAM_INT);
			$stmt->bindParam(':vLibelle', $vLibelle, PDO::PARAM_STR);
			
			//exécution
			$stmt->execute();

			//fermeture du curseur
			$stmt->closeCursor();

		} catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: PageErreur.php" );
		}
		
		//fermer la connexion
		$cnx = null;		
	}
	
	//function delete (suprimer)-------------------------------------------------------------------------------------------

	function typeMonument_Delete( $id ) {

		$vTypeMonumentId = $id;

		// prepare requête sql 
		$reqSql = "delete from type_monument " .
				  " where ID_TYPE_Monument = :vTypeMonumentId";

		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
							
			// bind parameters
			$stmt->bindParam(':vTypeMonumentId', $vTypeMonumentId, PDO::PARAM_INT);
			
			//exécution
			$stmt->execute();

			//fermeture du curseur
			$stmt->closeCursor();

		} catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: PageErreur.php" );
		}
		
		//fermer la connexion
		$cnx = null;			
	}
	
	//function findall (trouver tout..)-------------------------------------------------------------------------------------------------------

	function typeMonument_findAll(){

		//preparation de la requete d'extraction de tous les enregistrements
		$reqSql = "select * from type_monument";

		//connexion  la base de données
		$cnx = connect_db();
	
		$listeTypeMonument = array();
		
		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
		
			//exécution
			$stmt->execute();
		
			$listeTypeMonument = $stmt->fetchAll();

			//fermeture du curseur
			$stmt->closeCursor();
		
		} catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: PageErreur.php" );
		}
	
		//fermer la connexion
		$cnx = null;	
		return $listeTypeMonument;

	}	
	
?>