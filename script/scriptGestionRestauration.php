<?php
	//On récupère les variables : 
	$idExemplaire = $_POST['idExemplaire'];
	$newQuality = $_POST['newQuality'];	
	
	//On modifie les données sur la bdd : 
	// On se connecte à la bdd : 
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
		
		
		$req = 'update exemplaire set qualite = "'.$newQuality.'" where id = '.$idExemplaire;
		$bdd->exec($req);
		echo $req;
		// on redirige sur la page de connexion : 
		header('Location:../gestionRestauration.php?m='.$idExemplaire);
 
	
?>