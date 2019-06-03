<?php
/**
 * Fonctions liées aux contrôleurs
 */


/**
 * Détermine si le paramètre est un entier ou non
 * @param mixed $int
 * @return bool
 */
function estUnEntier($int): bool
{
    return is_numeric($int);
}

/**
 * Détermine si le paramètre est une string ou non
 * 
 * @param mixed $chaine
 * @return bool
 */
function estUneChaine($chaine): bool
{
    if (empty($chaine)) {
        return false;

    } else {
        return is_string($chaine);
    }
}

function estUnMotDePasse($chaine): bool
{
    if (empty($chaine) || strlen($chaine) < 4) {
        return false;
    } else {
        return is_string($chaine);
    }
}

function crypterMdp($password) {
    //return sha1($password);
    return password_hash($password, PASSWORD_BCRYPT);
}

function enregistretrames(PDO $bdd,$trame){
    $t = substr($trame,0,1);
    $o = substr($trame,1,4);
    $r = substr($trame,5,1);
    $c = substr($trame,6,1);
    $n = substr($trame,7,2);
    $v = substr($trame,9,4);
    $a = substr($trame,13,4);
    $x = substr($trame,17,2);
    $year = substr($trame,19,4);
    $month = substr($trame,23,2);
    $day = substr($trame,25,2);
    $hour = substr($trame,27,2);
    $min = substr($trame,29,2);
    $sec = substr($trame,31,2);
    $time=$year . "-" . $month . "-" . $day . " " . $hour . ":" . $min . ":" . $sec;
    $reponse=$bdd->query('SELECT idCemac FROM cemac WHERE numSerie='.$o.' ');
    $reponse=$reponse->fetchAll();
    for ($i=0;$i<count($reponse);$i++){
        $bdd->exec('INSERT INTO `tramerecep` (`idTrameRecep`, `TRA`, `REQ`, `TYP`, `NUM`, `VAL`, `TIM`, `CHK`, `idCemac`) VALUES (NULL,\'' . $t . '\',\'' . $r . '\',\'' . $c . '\',\'' . $n . '\',\'' . $v . '\',\'' . $time . '\',\'' . $x . '\',\'' . $reponse[$i] . '\')');
    }



}

function recuptrames(PDO $bdd) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=007B");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    $data_tab = str_split($data,33);
    for($i=0, $size=count($data_tab);$i<$size;$i++){
        enregistretrames($bdd, $data_tab[$i]);
        }
}