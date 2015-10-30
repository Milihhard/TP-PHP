<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>		
		<title>BrBa Store</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="main">
			<?php  
			include("include/header.php");
			include("params.inc.php");

			if(isset($_GET["nom"])) {
				$id = mysqli_connect($host, $user, $password, $dbname);
				$requete = "SELECT * FROM objet WHERE nomObjet LIKE '".$_GET["nom"]."'";
				$marche = mysqli_query($id, $requete);
				if($ligne = $marche->fetch_array(MYSQLI_NUM)) {
					$objet = $ligne;
					echo "<div id=\"encheremain\">";
					echo "<p>".$objet[0]." </p>";
					echo "<img width=\"500\" height=\"250\"src='".$objet[3]."'>";
					echo "</div>";
				}else{
					echo "mauvais nom d'objet!";
				}

				$id->close();
			}else{
				echo "veuillez mettre comme parametre un nom!";
			}
			?>


			
		</div>
	</body>
</html>