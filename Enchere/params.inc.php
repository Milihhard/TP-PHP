<?php
	$host="localhost";
	$user="root";
	$password="";
	$dbname="brba";
	$nomAdmin="admin";
	$mdpAdmin="admin";
?>
<?php 
global $nom;
global $prenom;
global $email;
global $tel;
global $nomObj;
global $Image;
global $DateDebut;
global $DateFin;
global $PrixMin;
global $message;
global $sujet;
$_POST['prenom']=$prenom;
$_POST['nom']=$nom;
$_POST['email']=$email;
$_POST['nomObj']=$nomObj;
$_POST['Image']=$Image;
$_POST['DateDebut']=$DateDebut;
$_POST['DateFin']=$DateFin;
$_POST['PrixMin']=$PrixMin;
$_POST['message']=$message;
$_POST['sujet']=$sujet;

?>