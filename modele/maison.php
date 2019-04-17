<?php
function recupereradresse($idPersonne){
    global $bdd;
    return $bdd-> query('SELECT * FROM habitation WHERE idHabitation IN (SELECT idHabitation FROM relation WHERE idPersonne = '.$idPersonne.')');
}
?>