<?php
include_once("params.inc.php");
$id= mysqli_connect($host, $user, $password, $dbname);
if (!$id){
	die('Erreur de connexion('.mysqli_connect_errno().') '.mysqli_connect_error());
}
?>

<?php 
$verif="Select * from utilisateur where addresse LIKE '".$_POST['email']."'";
$verifObj="Select idUtilisateur from utilisateur where addresse LIKE '".$_POST['email']."'";

$IDUT;

$result = mysqli_query($id, $verif);
if ($result = mysqli_query($id, $verif)){
				echo "Select gfhtf";
			}else {
				echo "Error: " . $sql . "<br>" . $id->error;
			}
$resultObj= mysqli_query($id, $verifObj);
$ligne=$result->fetch_array(MYSQLI_NUM);	

if($ligne=$result->fetch_array(MYSQLI_NUM))
{
	echo "chevre";
	if($ligne['1']=$_POST['nom'] and $ligne['2']=$_POST['prenom'] and $ligne['3']=$_POST['email'] and $ligne['4']=$_POST['tel']){
		$IDUT=$ligne['0'];
	}else{
		echo "mauvais Identifiants";
	}
}else{
		$sql= 'INSERT INTO utilisateur (nom, prenom, addresse, telephone, idUtilisateur) VALUES("'.$_POST['nom'].'", "'.$_POST['prenom'].'", "'.$_POST['email'].'", "'.$_POST['tel'].'")';
		if (mysqli_query($id, $sql)){
			echo "New record created successfully";
			$sql1= 'INSERT INTO objet (idUtilisateur, nomObjet, image, prixMin, miseEnLigne, finEncheres) VALUES("'.$verifObj.'", "'.$_POST['nomObj'].'", "'.$_POST['Image'].'", "'.$_POST['PrixMin'].'", "'.$_POST['DateDebut'].'", "'.$_POST['DateFin'].'")';
			if (mysqli_query($id, $sql1)){
				echo "New record created successfully";
			}else {
				echo "Error: " . $sql . "<br>" . $id->error;
			}
		}
}


/*$sql= 'INSERT INTO utilisateur (nom, prenom, addresse, telephone, idUtilisateur) VALUES("'.$_POST['nom'].'", "'.$_POST['prenom'].'", "'.$_POST['email'].'", "'.$_POST['tel'].'")';



echo $numero_insere;
$sql1= 'INSERT INTO objet (idUtilisateur, nomObjet, image, prixMin, miseEnLigne, finEncheres) VALUES("'.$numero_insere.'", "'.$_POST['nomObj'].'", "'.$_POST['Image'].'", "'.$_POST['PrixMin'].'", "'.$_POST['DateDebut'].'", "'.$_POST['DateFin'].'")';
if (mysqli_query($id, $sql1)){
	echo "New record created successfully";
}else {
	echo "Error: " . $sql . "<br>" . $id->error;
}
?>*/