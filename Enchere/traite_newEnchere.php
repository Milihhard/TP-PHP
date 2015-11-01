<?php  session_start();
function ajoutObjet(){

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
				ajoutObjet();
			} else {
				echo "mauvais identification";
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
				ajoutObjet();
			} else {
				echo "Error insert: " . $requete . "<br>" . $id->error;
			}

		}
	}else{
		echo "e-mail different";
		header('Location:NouvelleEnchere.php');
		$id->close();
		exit();
	}

	$id->close();
	?>




	</body>
	</html>