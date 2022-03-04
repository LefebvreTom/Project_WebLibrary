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
		<title>BiBlioAgilo - Restauration</title>
		<link href="css/style.css" rel="stylesheet">
		<link rel="icon" href="img/favicon.ico" />

	</head>
	<body>
		<?php include 'header.php'; ?>
		
		<h1>Gestion des restaurations</h1>
		<h2>Livre necessitant une restauration (qualité 1 ou 2)</h2>
		</br>
		
		<table>
			<tr>
				<th>Livre</th>
				<th>Exemplaire</th>
				<th>Qualité</th>
			</tr>
			<?php
				
				// On se connecte à la bdd : 
				$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
				
				// On va lire dans une table : 
				$query = $bdd->query('SELECT exemplaire.id, idLivre, livre.titre, Qualite FROM exemplaire JOIN livre on idLivre = livre.id WHERE Qualite < 3'); //On va chercher les infos des livres
				
				while($donnees = $query->fetch()){
					echo '<tr>';
					echo '<td>'.$donnees[2].'</td>';
					echo '<td style="text-align:center;"> n°'.$donnees[0].'</td>';
					echo '<td style="text-align:center;">'.$donnees[3].' / 5 </td>';				
					echo '</tr>';
				}
				$query->closeCursor();

			?>
		</table>
		</br> </br> <hr> </br> </br>
			<h2>Modifier valeur de la qualité : </h2>
			<center>
			<?php
				if(isset($_GET['m'])){
					echo '<span class="success">L\'état de l\'examplaire numéro '.$_GET['m'].' a été modifié.</span></br></br>';
				}
		
			?>
			<form method="POST" action="script/scriptGestionRestauration.php">
				<label>Numéro de l'exemplaire : </label> </br>
				<select name="idExemplaire" style="text-align:center" required>
				<option disabled selected value> -- selectionnez le numéro de l'exemplaire -- </option>
				<?php
					// On se connecte à la bdd : 
					$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
				
					// On va lire dans une table : 
					$query = $bdd->query('select id from exemplaire where Qualite < 3'); //On va chercher les infos des livres
				
					while($donnees = $query->fetch()){

						echo '<option value="'.$donnees[0].'">Exemplaire n°'.$donnees[0].'</option>';

					}
					$query->closeCursor();
				?>
				</select>
				</br> </br> 
				<label>Nouvelle qualité : </label> </br>
				<select name="newQuality" required>
					<option disabled selected value> -- selectionnez la nouvelle qualité -- </option>
					<option value="1"> 1 </option>
					<option value="2"> 2 </option>
					<option value="3"> 3 </option>
					<option value="4"> 4 </option>
					<option value="5"> 5 </option>
				</select>
				</br> </br>
				<input type="submit" value="Modifier cette qualité"/>
			
			</form>
			</center>
	
			</br> </br> </br></br> </br> </br></br> </br> </br>
		
	</body>
</html>