<?php/*

include 'modele/panne.php';

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = 'AccueilPanne';
} else {
    $function = 'ValidationChoix';
}


switch ($function) {

include('vues/header.php');
include('vues/' . $vue . '.php');
include('vues/footer.php');







