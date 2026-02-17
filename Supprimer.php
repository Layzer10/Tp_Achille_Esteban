<?php
include 'GestionSalle.php';
include 'Salle.php';
session_start();
$gestionSalle = unserialize($_SESSION['gestion_salle']);
if ($gestionSalle->verifierSalle($_POST['nom'])==true){
    $gestionSalle->supprimerSalle($_POST['nom']);
}
$_SESSION['gestion_salle'] = serialize($gestionSalle);
Header("Location:Accueil.php");