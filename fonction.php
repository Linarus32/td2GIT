<?php 
function ConnexionMenu(){ //Fonction de la barre menu sur la page d'accueil
	
	session_start(); 


	if(isset($_SESSION['Client'])){ //la variable existe: le client est connecte
	// il veut un menu "mon compte" et un sous menu "deconnexion " et "panier" 
	
	echo "<li> Mon compte : ".$_SESSION['Client'][2];
		echo "<ul class='niveau2'>";
			echo "<li>";
				echo "<a href='pages/bibliotheque.php'>Ma bibliothèque </a>"; 
			echo "</li>";
			echo "<li>";
				echo "<a href='deconnexion.php'> Déconnexion </a>";
			echo "</li>";
		echo "</ul>";
	echo "</li>";
	
	}
	else{ //la variable est vide le client doit cree un compte ou se connecter
		echo "<li>";
		echo '<a href="pages/inscription.php">inscription/connexion</a>';
		echo '</li>';
			
}

}

function ConnexionMenuImageLogo(){//Fonction de la barre menu sur la page d'accueil
	
	session_start();


	if(isset($_SESSION['Client'])){ //la variable existe: le client est connecte
	//on veut pour les pap le signe bleu et pour les maman le signe rose. 
	$genreClient=$_SESSION['Client'][3];
	
		if($genreClient== "maman"){ //si le genre == maman
			echo '<a href="accueil.php"><img id="imagebandeau" src="images/titre1.1.PNG" height="120" alt="logo" /></a>';
		}
		else{ // si le genre == papa
			echo '<a href="accueil.php"><img id="imagebandeau" src="images/titre1.2.PNG" height="120" alt="logo" /></a>';
		}
	}
	else{ //la variable est vide le client doit cree un compte ou se connecter
		echo '<a href="accueil.php"><img id="imagebandeau" src="images/titre1.3.PNG" height="120" alt="logo" /></a>';
}
}


function ConnexionMenuRechercheCritere(){ //Fonction de la barre menu sur la page Résultat recherche Criteres
	
	session_start(); 


	if(isset($_SESSION['Client'])){ //la variable existe: le client est connecte
	// il veut un menu "mon compte" et un sous menu "deconnexion " et "panier" 
	
	echo "<li> Mon compte : ".$_SESSION['Client'][2];
		echo "<ul class='niveau2'>";
			echo "<li>";
				echo "<a href='bibliotheque.php'>Ma bibliothèque </a>"; 
			echo "</li>";
			echo "<li>";
				echo "<a href='../deconnexion.php'> Déconnexion </a>";
			echo "</li>";
		echo "</ul>";
	echo "</li>";
	
	}
	else{ //la variable est vide le client doit cree un compte ou se connecter
		echo "<li>";
		echo '<a href="inscription.php">inscription/connexion</a>';
		echo '</li>';
			
}

}

function ConnexionMenuImageLogoRechercheCritere(){//Fonction de la barre menu sur la page d'accueil
	
	session_start();


	if(isset($_SESSION['Client'])){ //la variable existe: le client est connecte
	//on veut pour les pap le signe bleu et pour les maman le signe rose. 
	$genreClient=$_SESSION['Client'][3];
	
		if($genreClient== "maman"){ //si le genre == maman
			echo '<a href="../accueil.php"><img id="imagebandeau" src="../images/titre1.1.PNG" height="120" alt="logo" /></a>';
		}
		else{ // si le genre == papa
			echo '<a href="../accueil.php"><img id="imagebandeau" src="../images/titre1.2.PNG" height="120" alt="logo" /></a>';
		}
	}
	else{ //la variable est vide le client doit cree un compte ou se connecter
		echo '<a href="../accueil.php"><img id="imagebandeau" src="../images/titre1.3.PNG" height="120" alt="logo" /></a>';
}
}
?>
