<?php
	session_start();
?>
<!DOCTYPE html>
<html lang='fr'>

	<head>
		<meta charset="utf-8" />
		<title>Formulaire Connexion</title>
		<link href="css/style.css" rel="stylesheet">
		<link rel="icon" href="img/favicon.ico" />
	</head>
	<body>
		<?php include 'header.php'; ?>
		<center>
		<h1>
			Connexion
		</h1>
		<?php
			if(isset($_GET['m'])){
				if($_GET['m']==1){
					echo '<span class="erreur">Ce compte n\'existe pas.</span></br></br>';
				}
			}
		
		?>
		<div id="Formulaire">
			<form action="script/scriptConnexion.php" method="post">
				<div class="saisie">
					<br>
					<br>
					<label>Adresse Mail</label>
					<input type="text" id="email" name="email" multiple>
					<br>
					<br>
				</div>
		
				<div class="saisie">
					<label>Mot de passe</label>
					<input type="password" id="pass" name="password" required>
					<br>
					<br>
					<br>
					<br>
					
				</div>
				<div class="confirmer">
					<input type="submit" value="Se Connecter">
				</div>
			</form>
		</div>
		</center>
	</body>
</html>
	