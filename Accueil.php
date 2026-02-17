<?php
session_start();
include 'GestionSalle.php';
include 'Salle.php';
if(!isset($_SESSION['gestion_salle'])){
    $gestion_salle=new GestionSalle();
    $json= file_get_contents("data/json-data-salle.json");
    $data = json_decode($json,true);
    foreach($data as $salles=>$items) {
        $salle_nom=$items['nom'];
        $salle_capacité=$items['capacité'];
        $salle_lieu=$items['localisation'];
        $salle_disponibilite=$items['disponible'];

        $salle=new Salle($salle_nom,$salle_capacité,$salle_lieu,$salle_disponibilite);

        $gestion_salle->ajouterSalle($salle);

    }
    $gestion_salle->afficherToutesSalles();
    $_SESSION['gestion_salle']=serialize($gestion_salle);
}
else{
    $gestion_salle=unserialize($_SESSION['gestion_salle']);
    $gestion_salle->afficherToutesSalles();
}
if($error=0){
    echo "Erreur salle déja existante";
}
?>

<!DOCTYPE html>
<head>
    <title>Acceuil</title>
    <link rel="stylesheet" href="style.css">
</head>



<body>
<div class="form">
<form action='Ajout.php' method='post'>
    <legend> Ajoute salle</legend>
    <label for='nom'>Nom</label>
    <input type="text" name='nom' id='nom' REQUIRED>

    <label for='capacite'>Capacité</label>
    <input type="number" name='capacite' id='capacite' REQUIRED>

    <label for='localisation'>Localisation</label>
    <input type='text' name='localisation' id='localisation' REQUIRED>

    <button type="submit">Ajouter</button>

</form>

<form action='Supprimer.php' method='post'>
    <legend>Supimer salle</legend>
    <label for='nom'>Nom</label>
    <input type="text" name='nom' id='nom' REQUIRED>

    <button type="submit">Supprimer</button>
</form>

<form action='Changer.php' method='post'>
    <legend>Changer disponiblité</legend>
    <label for='nom'>Nom</label>
    <input type="text" name='nom' id='nom' REQUIRED>

    <button type="submit">Changer</button>
</form>
</div>
</body>
