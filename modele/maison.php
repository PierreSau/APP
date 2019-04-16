<?php
function recupereadresse($idPersonne){
  return $bdd-> query('SELECT adresse FROM habitation WHERE idHabitation = (SELECT idHabitation FROM relation WHERE idPersonne = '.$idPersonne.')');
}