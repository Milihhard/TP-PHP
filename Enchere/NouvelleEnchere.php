<?php
include_once("params.inc.php");
$id= mysqli_connect($host, $user, $password, $dbname);
if (!$id){
	die('Erreur de connexion('.mysqli_connect_errno().') '.mysqli_connect_error());
}
?>
<?php 
global $nom;
global $prenom;
global $email;
global $tel;
global $nomObj;
global $Image;
global $DateDebut;
global $DateFin;
global $PrixMin;
$_POST['prenom']=$prenom;
$_POST['nom']=$nom;
$_POST['email']=$email;
$_POST['tel']=$tel;
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
			<form method='POST' action='INSERTBD.php'>
				<div id='perso'>
					Nom<br><input type='text' name='nom' value=<?php isset($_POST['nom'])?>><br>
					Prenom<br><input type='text' name='prenom' value=<?php isset($_POST['prenom']) ?> ><br>
					Addresse Mail<br><input type='text' name='email' value=<?php isset($_POST['email'])?> ><br>
					Telephone<br><input type="text" name='tel' value=<?php isset($_POST['tel'])?>><br>
				</div>
				<div id='obj'>
					Nom de L'Objet<br><input type='text' name='nomObj' value=<?php isset($_POST['nomObj'])?>><br>
					Url de L'Image<br><input type='url' name='Image'  value=<?php isset($_POST['Image'])?>><br>
					Prix Min<br><input type='text' name='PrixMin' value=<?php isset($_POST['PrixMin'])?>><br>
					Datedebut<br><input type='text' name='DateDebut' value=<?php isset($_POST['DateDebut'])?>><br>
					DateFin<br><input type='text' name='DateFin' value=<?php isset($_POST['DateFin'])?>><br>
				</div>
					<input type="submit" name="valider" value="Valider">
			</form>
			
			
		</div>
	</body>
	
</html>