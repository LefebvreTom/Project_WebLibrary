<?php
	session_start();
	
?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="UTF-8"/>
		<title>BiBlioAgilo - Catalogue</title>
		<link href="css/style.css" rel="stylesheet">
		<link rel="icon" href="img/favicon.ico" />
	</head>
	<body>
		<?php include 'header.php'; ?>
		<h1>Catalogue</h1>
		<h2>Evadez-vous grâce à notre bibliothèque !</h2>
		</br>
		<table>
			<tr>
				<th>Couverture</th>
				<th>Titre</th>
				<th>Genre</th>
				<th>Auteur</th>
				<th>Disponibilité</th>
			</tr>
			<?php
				
				// On se connecte à la bdd : 
				$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
				
				// On va lire dans une table : 
				$query = $bdd->query('SELECT * FROM livre'); //On va chercher les infos des livres
				
				while($donnees = $query->fetch()){
					if($donnees[4]>0){
						$dispo='<span class="success">Oui</span>';
					}
					else{
						$dispo='<span class="erreur">Non</span>';
					}
					echo '<tr>';
					echo '<td><center> <img src="img/couverture.png" style="width:100px"/></center> </td>';
					echo '<td>'.$donnees[1].'</td>';
					echo '<td>'.$donnees[2].'</td>';
					echo '<td>'.$donnees[3].'</td>';
					echo '<td style="text-align:center">'.$dispo.'</td>';
						
					echo '</tr>';
				}
				$query->closeCursor();

			?>
		</table>
	
			</br> </br> </br>
		
	</body>
</html>