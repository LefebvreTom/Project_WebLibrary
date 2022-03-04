<?php
	//On récupère les variables : 
	$email = $_POST['email'];
	$mdp = $_POST['password'];	
	
	// On se connecte à la bdd : 
				$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
				
				// On va lire dans une table : 
				$req = 'select * from client where email = "'.$email.'" and mdp ="'.$mdp.'"';
				$query = $bdd->query($req); 
				echo $req;
				$id=NULL;
				while($donnees = $query->fetch()){
					$id=$donnees[0];
					$nom = $donnees[1];
					$prenom = $donnees[2];
				}
				$query->closeCursor();
				
				if($id!=NULL){ //Le compte existe
					session_start();
					$_SESSION['id'] = $id;
					$_SESSION['nom'] = $nom;
					$_SESSION['prenom'] = $prenom;
					header('Location: ../index.php');
				}
				else{ //Le compte n'existe pas
					header('Location: ../connexion.php?m=1'); 
				}
	
?>