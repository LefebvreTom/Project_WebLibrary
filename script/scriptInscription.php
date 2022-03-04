<?php 
// SCRIPT INSCRIPTION.PHP

//On récupère les variables

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$ddn = $_POST['date_naissance'];
	$numTel = $_POST['num_tel'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$adresse = $_POST['adresse'];
	$cp = $_POST['cp'];
	$ville = $_POST['ville'];


// TEST MDP CONFORME : 

	if($password != $password2){
		header('Location: ../inscription.php?m=1');
	}
	else{
		// On se connecte à la bdd : 
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
		
		//On créé le nouvel utilisateur : 
		
		//Requete préparée
		$req = 'insert into client (nom, prenom, email, mdp, ddn, adresse, cp, ville, tel) values ("'.$nom.'", "'.$prenom.'", "'.$email.'","'.$password.'","'.$ddn.'","'.$adresse.'",'.$cp.',"'.$ville.'",'.$numTel.')';
		$bdd->exec($req);
		echo $req;
		// on redirige sur la page de connexion : 
		header('Location:../inscription.php?m=151487');
	}













?>
