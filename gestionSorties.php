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
		<title>BiBlioAgilo - Sorties</title>
		<link href="css/style.css" rel="stylesheet">
		<link rel="icon" href="img/favicon.ico" />
		<script>
			function etatLivre(){
				var e = document.getElementById("eLivre").value;
				if(e==1){
					document.getElementById("affichEtat").innerHTML = "Très abimé";
				}
				if(e==2){
					document.getElementById("affichEtat").innerHTML = "Abimé";
				}
				if(e==3){
					document.getElementById("affichEtat").innerHTML = "Etat moyen";
				}
				if(e==4){
					document.getElementById("affichEtat").innerHTML = "Bon état";
				}
				if(e==5){
					document.getElementById("affichEtat").innerHTML = "Neuf";
				}
			}
		</script>

	</head>
	<body>
		<?php include 'header.php'; ?>
		
		<h1>Gestion des sorties</h1>
		<center>
		<?php
			if(isset($_GET['m'])){
				if($_GET['m']==151487){
					echo '<span class="success">Emprunt enregistré.</span></br></br>';
				}
			}
		
		?>
		<form action="script/scriptGestionSortie.php" method="POST">
			<label>Livre emprunté : </label> </br>
			<select name="livreEmprunt" required>
				<option disabled selected value> -- selectionnez le livre -- </option>
				<?php
					// On se connecte à la bdd : 
					$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
				
					// On va lire dans une table : 
					$query = $bdd->query('SELECT * FROM livre'); //On va chercher les infos des livres
				
					while($donnees = $query->fetch()){

						echo '<option value="'.$donnees[0].'">'.$donnees[0].' - '.$donnees[1].'</option>';

					}
					$query->closeCursor();
				?>
			</select>
			</br> </br>
			<label>Client qui emprunte : </label> </br>
			<select name="clientEmprunt" required>
				<option disabled selected value> -- selectionnez le client -- </option>
				<?php
					// On se connecte à la bdd : 
					$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
				
					// On va lire dans une table : 
					$query = $bdd->query('SELECT * FROM client'); //On va chercher les infos des livres
				
					while($donnees = $query->fetch()){

						echo '<option value="'.$donnees[0].'">'.$donnees[0].' - '.$donnees[1].' '.$donnees[2].'</option>';

					}
					$query->closeCursor();
				?>
			</select>
			</br> </br>
			<label>Date d'emprunt</label> </br>
			<input type="date" name="dateEmprunt" required>
			</br> </br>
			<label>Etat du livre : </label> </br> 
			Très abimé <input type="range" id="eLivre" class="rangeVolume" name="etatInitial" min="1" max="5" step="1" value="3" onchange="etatLivre()"/>Neuf
			<center><span id="affichEtat"></span></center>
			</br> </br>
			<input type="submit" value="Enregistrer une sortie"/>
			
			
			
			
		</form>
		</center>
	</body>
</html>