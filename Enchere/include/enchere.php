<div id=\"formulaire\" class="cote">
	<form method="post" action="traite_enchere.php">
		<?php if(isset($_SESSION["identification"]) and $_SESSION["identification"]==1) {
			echo "<p id='red'>Mauvaise identification</p>";
			$_SESSION["identification"] = 0;
		}
		if(isset($_SESSION["maildiff"]) and $_SESSION["maildiff"]==1){
			echo "<p id='red'>E-mails differents</p>";
			$_SESSION["maildiff"]=0;
		}
		if(isset($_SESSION["tropEnchere"]) and $_SESSION["tropEnchere"]==1){
			echo "<p id='red'>Vous avez fait trop d'enchere!</p>";
			$_SESSION["tropEnchere"]=0;
		}?>
		<p id="font2">Votre prenom :</p><input type="text" name="nickname" required autofocus>
		<p id="font2">Votre nom :</p><input type="text" name="lastname" required>
		<p id="font2">Votre e-mail :</p><input type="text" name="mail[]" required>
		<p id="font2">Confirmez Votre e-mail :</p><input type="text" name="mail[]" required>
		<p id="font2">Votre numero de telephone :</p><input type="tel" name="phone" required>
		<p id="font2">Votre enchere :</p><input type="number" name="enchere" placeholder=<?php echo "\"".$objet[7]."\""; ?> required min=<?php echo"\"".$objet[7]."\"";?>>
		<?php if(isset($_SESSION["number"]) and $_SESSION["number"]==1){
			echo "<p id='red'>Mauvaise nombre 	</p>";
			$_SESSION["number"]=0;
		} ?>
		<br>
		<br>
		<input type="reset" name="reset">
		<input type="submit" name="submit" value="submit">
	</form>
</div>