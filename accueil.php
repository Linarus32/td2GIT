<!DOCTYPE html>
<html>

<head>
<title>Le prenom parfait </title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<link rel="stylesheet" href="css/v1-sarah.css" type="text/css" media="screen" />
<?php
include('fonction.php');
?>
</head>

<!-- $_SESSION['Client'] -->

<body>

<div class="hautDePage">

<!-- bandeau avec logo et titre MODIFIER LES LIEN RELATIF POUR NEW PAGES-->

<div id="bandeau">
	<a id="logo" href="accueil.php"><img id="imagebandeau" src="images/bandeau.jpg" height="180px" alt="logo" /></a> <!-- le logo et clicable et renvois sur la page d'accueil-->
	
	<div class="titreSite">
	<?php ConnexionMenuImageLogo(); ?>
	</div>
	
	<!-- <div class="menuBandeau"> -->
	<ul class="menu">
		<li>
			<a href="accueil.php">Acceuil </a>
		</li>
		<li>
			<a href="pages/bibliotheque.html">Autre onglet </a>
		</li>
		<?php ConnexionMenu(); ?>
	</ul>
	<!-- </div> -->
	
</div>

</div>


<!-- Contenu de la page Accueil -->

<div class="contenuPage"> <!-- tout le contenu de la page -->

<!-- recherche par prénom -->

<h2 class="rech2" id="preniereRechercheTitre">Tout savoir sur un prénom</h2>

<table id="rech1">
	<tr>
	<form method="get" action="recherche.php" autocomplete="on">
	<!-- ici PHP -->
		<td><input type="text" name="prenom" value="saisir un prenom"></td>
		<td><input type="submit" value="Rechercher"></td>
	</form>
	</tr>
</table>



<!-- recherche prénom par critère -->



<div class="partage">

<h2 class="rech2" >Recherche avec critères</h2>

<form method="get" action="rechercheCriteres.php" autocomplete="on">

	<div class="dim" id="profilSarah">
		<table class="parametreTabSarah">
		
		<tr>
			<td> Popularité</td>
			<td> 
			<SELECT name="popularite">
			<OPTION VALUE='aucun'>aucun</OPTION>
			<OPTION VALUE="0,1">10%</OPTION>
			<OPTION VALUE="0,2">20%</OPTION>
			<OPTION VALUE="0,3">30%</OPTION>
			<OPTION VALUE="0,4">40%</OPTION>
			<OPTION VALUE="0,5">50%</OPTION>
			<OPTION VALUE="0,6">60%</OPTION>
			<OPTION VALUE="0,7">70%</OPTION>
			<OPTION VALUE="0,8">80%</OPTION>
			<OPTION VALUE="0,9">90%</OPTION>
			<OPTION VALUE="">100%</OPTION>
			</SELECT>
			</td>
		</tr>
		<tr>
			<td>Première lettre</td>
			<!-- <td><INPUT type="text" name="premLettre" value=""></td> -->
			<td> 
			<SELECT name="premLettre">
			<OPTION VALUE='aucun'>aucun</OPTION>
			<?php foreach(range('a', 'z') as $letter) { 
			echo '<option>'.$letter.'</option>'; 
			} ?>
			</SELECT>
			</td>
		</tr>
		<tr>
			<td>Dernière lettre</td>
			<td> 
			<SELECT name="dernLettre">
			<OPTION VALUE='aucun'>aucun</OPTION>
			<?php foreach(range('a', 'z') as $letter) { 
			echo '<option>'.$letter.'</option>'; 
			} ?>
			</SELECT>
			</td>
		</tr>
		
		<tr>
			<td>Nombres lettre</td>
			<!-- <td><INPUT type="number" name="nb" value=""></td> -->
			<td> 
			<SELECT name="nombre">
			<OPTION VALUE='aucun'>aucun</OPTION>
			<?php foreach(range(1, 30) as $nb) { 
			echo '<option>'.$nb.'</option>'; 
			} ?>
			</SELECT>
			</td>
		</tr>
		</table>
		


	</div>
	
	<div class="dim" id="ami">
		<table class="parametreTabSarah">
		<tr>
		<!-- PHP recherche des origines  -->
			<td> Origine </td>
			<td>
			<SELECT name="origine">
			
			<?php
			include('bd.php'); //importation de ma feuille PHP bd.php
			$bdd = getBD(); //entrée dans la BD
			echo "<OPTION VALUE='aucun'>aucun</OPTION>";
	
			// requete pour retourner toutes les origines possible  : 
			// select origine.origine from origine
			$f='SELECT origine.origine FROM origine';
			$rep = $bdd->query($f);
			// $i=0;
			while($articles = $rep->fetch()) {
			$org=$articles['origine'];
			// $i+=1;
			echo "<OPTION VALUE='".$org."'>".$org."</OPTION>";
			}
			$rep->closeCursor(); 
			
			?>
			</SELECT>
			</td>
		</tr>
		<tr>
			<td>Genre </td>
			<td>
			<SELECT name="genre">
			<OPTION VALUE="2">Feminin</OPTION>
			<OPTION VALUE="1">Masculin</OPTION>
			<OPTION VALUE="3">Mixte</OPTION>
			</SELECT>
			</td>
		</tr>
		</table>
	</div>
	
	<div class="dim" id="recherche">
	<input type="submit" value="Rechercher">
	</div>

	
</form>	

</div>

<!-- 	LES  TOP 	-->


<div class="biblio">

<h2 class="rech2" id="troisiemeRechercheTitre">Top 5 des prénoms 2017</h2>

	<!-- <p id="titreGauche">Top 5 prenoms filles</p>
	 <p id="titreDroite">Top 5 prenoms garçon</p> -->
	
</div>

<div class="biblio" id="accueilFavori" >

<!-- les deux listes 'ul' deviendront des boucles en PHP -->

<!-- top prénom garcon -->


<table class="listePrenom" id="masculinSarah">
<form method="get" action="page.PHP" autocomplete="on">

<?php

	$bdd = getBD();
	
	$q="SELECT frequence.Nombre, prenom.prenom, prenom.idprenom FROM prenom, frequence, annee 
where prenom.idprenom=frequence.idPrenom
AND frequence.idAnnee=annee.idAnnee
AND annee.idAnnee=2017
AND prenom.sexe=1
GROUP BY frequence.Nombre
ORDER BY  frequence.Nombre DESC
LIMIT 0,5";
	
	$rep= $bdd->query($q);
	$i=0;
	while($articles = $rep->fetch()) {
		$i++;
		echo "<tr>";
		echo "<td>".$i."</td>";
		$id_prenom=$articles['idprenom'];
		// sur ordi de audrey :
		// $id_prenom=$ligne['idPrenom'];
		echo "<td> <a href='pages/fichePrenom.php?id_prenom=".$id_prenom."'> ".$articles['prenom']." </a></td>";
		echo "<td><INPUT type='checkbox' name='favori' value='".$articles['prenom']."'></td>";
		echo "</tr>";
	}

?>
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" value="Ajouter aux favoris"></td>
	</tr>
 </form>
</table>



<!-- top prénom fille -->

<table class="listePrenom" id="femininSarah" >

<form method="get" action="page.PHP" autocomplete="on">

<?php

	$bdd = getBD();
	
	$q="SELECT frequence.Nombre, prenom.prenom, prenom.idprenom FROM prenom, frequence, annee 
where prenom.idprenom=frequence.idPrenom
AND frequence.idAnnee=annee.idAnnee
AND annee.idAnnee=2017
AND prenom.sexe=2
GROUP BY frequence.Nombre
ORDER BY  frequence.Nombre DESC
LIMIT 0,5";
	
	$rep= $bdd->query($q);
	$i=0;
	while($articles = $rep->fetch()) {
		$i++;
		echo "<tr>";
		echo "<td>".$i."</td>";
		$id_prenom=$articles['idprenom'];
		// sur ordi de audrey :
		// $id_prenom=$ligne['idPrenom'];
		echo "<td> <a href='pages/fichePrenom.php?id_prenom=".$id_prenom."'> ".$articles['prenom']." </a></td>";
		echo "<td><INPUT type='checkbox' name='prenom".$i."' value='".$articles['prenom']."'></td>";
		echo "</tr>";
	}

?>
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" value="Ajouter aux favori"></td>
	</tr>
	
 </form>
</table>


</div >

<h2 class="rech2">Cartes des orignes des prénoms</h2>

<h2 class="rech2">Mettre les bubulles</h2>



<!-- a supprimer 

<a href="pages/rechercheLeavan.html"> lien temporaire vers recherche </a>


<p> fin de page </p>-->

</div> <!-- tout le contenu de la page -->







</body>
</html>
