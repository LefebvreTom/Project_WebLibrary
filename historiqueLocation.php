<?php
	session_start();
	if($_SESSION['id']!=11){
		header('Location: index.php');
	}
	
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
		
		<h1>Historique des locations</h1>
		<h2>Seules les locations finies sont répertoriées</h2>
		</br>
		
		<table>
			<tr>
				<th>Ecart d'état</th>
				<th>0</th>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
			</tr>
			<tr>
				<td>Couleur</td>
				<td style="background-color:#358cd4;"></td>
				<td style="background-color:#4be354;"></td>
				<td style="background-color:#edbb26"></td>
				<td style="background-color:#ed4a26;"></td>
				<td style="background-color:#000000;"></td>
			</tr>
		<table>
			</br> </br>
		<table>
			<tr>
				<th>Location n°</th>
				<th>Livre</th>
				<th>Client</th>
				<th>Date Emprunt</th>
				<th>Date Retour</th>
				<th>Etat Pré-emprunt</th>
				<th>Etat Post-emprunt</th>
			</tr>
			<?php
				
				// On se connecte à la bdd : 
				$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
				
				// On va lire dans une table : 
				$query = $bdd->query('SELECT location.id, idLivre, livre.titre, idClient, client.nom, client.prenom, DebutEmprunt,FinEmprunt, EtatPre, EtatPost FROM LOCATION JOIN livre on livre.id =idlivre JOIN client on client.id = idClient where EtatPre IS NOT NULL AND EtatPost IS NOT NULL ORDER BY location.id ASC'); //On va chercher les infos des locations
				
				while($donnees = $query->fetch()){
					$ecart = $donnees[8]-$donnees[9];
					echo '<tr>';
					echo '<td>'.$donnees[0].'</td>';
					echo '<td>'.$donnees[1].' - '.$donnees[2].'</td>';
					echo '<td>'.$donnees[3].' - '.$donnees[4].' '.$donnees[5].'</td>';
					echo '<td>'.$donnees[6].'</td>';
					echo '<td>'.$donnees[7].'</td>';
					//gestion écart : 
					if($ecart==0){
						echo '<td style="background-color:#358cd4;text-align:center;">'.$donnees[8].'</td>';
						echo '<td style="background-color:#358cd4;text-align:center;">'.$donnees[9].'</td>';
					}
					if($ecart==1){
						echo '<td style="background-color:#4be354;text-align:center;">'.$donnees[8].'</td>';
						echo '<td style="background-color:#4be354;text-align:center;">'.$donnees[9].'</td>';
					}
					if($ecart==2){
						echo '<td style="background-color:#edbb26;text-align:center;">'.$donnees[8].'</td>';
						echo '<td style="background-color:#edbb26;text-align:center;">'.$donnees[9].'</td>';
					}
					if($ecart==3){
						echo '<td style="background-color:#ed4a26;text-align:center;">'.$donnees[8].'</td>';
						echo '<td style="background-color:#ed4a26;text-align:center;">'.$donnees[9].'</td>';
					}
					if($ecart==4){
						echo '<td style="background-color:#000000;color:#ffffff;text-align:center;">'.$donnees[8].'</td>';
						echo '<td style="background-color:#000000;color:#ffffff;text-align:center;">'.$donnees[9].'</td>';
					}
					


					
					echo '</tr>';
				}
				$query->closeCursor();

			?>
		</table>
	
			</br> </br> </br>
		
	</body>
</html>