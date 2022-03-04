<?php
	session_start();
?>
<!DOCTYPE html>
<html lang='fr'>

	<head>
		<meta charset="utf-8" />
		<title>BiBlioAgilo - Inscription</title>
		<link href="css/style.css" rel="stylesheet">
		<link rel="icon" href="img/favicon.ico" />
	</head>
	<body>
	
		<?php include 'header.php'; ?>
		
		<center>
		<h1>
			Inscription
		</h1>
		<h2>Pour gérer vos emprunts</h2>
		<?php
			if(isset($_GET['m'])){
				if($_GET['m']==1){
					echo '<span class="erreur">Mots de passe différents.</span>';
				}
				if($_GET['m']==151487){
					echo '<span class="success">Vous vous êtes inscrit.</span>';
				}
			}
		
		?>
		<div id="Formulaire">
			<form action="script/scriptInscription.php" method="post">
				<div class="saisie">
					<br>
					<br>
					<label>Nom</label>
					<input type="text" id="nom" name="nom" required>
					<br>
					<br>

					
				</div>
				<div class="saisie">
					<label>Prénom</label>
					<input type="text" id="prenom" name="prenom" required>
					<br>
					<br>
	
					
				</div>
				<div class="saisie">
					<label>Date de Naissance</label>
					<input type="date" id="date" name="date_naissance" required>
					<br>
					<br>
					
				</div>
				<div class="saisie">
					<label>Numéro de téléphone</label>
					<input type="tel" id="tel" name="num_tel" required>
					<br>
					<br>

					
				</div>
				<div class="saisie">
					<label>Adresse Mail</label>
					<input type="email" id="email" name="email" multiple>
					<br>
					<br>
				</div>
				
				<div class="saisie">
					<label>Mot de passe</label>
					<input type="password" id="pass" name="password" minlenght="8" required>
					<br>
					<br>
				</div>
				<div class="saisie">
					<label>Confirmer Mot de passe</label>
					<input type="password" id="pass" name="password2" minlenght="8" required>
					<br>
					<br>

				</div>
				<div class="saisie">
					<label>Adresse (Rue et n°)</label>
					<input type="text" id="adresse" name="adresse" required>
					<br>
					<br>

				</div>
				<div class="saisie">
					<label>Code postal</label>
					<input type="number" id="cp" name="cp" minlenght="5" maxlenght='5' required>
					<br>
					<br>

				</div>
				<div class="saisie">
					<label>Ville</label>
					<input type="text" id="ville" name="ville" required>
					<br>
					<br>

				</div>
				<div class="confirmer">
					<input type="submit" value="S'inscrire">
				</div>
			</form>
		</div>
		</center>
	</body>
</html>