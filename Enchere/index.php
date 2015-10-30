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

			$id = mysqli_connect($host,$user,$password,$dbname);
			$requete="SELECT image, miseEnLigne, nomObjet FROM objet where miseEnLigne IN (SELECT max(miseEnLigne) FROM objet)";
			$marche = mysqli_query($id, $requete);
			$ligne = $marche->fetch_array(MYSQLI_NUM);
			global $lastEnchere;
			global $nomLastEnchere;
			$lastEnchere= $ligne[0];
			$nomLastEnchere= $ligne[2];
			$requete="SELECT image, prixEnchere, nomObjet FROM objet where prixEnchere IN (SELECT max(prixEnchere) FROM objet)";
			$marche = mysqli_query($id, $requete);
			global $bestEnchere;
			global $nomBestEnchere;
			$ligne = $marche->fetch_array(MYSQLI_NUM);
			$bestEnchere = $ligne[0];
			$nomBestEnchere = $ligne[2];
			$id->close();
			?>
			
			<div id="encheremain">
				<table>
					<td class="ench">
							<p>Derniere enchere</p>
							<?php echo "<a href=\"enchere.php?nom=".$GLOBALS["nomLastEnchere"]."\">"; ?> <img width="500" height="250"src=<?php  echo "'".$GLOBALS["lastEnchere"]."'";?> ></a>
					</td>
					<td class="ench">
							<p>Plus grosse enchere</p>
							<?php echo "<a href=\"enchere.php?nom=".$GLOBALS["nomBestEnchere"]."\">"; ?> <img width="500" height="250"src=<?php  echo "'".$GLOBALS["bestEnchere"]."'";?> ></a>
					</td>
				</table>
			</div>
			
		</div>
	</body>

</html>