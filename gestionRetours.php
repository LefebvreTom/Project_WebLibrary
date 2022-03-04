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
		<title>BiBlioAgilo - Retours</title>
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
		
		<h1>Gestion des retours</h1>
		</br>
		<h2>Emprunts en cours : </h2>
		<table>
			<tr>
				<th>Numéro de l'emprunt</th>
				<th>Livre</th>
				<th>Client</th>
				<th>Date d'emprunt</th>
				<th>Etat avant l'emprunt</th>
			</tr>
			<?php
				
				// On se connecte à la bdd : 
				$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
				
				// On va lire dans une table : 
				$query = $bdd->query('SELECT location.id, idLivre, livre.titre, idClient, client.nom, client.prenom, DebutEmprunt,EtatPre FROM LOCATION JOIN livre on livre.id =idlivre JOIN client on client.id = idClient where finemprunt IS NULL'); //On va chercher les infos des locations
				
				while($donnees = $query->fetch()){
					echo '<tr>';
					echo '<td style="text-align:center">'.$donnees[0].'</td>'; // Id de la location
					echo '<td>'.$donnees[1].' - '.$donnees[2].'</td>'; // info du livre : id + titre
					echo '<td>'.$donnees[3].' - '.$donnees[4].' '.$donnees[5].'</td>'; // info du client : id + nom + prénom
					echo '<td>'.$donnees[6].'</td>'; // date d'emprunt
					echo '<td style="text-align:center">'.$donnees[7].' / 5</td>'; // état 
					echo '</tr>';
				}
				$query->closeCursor();

			?>
		</table>
		</br> </br>
		<h1>Enregistrer un retour :</h1>
		<center>
		<?php
			if(isset($_GET['m'])){
				echo '<span class="success">L\'emprunt numéro '.$_GET['m'].' a été retourné.</span></br></br>';
			}
		
		?>
		<form method="POST" action="script/scriptGestionRetours.php">
			<label>Numéro de l'emprunt : </label> </br> 
			<select name="idRetour" required>
				<option disabled selected value> -- selectionnez le numéro de l'emprunt -- </option>
				<?php
					// On se connecte à la bdd : 
					$bdd = new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8', 'root', '');
				
					// On va lire dans une table : 
					$query = $bdd->query('select id from location where finEmprunt IS NULL'); //On va chercher les infos des livres
				
					while($donnees = $query->fetch()){

						echo '<option value="'.$donnees[0].'">'.$donnees[0].'</option>';

					}
					$query->closeCursor();
				?>
			</select>
			</br> </br>
			<label>Date de retour</label> </br>
			<input type="date" name="dateRetour" required>
			</br> </br>
			<label>Etat du livre rendu: </label> </br> 
			Très abimé <input type="range" id="eLivre" class="rangeVolume" name="etatFinal" min="1" max="5" step="1" value="3" onchange="etatLivre()"/>Neuf
			<center><span id="affichEtat"></span></center>
			</br> </br>
			<input type="submit" value="Enregistrer un retour"/>
		</form>
		</center>

		</br></br></br></br></br></br></br></br>

	</body>
</html>