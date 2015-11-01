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
		<div id="infos">
			Si vous rencontrez un probleme quelconque ou des questions sur le fonctionnement du site, vous pouvez contacter l'administrateur du site grace au formulaire ci-dessous:
		</div>	
		<br>
		<br>
		<br>
		<div id="mail">
			<form action="ConfirmationMail.php" method="POST" id="mail">
				Nom<br><input type='text' name='nom' value=<?php isset($_POST['nom'])?>><br> 
				Prenom<br><input type='text' name='prenom' value=<?php isset($_POST['prenom']) ?> ><br>
				Addresse Mail<br><input type='text' name='email' value=<?php isset($_POST['email'])?> ><br>
				Sujet <br><input type='text' name='sujet' value=<?php isset($_POST['sujet'])?> ><br>
				<input type='submit' name='Envoyer' value='Envoyer'>
			</form>
			<br>
			Message<br>
			<textarea name='message' form='mail' rows='20' cols='100' value=<?php isset($_POST['message'])?>>
			</textarea>
			<br>
			
			
			
		</div>
		
		
		
		</body>
	
</html>