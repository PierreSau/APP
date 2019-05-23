

<h1>

<?php
echo($idmaison)['adresse'];
?>
</h1>
<?php print($alerte);
?>

<div class="tableauPiece">
<?php
for($i=0 ; $i<count($captact) ; $i++) {   //on parcours toutes les pièces de la maison
    echo '<div class="piece">';
    echo '<h1>';
    echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'">';
    echo'<input type="hidden" name="numpiecesuppr" value='.$i.'>';
    echo'<button class="croix"></button>';
    echo '</form>';
    print($idpiece[$i]['nom']);
    echo' : ';
    echo '</h1><br><br>';
    for($j=0 ; $j<count($captact[$i]); $j++){  //on affiche les captact et leur valeurs d'une pièce
        print($captact[$i][$j]['type']);
        echo ' : ';
        print($captact[$i][$j]['valeur']);
        echo ' ';
        print($captact[$i][$j]['unite']);
        echo ' </br> ';

    }
    echo 'Mode : '.$idpiece[$i]['mode'].' ';

    echo'<a href="index.php?cible=pieces&maison='.$maison.'&piece='.$i.'">';
    echo'<img src="images/parametres.png" width=15px height=15px class="mode">';
    echo '</a>';

?>

</div>

<?php
}

//<img src="images/plus.png" height="190" width="200">

?>

    <div class="piece">
    <h1>Ajouter une pièce</h1>
       <?php echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'">'; ?>
        </br>
        <p> Nom de la piece :</p>
            <input type="text" name="nompiece" required/>
            </br></br>
            <input type="submit" value="Ajouter"/>
        </form>
    </div>
</div>

<?php
if ($nombrecaptact>0) {
echo 'Votre numéro de CeMac est : ';
print($numcemac[0]['numSerie']);
}
?>



<!-- détails -->


<div class="menu">

    <?php
    for($i=0 ; $i<count($captact) ; $i++){
    echo '<section class="faq-section">';
    echo" <input type=\"checkbox\"   id=\"$i\" >";
    echo"<label for=\"$i\" > ";
    print($idpiece[$i]['nom']);
    ?>
    </label>
    <div class="piecedetail">
        <div class="etat">
            <strong>Capteurs :</strong>
            <table class="captab">
                <tr>
                    <th>Capteur</th>
                    <th>Valeur Actuelle</th>
                    <th>Recu le</th>
                </tr>
                <?php
                for($j=0 ; $j<count($captact[$i]); $j++){
                    if($captact[$i][$j]['CaptOuAct']==1){
                        echo '<tr> <td>';


                        //formulaire pour supprimer un capteur (le même pour actionneur)

                        echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'">';
                        print($captact[$i][$j]['type']);        //+on affiche le capteur
                        echo' ';
                        print($captact[$i][$j]['champNum']);
                        echo'<input type="hidden" name="typecaptactsuppr" value='.$captact[$i][$j]['type'].'>';
                        echo'<input type="hidden" name="Numcaptactsuppr" value='.$captact[$i][$j]['champNum'].'>';
                        echo'<button class="croix"></button>';
                        echo '</form>';

                        echo'<form method="post" action="index.php?cible=panne">';
                        echo'<input type="hidden" name="idcapt" value='.$captact[$i][$j]['idCaptAct'].'>';
                        echo '<button class="vide">';
                        echo'<img src="images/reparation.png" width=15px height=15px class="modeg">';
                        echo'</button>';
                        echo '</form>';

                        echo '</td> <td>';
                        print($captact[$i][$j]['valeur']);
                        echo' ';
                        print($captact[$i][$j]['unite']);
                        echo '</td> <td>';
                        print($captact[$i][$j]['time']);
                        echo'</td></tr>';
                    }
                }
                ?>

                <tr><th>Ajouter capteur</th>
<?php
                   echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'">';
                    echo'<td><select name="idcaptact">';
                        for($k=0 ; $k<count($capteurs) ; $k++){
                                echo'<option value='.$capteurs[$k]["idCatalogue"].'> '.$capteurs[$k]["type"].'</option>';
                        }
                        echo'</select>';

                        if ($nombrecaptact==0){
                            echo'</br>';
                            echo'<input type="text" name="numcemac" title="numéro de série" placeholder="numero du CeMac" maxlength="4"required/>';
                        }
                        echo'<input type="hidden" name="numpiece" value='.$i.'>';
                        ?>

                    </td><td>
                        <input type="submit" value="Ajouter"/>
                        </form>
                    </td>


                </tr>

            </table>
        </div>
        <div class="etat">
            <strong>Actionneurs :</strong>
            <table class="captab">
                <tr>
                    <th>Actionneur</th>
                    <th>Valeur cible</th>
                </tr>
                <?php
                for($j=0 ; $j<count($captact[$i]); $j++){
                    if($captact[$i][$j]['CaptOuAct']==2){
                        echo '<tr> <td>';
                        //formulaire pour supprimer un actionneur (le même pour un capteur)
                        echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'">';
                        print($captact[$i][$j]['type']);   //+on affiche l'actionneur
                        echo ' ';
                        print($captact[$i][$j]['champNum']);
                        echo'<input type="hidden" name="typecaptactsuppr" value='.$captact[$i][$j]['type'].'>';
                        echo'<input type="hidden" name="Numcaptactsuppr" value='.$captact[$i][$j]['champNum'].'>';
                        echo'<button class="croix"></button>';
                        echo '</form>';

                        echo'<form method="post" action="index.php?cible=panne">';
                        echo'<input type="hidden" name="idcapt" value='.$captact[$i][$j]['idCaptAct'].'>';
                        echo '<button class="vide">';
                        echo'<img src="images/reparation.png" width=15px height=15px class="modeg">';
                        echo'</button>';
                        echo '</form>';


                        echo '</td> <td>';
                        print($captact[$i][$j]['valeur']);
                        echo' ';
                        print($captact[$i][$j]['unite']);
                        echo'</td> </tr>';
                    }
                }
                ?>
                <tr><th>Ajouter actionneur </th>
                    <?php
                    echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'">';
                    echo'<td><select name="idcaptact">';
                    for($k=0 ; $k<count($actionneurs) ; $k++){
                        echo'<option value='.$actionneurs[$k]["idCatalogue"].'> '.$actionneurs[$k]["type"].'</option>';
                    }
                    echo'</select>';
                    if ($nombrecaptact==0){
                        echo'</br>';
                        echo'<input type="text" name="numcemac" title="numéro de série" placeholder="numero du CeMac" maxlength="4"required/>';
                    }
                    echo'<input type="hidden" name="numpiece" value='.$i.'>';
                    ?>

                    </td><td>
                        <input type="submit" value="Ajouter"/>
                        </form>
                    </td>


                </tr>

            </table>
        </div>
        </section>
        <?php
        }
        ?>



</div>
</div>