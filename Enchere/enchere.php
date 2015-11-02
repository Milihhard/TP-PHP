<?php  session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<title>BrBa Store</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>table{
			background-color:rgba(200,200,51,0.2);
			margin-left:auto;
			margin-right:auto;
			margin-top: 1%;
			padding-left:1%;
			padding-right:1%;
		}</style>
</head>
<body>
<div id="main">
	<div id='enchobj'>
		<?php
		include("include/header.php");
		include("params.inc.php");

		if(isset($_GET["nom"])) {
			$id = mysqli_connect($host, $user, $password, $dbname);
			$requete = "SELECT * FROM objet WHERE nomObjet LIKE '".$_GET["nom"]."'";
			$marche = mysqli_query($id, $requete);
			if($ligne = $marche->fetch_array(MYSQLI_NUM)) {
				$_SESSION["nomObjet"]=$_GET["nom"];
				$_SESSION["prixObjet"]=$ligne[7];
				$objet = $ligne;
				echo "<table>";
				echo"<td>";
				echo "<div id=\"encheremain\" class=\"cote\">";
				echo "<h2>".$objet[0]." </h2>";
				echo "<img width=\"500\" height=\"250\"src='".$objet[3]."'>";
				echo "<p id=\"font\">Prix de l'enchere : ".$objet[7]."$</p>";
				echo "</div>";
				echo "</td>";
				echo"<td>";
				include("include/enchere.php");
				echo "</td>";
				echo"</table>";
			}else{
				echo "Mauvais nom d'objet!";
			}

			$id->close();
		}else{
			echo "Veuillez mettre comme parametre un nom!";
		}
		?>
	</div>



</div>
</body>
</html>