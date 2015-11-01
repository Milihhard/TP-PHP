<?php
include_once("params.inc.php");
$id= mysqli_connect($host, $user, $password, $dbname);
if (!$id){
	die('Erreur de connexion('.mysqli_connect_errno().') '.mysqli_connect_error());
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>BrBa Store</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="main">
	<?php include("include/header.php"); ?>

</div>
<br><br><br>

<br>
<div id="formulaire">
	<h1 style='text-align:center'>Nouvelle Enchere</h1>
	<form method='POST' action='traite_newEnchere.php'>
		<table>
			<td>
			<div id='perso' class='inline'>
				Nom<br><input type='text' name='lastname' required><br>
				Prenom<br><input type='text' name='nickname' required><br>
				Addresse Mail<br><input type='text' name='mail[]' required><br>
				Confirmer addresse Mail<br><input type='text' name='mail[]' required><br>
				Telephone<br><input type="tel" name='phone' required><br>
			</div>
			</td>
			<td>
			<div id='obj' class='inline'>
				Nom de L'Objet<br><input type='text' name='nomObj' required><br>
				Url de L'Image<br><input type='url' name='image'  required><br>
				Prix Min<br><input type='text' name='prixMin' required><br>
				Date debut<br><input type='date' name='dateDebut' required><br>
				Date Fin<br><input type='date' name='dateFin' required><br>
				<input type="submit" name="valider" value="Valider">
			</div>
			</td>

		</table>
	</form>


</div>
</body>

>>>>>>> origin/master
</html>