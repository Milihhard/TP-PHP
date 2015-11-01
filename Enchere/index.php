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
	$requete="SELECT image, miseEnLigne, nomObjet, prixEnchere FROM objet where miseEnLigne IN (SELECT max(miseEnLigne) FROM objet)";
	$marche = mysqli_query($id, $requete);
	$ligne = $marche->fetch_array(MYSQLI_NUM);
	global $lastEnchere;
	global $nomLastEnchere;
	global $prixLastEnchere;
	$lastEnchere= $ligne[0];
	$nomLastEnchere= $ligne[2];
	$prixLastEnchere= $ligne[3];
	$requete="SELECT image, prixEnchere, nomObjet, prixEnchere FROM objet where prixEnchere IN (SELECT max(prixEnchere) FROM objet)";
	$marche = mysqli_query($id, $requete);
	global $bestEnchere;
	global $nomBestEnchere;
	global $prixBestEnchere;
	$ligne = $marche->fetch_array(MYSQLI_NUM);
	$bestEnchere = $ligne[0];
	$nomBestEnchere = $ligne[2];
	$prixBestEnchere = $ligne[3];
	$id->close();
	?>

	<div id="encheremain">
		<table>
			<td class="ench">

				<?php echo "<a href=\"enchere.php?nom=".$GLOBALS["nomLastEnchere"]."\">"; ?>
				<p>Derniere enchere</p>
				<img width="500" height="250"src=<?php  echo "'".$GLOBALS["lastEnchere"]."'";?> ><br>
				<?php echo $GLOBALS["prixLastEnchere"]."$";?>
				</a>
			</td>
			<td class="ench">
				<?php echo "<a href=\"enchere.php?nom=".$GLOBALS["nomBestEnchere"]."\">"; ?>
				<p>Plus grosse enchere</p>
				<img width="500" height="250"src=<?php  echo "'".$GLOBALS["bestEnchere"]."'";?> ><br>
				<?php echo $GLOBALS["prixBestEnchere"]."$";?>
				</a>
			</td>
		</table>
	</div>
	<br><br><br><br>
	<h2>Presentation de l'oeuvre</h2>
	<div id="presentation">
		Breaking Bad ou Breaking Bad : Le Chimiste au Québec est une série télévisée américaine en 62 épisodes de 47 minutes, créée par Vince Gilligan, diffusée simultanément du 20 janvier 2008 au 29 septembre 2013 sur AMC aux États-Unis et au Canada, et ensuite sur Netflix.<br>
	</div>
	<div id="presentation">
		La série se concentre sur Walter « Walt » White, un professeur de chimie sur-qualifié et père de famille, qui, ayant appris qu'il est atteint d'un cancer du poumon en phase terminale, sombre dans le crime pour assurer l'avenir financier de sa famille. Pour cela, il se lance dans la fabrication et la vente de méthamphétamines avec l'aide de l'un de ses anciens élèves, Jesse Pinkman. L'histoire se déroule à Albuquerque, au Nouveau-Mexique.<br>
	</div>
	<div id="presentation">
		Breaking Bad remporte de nombreuses récompenses : 15 Emmy Awards dont quatre du meilleur acteur pour Bryan Cranston, trois de meilleur acteur dans un second rôle pour Aaron Paul, deux de meilleure actrice dans un second rôle pour Anna Gunn, deux de meilleure série télévisée dramatique. Bryan Cranston a été nommé quatre fois au Golden Globe et le remporte la quatrième fois en 2014. Il a également été nommé cinq fois au Screen Actors Guild Award, remportant la récompense en 2013 et 2014.<br>
	</div>
	<div id="presentation">	
		Par ailleurs, Breaking Bad reçoit un large succès critique au fil des saisons et est à présent considérée comme l'une des meilleures séries télévisées américaines. La cinquième saison a eu un score de 99 sur 100 sur le site Metacritic. En 2013, la Writers Guild of America la nomme 13e des séries les mieux écrites de l'histoire de la télévision. IMDB la classe 3e de son top 250 des série TV14 et elle est 2e du classement des meilleurs séries de tous les temps selon Allociné. Enfin, le magazine The Hollywood Reporter classe Breaking Bad comme la 2e meilleure série américaine derrière Friends, alors que Esquire la place 2e meilleure série dramatique après les Sopranos.<br>
	</div>
</div>
</body>

</html>