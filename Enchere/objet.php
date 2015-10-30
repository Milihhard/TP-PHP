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
			$requete="SELECT * FROM objet";
			$marche = mysqli_query($id, $requete);
			$cmpt =0;
			global $objet;
			$objet[]=NULL;
			while($ligne = $marche->fetch_array(MYSQLI_NUM)) {
				$objet[$cmpt] = $ligne;
				$cmpt++;
			}
			$id->close();
			?>
			
			<div id="encheremain">
				<table>
					<?php
					$objet=$GLOBALS["objet"];
					$cmpt=0;
					while(isset($objet[$cmpt])){
						echo"<tr>";
						echo"<td>";
						echo "<p>".$objet[$cmpt][0]."</p>";
						echo "<a href=\"enchere.php?nom=".$objet[$cmpt][0]."\"><img width=\"500\" height=\"250\"src='".$objet[$cmpt][3]."'></a>";
						echo"</td>";
						$cmpt++;
						if(isset($objet[$cmpt])){
							echo"<td>";
							echo "<p>".$objet[$cmpt][0]."</p>";
							echo "<a href=\"enchere.php?nom=".$objet[$cmpt][0]."\"><img width=\"500\" height=\"250\"src='".$objet[$cmpt][3]."'></a>";
							echo"</td>";
							$cmpt++;
						}
						echo"</tr>";
					}
					?>
				</table>
			</div>
			
		</div>
	</body>
</html>