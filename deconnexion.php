
<!DOCTYPE html>
<html>

<head>

<title>Deconnexion</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<link rel="stylesheet" href="css/v1-sarah.css" type="text/css" media="screen" />

</head>


<body>

<div class="contenuPage"> <!-- tout le contenu de la page -->


<?php
session_start();
session_destroy();
echo "<meta http-equiv='refresh' content='1;URL=accueil.php'>";

?>
<!-- Votre code HTML /PHP -->
<h1> VOUS AVEZ ETE DECONNECTER </h1>
</br>
<a href="accueil.php"> Retour au menu </a>
<!-- Votre code HTML /PHP -->

</div>

</body>
</html>
