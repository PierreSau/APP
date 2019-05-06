
<?php




/**Fonction table piece*/

// on récupère les requêtes génériques
include('requetes.generiques.php');

//on définit le nom de la table
$table = "room";



/**
 * Recherche les pieces en fonction du type passé en paramètre
 * @param PDO $bdd
 * @param string $table
 * @param string $type
 * @return array
 */
function rechercheParType(PDO $bdd, string $table, string $type): array {

    return recherche($bdd, $table, ['nom' => $type]);

}
