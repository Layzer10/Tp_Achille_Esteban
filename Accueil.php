<?php
include 'GestionSalle.php';
include 'Salle.php';
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

?>

<!DOCTYPE html>




<body>
<form action='Ajout.php' method='post'>
    <legend> Ajoute salle</legend>
    <label for='nom'>Nom</label>
    <input type="text" name='nom' id='nom'>

    <label for='capacite'>Capacité</label>
    <input type="number" name='capacite' id='capacite'>

    <label for='localisation'>Localisation</label>
    <input type='text' name='localisation' id='localisation'>

    <button type="submit">Ajouter</button>

</form>

<form action='Supprimer.php' method='post'>
    <label for='nom'>Nom</label>
    <input type="text" name='nom' id='nom'>
</form>

</body>
