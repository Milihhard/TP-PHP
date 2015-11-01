<?php
	include("params.inc.php");
	
	if(mail('localhost', $_POST['sujet'], $_POST['message'])){
		echo "votre mail a bien ete envoye";
	}else{
		echo "erreur lors de l'envoi de votre message";
	}
	
?>