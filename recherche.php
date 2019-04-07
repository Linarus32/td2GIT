<!DOCTYPE html>
<html>

<!-- d3 visualization -->

<head>

<title>recherche</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<link rel="stylesheet" href="css/v1-sarah.css" type="text/css" media="screen" />


<?php

if($_GET['prenom']!="") {
	rechercheP($_GET['prenom']);
}
else{
	// permet de ne pas montrer les mot de passe saisi dans la barre url et enregistre les précedent selectionné
	// echo "<meta http-equiv='refresh'; content='1;URL=nouveau.php?n=".$_GET['n']."&p=".$_GET['p']."&adr=".$_GET['adr']."&num=".$_GET['num']."&mail=".$_GET['mail']."'>";
	echo "<meta http-equiv='refresh' content='3;URL=accueil.php'>";
	echo "Saisir un prénom à rechercher";

}

?>


</head>


<body>

<?php



function rechercheP($prenom){
	
	include('bd.php'); //importation de ma feuille PHP bd.php
	$bdd = getBD(); //entrée dans la BD
	
	// requete pour trouver le prénom saisis : 
	
	$q='SELECT * FROM prenom WHERE "'.$prenom.'"=prenom.prenom';//meme requet sur ordi audrey et gaelle
	
	
	$rep = $bdd->query($q);
	
	// $res = $bdd->query('SELECT * FROM prenom WHERE "'.$prenom.'"=prenom.prenom');
	//SELECT prenom.idprenom FROM prenom WHERE "zoe"=prenom.prenom
	
	$ligne = $rep->fetch(); //on recupere la ligne
	
	
	if($ligne['prenom']!=""){ // Si le prenom existe dans la BD
		echo "</br> le prenom existe dans la BD";
		$id_prenom=$ligne['idprenom'];
		// sur ordi de audrey :
		// $id_prenom=$ligne['idPrenom'];
		echo "<meta http-equiv='refresh'; content='2;URL=pages/fichePrenom.php?id_prenom=".$id_prenom."'>"; 
	}
	else{
		echo "<meta http-equiv='refresh' content='2;URL=accueil.php'>";
		echo "</br> le prénom n'existe pas dans la BD";
		echo "</br> CE PRENOM N EXISTE PAS VEUILLEZ SAISIR UN AUTRE PRENOM";
	}

}


?>


<!-- retour accueil au cas ou -->
<a href="accueil.php">accueil </a>



</body>
</html>
