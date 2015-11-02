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
	$requete="SELECT nomObjet FROM objet where CONVERT(DATE_FORMAT(DATE(finEncheres),'%Y%c%d'),UNSIGNED INTEGER) <= CONVERT(DATE_FORMAT(CURDATE(),'%Y%c%d'),UNSIGNED INTEGER)";
	$marche = mysqli_query($id, $requete);
	while($ligne = $marche->fetch_array(MYSQLI_NUM)){
		$sql = "DELETE FROM objet WHERE nomObjet like '".$ligne[0]."'";

		if ($id->query($sql) === TRUE) {
			echo "Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $id->error."<br>";
		}
	}
	$requete="SELECT u.idUtilisateur, count(*) FROM utilisateur u INNER JOIN objet o ON u.idUtilisateur=o.idUtilisateur GROUP BY u.idUtilisateur";
	$marche = mysqli_query($id, $requete);
	$result;
	$i=0;
	while($ligne = $marche->fetch_array(MYSQLI_NUM)){
		$result[$i]=$ligne[0];
		$i++;
	}
	$requete="SELECT u.idUtilisateur, count(*) FROM utilisateur u INNER JOIN objet o ON u.idUtilisateur=o.idUtilisateur GROUP BY u.idUtilisateur";
	$marche = mysqli_query($id, $requete);
	$result2;
	$i=0;
	while($ligne = $marche->fetch_array(MYSQLI_NUM)){
		$result2[$i]=$ligne[0];
		$i++;
	}
	$requete="SELECT idUtilisateur FROM utilisateur";
	$marche = mysqli_query($id, $requete);
	while($ligne2 = $marche->fetch_array(MYSQLI_NUM)){
		$supp=1;
		foreach($result AS $x){
			if($x == $ligne2[0]){
				$supp=0;
			}
		}
		foreach($result2 AS $x){
			if($x == $ligne2[0]){
				$supp=0;
			}
		}
		if($supp==1){
			$sql = "DELETE FROM utilisateur WHERE idUtilisateur=".$ligne2[0];

			if ($id->query($sql) === TRUE) {
				echo "Record deleted successfully<br>";
			} else {
				echo "Error deleting record: " . $conn->error."<br>";
			}
		}
	}


	?>


</div>
</body>
</html>