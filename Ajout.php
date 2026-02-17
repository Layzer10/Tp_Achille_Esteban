<?php
include 'Salle.php';
include 'GestionSalle.php';
session_start();
$gestionSalle =unserialize($_SESSION['gestion_salle']);
$salle_nom=$_POST["nom"];
$salle_capacite=$_POST["capacite"];
$salle_localisation=$_POST["localisation"];
$salle=new Salle($salle_nom,$salle_capacite,$salle_localisation,"oui");
if ($gestionSalle->verifierSalle($salle_nom)==false and $salle_capacite>0){
    $gestionSalle->ajouterSalle($salle);
    $_SESSION['gestion_salle']=serialize($gestionSalle);
}
else{
    header("location:Accueil.php?error=0");
}
header("Location:Accueil.php");
