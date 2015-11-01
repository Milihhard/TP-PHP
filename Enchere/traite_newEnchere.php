<?php  session_start();
function ajoutObjet($id){
	$requete = "SELECT nomObjet FROM objet WHERE nomObjet like '" . $_POST['nomObj']. "'";
	$marche = mysqli_query($id, $requete);
	if ($ligne = $marche->fetch_array(MYSQLI_NUM)) {
		echo "nom objet déjà utilisé<br>";
		header('Location:NouvelleEnchere.php');
		$id->close();
		exit();
	}else{
		if($_POST['DateDebut']<=$_POST['DateFin']){
			$requete = "SELECT * FROM utilisateur WHERE addresse like '" . $_POST['mail'][0] . "'";
			$marche = mysqli_query($id, $requete);
			$ligne = $marche->fetch_array(MYSQLI_NUM);
			$requete = "INSERT INTO objet (nomObjet, idUtilisateur, image, prixMin, miseEnLigne, finEncheres, prixEnchere)
							VALUES ('".$_POST['nomObj']."', '".$ligne[4]."', '".$_POST['image']."', '".$_POST['prixMin']."', '".$_POST['dateDebut']."', '".$_POST['dateFin']."', '".$_POST['prixMin']."')";
			if ($id->query($requete) === TRUE) {
				echo "<a href=\"index.php\">revenir sur la page acceuil</a>";
				echo "<br>bonne inscription";

			} else {
				echo "Error insert: " . $requete . "<br>" . $id->error;
			}
		}else{
			echo "mauvaise date<br>";
			header('Location:NouvelleEnchere.php');
			$id->close();
			exit();
		}
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<title>SQL Utilisateur</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
include("params.inc.php");
if($_POST['mail'][0]==$_POST['mail'][1]) {
	$id = mysqli_connect($host, $user, $password, $dbname);
	$requete = "SELECT * FROM utilisateur WHERE addresse like '" . $_POST['mail'][0] . "'";
	$marche = mysqli_query($id, $requete);
	if ($ligne = $marche->fetch_array(MYSQLI_NUM)) {
		//bon e-mail
		if ($ligne[1] = $_POST["lastname"] and $ligne[0] = $_POST["nickname"] and $ligne[3] = $_POST["phone"]) {
			//bonne co
			echo "<a href=\"index.php\">revenir sur la page acceuil</a>";
			ajoutObjet($id);
		} else {
			echo "mauvais identification";
			$_SESSION["identification"] = 1;
			header('Location:NouvelleEnchere.php');
			$id->close();
			exit();
		}
	}else {
		//nouveau gars
		$requete = "INSERT INTO utilisateur (nom, prenom, addresse, telephone)
							VALUES ('" . $_POST['lastname'] . "', '" . $_POST['nickname'] . "', '" . $_POST['mail'][0] . "', '" . $_POST['phone'] . "')";
		if ($id->query($requete) === TRUE) {
			echo "<a href=\"index.php\">revenir sur la page acceuil</a>";
			echo "<br>bonne inscription";
			$requete = "SELECT idUtilisateur FROM utilisateur WHERE addresse like '" . $_POST['mail'][0] . "'";
			$marche = $id->query($requete);
			$ligne = $marche->fetch_array(MYSQLI_NUM);
			$idUt = $ligne[0];
			ajoutObjet($id);
		} else {
			echo "Error insert: " . $requete . "<br>" . $id->error;
		}

	}
}else{
	echo "e-mail different";
	$_SESSION["maildiff"] = 1;
	header('Location:NouvelleEnchere.php');
	$id->close();
	exit();
}

$id->close();
?>




</body>
</html>