<?php
	//On récupère les variables : 
	$idRetour = $_POST['idRetour'];
	$dateRetour = $_POST['dateRetour'];
	$etatFinal = $_POST['etatFinal'];
	
	
	//On modifie les données sur la bdd : 
	// On se connecte à la bdd : 
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
		
		
		$req = 'update location set finemprunt = "'.$dateRetour.'", etatpost = "'.$etatFinal.'" where id = '.$idRetour;
		$bdd->exec($req);
		echo $req;
		// on redirige sur la page de connexion : 
		header('Location:../gestionRetours.php?m='.$idRetour);
 
	
?>