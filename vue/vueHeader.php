<?php
$page =  (!empty($_GET['page']) ? $_GET['page'] : 0 );
$page = ($page <= 0 ? 1 :$page);
?>
<!doctype html>
<html lang="fr" class="no-js">
<head>
    <meta charset="utf-8">
    <title>Annuaire</title> 
    <meta name="description" content="Annuaire des employés">
    <link rel="stylesheet" href="./style/annuaire.css">
</head>