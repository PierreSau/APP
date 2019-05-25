
<?php

$alerte=false;


include('modele/connexion.php');
include('modele/maison.php');
include('modele/requetes.pieces.php');

if (!isset($_GET['maison']) || empty($_GET['maison'])) {
$maison = 0;

}else {
$maison = $_GET['maison'];
}

$idmaison=idmaison($bdd,$_SESSION['idPersonne'],$maison);

if (is_int($idmaison)) { //si $idmaison est un entier, cela signifie qu'il y a eu un problème dans les données dans l'url
$vue = "erreur404";

} else {

$captact = [];
$idpiece = recupererpieces($bdd, $idmaison['idHabitation']);
for ($i = 0; $i < count($idpiece); $i++) {      //on récupère les captact pour avoir l'idCemac
$idpiece[$i]['mode']=recuperermode($bdd,$idpiece[$i]['idPiece']);
$captact[$i] = recuperercapt($bdd, $idpiece[$i]['idPiece'],$idpiece[$i]['mode']);
}
print_r($captact);

//print_r($idpiece);



}
