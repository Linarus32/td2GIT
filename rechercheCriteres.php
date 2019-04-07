<!DOCTYPE html>
<html>

<head>

<title>recherche par critere</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<link rel="stylesheet" href="css/v1-sarah.css" type="text/css" media="screen" />


<?php

if( $_GET['popularite']!= "aucun" || $_GET['premLettre'] != "aucun" || $_GET['dernLettre'] != "aucun"  || $_GET['nombre'] != "aucun" || $_GET['origine'] != "aucun") {
	// echo "SUPER";
	// echo "</br>";
	// function appel:
	$q=rechercheCriteres( $_GET['popularite'], $_GET['premLettre'], $_GET['dernLettre'], $_GET['nombre'], $_GET['genre'], $_GET['origine']);
	echo $q;
	
	echo '<form method="get" action="pages/rechercheLeavan.php" autocomplete="on">'; 
	echo '<INPUT type="hidden" name="requete" value="'.$q.'">';
	echo '</form>';

	echo '<meta http-equiv="refresh" content="1;URL=pages/rechercheLeavan.php?requete='.$q.'">';
	
}
else{
	echo "<meta http-equiv='refresh' content='5;URL=accueil.php'>";
	echo "Selectionner au minimum un critere";
}

?>

</head>
<body>



<!--
<form method=POST action=rechercheLeavan.php>
   <input type="hidden" name="requete" value="OK"></input>
</form> -->


<?php 



function rechercheCriteres( $popularite, $premLettre, $dernLettre, $nombre, $genre, $origine){
	
	include('bd.php'); //importation de ma feuille PHP bd.php
	$bdd = getBD(); //entrée dans la BD
	
	// requete pour trouver le prénom saisis : 
	
	//requete sur orid de gaelle:
	$q="SELECT prenom.prenom, prenom.idprenom FROM `prenom` WHERE prenom.sexe=".$genre; //requete de base chaque prénom recherché va avoir obligatoirement un genre

	//Requete sur ordi audrey: 
	// $q="SELECT prenom.prenom, prenom.idPrenom FROM `prenom` WHERE prenom.genre=".$genre;
	
	
	
	
	if ( $nombre!= "aucun"){
		$q=$q." AND LENGTH(prenom.prenom)=".$nombre;
		// SELECT prenom.prenom FROM prenom WHERE  LENGTH(prenom.prenom)=5
	}
	elseif( $dernLettre!= "aucun"){
		$q=$q." AND prenom LIKE '%".$dernLettre."'";
		// SELECT prenom.prenom FROM prenom WHERE prenom LIKE "%a" 
	}
	elseif( $premLettre!= "aucun"){
		$q=$q." AND prenom LIKE '".$premLettre."%'";
		// SELECT prenom.prenom FROM prenom WHERE prenom LIKE "a%" 
	}
	elseif ( $origine!= "aucun"){ 
		// SELECT prenom.prenom FROM `prenom` WHERE prenom.sexe=2 AND prenom.prenom=(SELECT prenom.prenom FROM prenom,possede, origine WHERE prenom.idprenom=possede.idprenom AND possede.idorigine=origine.idorigine AND origine.origine="origine2")
		$q= $q." AND prenom.prenom=(SELECT prenom.prenom FROM prenom,possede, origine WHERE prenom.idprenom=possede.idprenom AND possede.idorigine=origine.idorigine AND origine.origine='".$origine."')";
	
		//Requete sur ordi audrey: 
		// $q= $q." AND prenom.prenom=(SELECT prenom.prenom FROM prenom,possede, origine WHERE prenom.idPrenom=possede.idPrenom AND possede.idOrigine=origine.idOrigine AND origine.origine='".$origine."')";
	
	}
	// elseif( $popularite!= "aucun"){ // attention testable que sur notre grosse BD
	// a faire pus tard 
	// }
	else{
		echo "<h1> PROBLEME </h1>";
	}
	
	

	// echo $q;
	return $q;
	
	// echo '<form method="get" action="pages/rechercheLeavan.php" autocomplete="on">'; 
	// $r='<INPUT type="hidden" name="requete" value='.$q.'>';
	// echo $r;
	// echo '</form>';
	
	// return $q;
	
	// $rep = $bdd->query($q);
	
	
	
	// $ligne = $rep->fetch();
	
	// if($ligne!=""){
		// echo "</br>";
		// echo $ligne['prenom'];	
		// echo "</br>";
		// $id_prenom=$ligne['idprenom']; //variable meme nom que cette pour faire le lien avce fiche prénom au cas ou
		// echo $id_prenom ;	//faire lien avec fiche recheche prenom de leavan
		// sur ordi de audrey :
		// $ligne['idPrenom'];
		
		
		
		// echo "<meta http-equiv='refresh'; content='2;URL=pages/rechercheLeavan.html>";
		
	// }
	// else{
		// echo "</br>";
		// echo "aucun prenom ne correspond a votre recherche";
		// echo "<meta http-equiv='refresh' content='5;URL=accueil.php'>";
	// }
	
}


?>








<!-- reour accueil au cas ou -->
<a href="accueil.php">accueil </a>



</body>
</html>
