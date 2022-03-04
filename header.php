<?php
	
	
	
	if(isset($_SESSION['id'])){
		if($_SESSION['id']!=11){
			echo '<div class="header-bandeau"> Bonjour '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</div>';
			echo '<div class="header"><a href="index.php">Accueil</a>   |
			<a href="catalogue.php">Catalogue</a> |
			<a href="mesEmprunts.php">Mes emprunts</a>
			<form action="script/scriptDeconnexion.php" method="POST"> <input type="submit" value="Déconnexion" class="btnDeconnexion"/> </form>
			<hr>';
		}
		else{ // id=11 donc admin
			echo '<div class="header-bandeau"> Bonjour '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</div>';
			echo '<div class="header"><a href="index.php">Accueil</a>   |
			<a href="catalogue.php">Catalogue</a> |
			<a href="gestionSorties.php">Gestion des sorties</a> |
			<a href="gestionRetours.php">Gestion des retours</a> |
			<a href="gestionRestauration.php">Gestion des restaurations</a> |
			<a href="historiqueLocation.php">Historique des locations</a> 
			<form action="script/scriptDeconnexion.php" method="POST"> <input type="submit" value="Déconnexion" class="btnDeconnexion"/> </form>
			<hr>';
		}
	}
	else{ // compte invité
		echo '<div class="header-bandeau"></div>';
		echo '<div class="header"><a href="index.php">Accueil</a>   |
			<a href="catalogue.php">Catalogue</a> |
			<a href="inscription.php">Inscription</a> |
			<a href="connexion.php">Connexion</a></div>
			<hr>';
	}
	
	
			
/*

			

*/

?>