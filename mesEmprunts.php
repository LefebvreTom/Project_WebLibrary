<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header('Location: index.php');
	}
?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>BiBlioAgilo - Mes Emprunts</title>
		<link href="css/style.css" rel="stylesheet">
		<link rel="icon" href="img/favicon.ico" />

	</head>
	<body>
		<?php include 'header.php'; ?>
		
		<h1>Mes emprunts</h1>
		<h2>Historique de vos emprunts chez BiblioAgilo !</h2>
		</br>
		
		<table>
			<tr>
				<th>Livre</th>
				<th>Date Emprunt</th>
				<th>Date Retour</th>
			</tr>
			<?php
				
				// On se connecte à la bdd : 
				$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
				
				// On va lire dans une table :
				$req = 'SELECT location.id, idLivre, livre.titre, idClient, client.nom, client.prenom, DebutEmprunt,FinEmprunt, EtatPre, EtatPost FROM LOCATION JOIN livre on livre.id =idlivre JOIN client on client.id = idClient where idClient = '.$_SESSION['id'];
				$query = $bdd->query($req); //On va chercher les infos des livres
				
				while($donnees = $query->fetch()){
					echo '<tr>';
					echo '<td>'.$donnees[2].'</td>';
					echo '<td>'.$donnees[6].'</td>';
					echo '<td>'.$donnees[7].'</td>';
						
					echo '</tr>';
				}
				$query->closeCursor();

			?>
		</table>
	
			</br> </br> </br>
		
	</body>
</html>