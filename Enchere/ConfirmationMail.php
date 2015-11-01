<?php
	include("params.inc.php");
	
	if(mail('milihhard1996@gmail.com', 'niah', 'ta mere')){
		echo "votre mail a bien ete envoye";
	}else{
		echo "erreur lors de l'envoi de votre message";
	}
	
?>