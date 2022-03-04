<?php
 // Gestion des sorties : 
 echo 'ty';
 
 // On récupère les variables : 
	$idLivre = $_POST['livreEmprunt'];
	$idClient = $_POST['clientEmprunt'];
	$dateEmprunt = $_POST['dateEmprunt'];
	$etat = $_POST['etatInitial'];

	//On envoit les données sur la bdd : 
	// On se connecte à la bdd : 
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
		
		
		$req = 'insert into location (idLivre, idClient, DebutEmprunt, EtatPre) values ('.$idLivre.', '.$idClient.', "'.$dateEmprunt.'","'.$etat.'")';
		$bdd->exec($req);
		echo $req;
		// on redirige sur la page de connexion : 
		header('Location:../gestionSorties.php?m=151487');
 
 
 
 
?>