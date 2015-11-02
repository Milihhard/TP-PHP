<?php  session_start();?>
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
if(isset($_SESSION["nbEnchere"]) && ($_SESSION["nbEnchere"]>3)){
	echo "trop enchere";
	if (isset($_SESSION["nomObjet"])) {
		$file = "Location:enchere.php?nom=" . $_SESSION["nomObjet"];
		$_SESSION["tropEnchere"] = 1;
		header($file);
	} else {
		header('Location:objet.php');
	}
	$id->close();
	exit();
}else {
	if ($_POST['mail'][0] == $_POST['mail'][1]) {
		$id = mysqli_connect($host, $user, $password, $dbname);
		$requete = "SELECT * FROM utilisateur WHERE addresse like '" . $_POST['mail'][0] . "'";
		$marche = mysqli_query($id, $requete);
		if ($ligne = $marche->fetch_array(MYSQLI_NUM)) {
			//bon e-mail
			if ($ligne[1] = $_POST["lastname"] and $ligne[0] = $_POST["nickname"] and $ligne[3] = $_POST["phone"]) {
				//bonne co
				echo "<a href=\"index.php\">revenir sur la page acceuil</a>";
				if (isset($_SESSION["prixObjet"]) and $_SESSION["prixObjet"] < $_POST["enchere"]) {
					$sql = "UPDATE Objet SET Uti_idUtilisateur= " . $ligne[4] . ", prixEnchere=" . $_POST["enchere"] . " WHERE nomObjet like '" . $_SESSION["nomObjet"] . "'";
					if ($id->query($sql) === TRUE) {
						echo "<p id=\"font\">Record updated successfully</p>";
						if (isset($_SESSION["nbEnchere"])) {
							$_SESSION["nbEnchere"]++;
						} else {
							$_SESSION["nbEnchere"] = 0;
						}
					} else {
						echo "Error updating record: " . $id->error;
					}
				} else {
					echo "mauvais nombre";
					if (isset($_SESSION["nomObjet"])) {
						$file = "Location:enchere.php?nom=" . $_SESSION["nomObjet"];
						$_SESSION["number"] = 1;
						header($file);
					} else {
						header('Location:objet.php');
					}
					$id->close();
					exit();
				}
			} else {
				echo "mauvais identification";
				if (isset($_SESSION["nomObjet"])) {
					$file = "Location:enchere.php?nom=" . $_SESSION["nomObjet"];
					$_SESSION["identification"] = 1;
					header($file);
				} else {
					header('Location:objet.php');
				}
				$id->close();
				exit();
			}
		} else {
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
				$sql = "UPDATE Objet SET Uti_idUtilisateur= " . $idUt . ", prixEnchere=" . $_POST["enchere"] . " WHERE nomObjet like '" . $_SESSION["nomObjet"] . "'";
				if ($id->query($sql) === TRUE) {
					echo "<br><p id=\"font\">Record updated successfully</p>";
					if (isset($_SESSION["nbEnchere"])) {
						$_SESSION["nbEnchere"]++;
					} else {
						$_SESSION["nbEnchere"] = 0;
					}
				} else {
					echo "<br>Error updating record: " . $id->error;
				}
			} else {
				echo "Error insert: " . $requete . "<br>" . $id->error;
			}

		}
	} else {
		echo "e-mail different";
		if (isset($_SESSION["nomObjet"])) {
			$file = "Location:enchere.php?nom=" . $_SESSION["nomObjet"];
			$_SESSION["maildiff"] = 1;
			header($file);
		} else {
			header('Location:objet.php');
		}
		$id->close();
		exit();
	}
}

$id->close();
?>




</body>
</html>