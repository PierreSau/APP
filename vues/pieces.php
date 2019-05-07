

<body>
<h1>
<?php
echo($idmaison)['adresse'];
?>
</h1>
<?php print($alerte); ?>
<div class="tableauPiece">
<?php
for($i=0 ; $i<count($captact) ; $i++) {
    echo '<div class="piece">';
    echo '<h1>';
    print($idpiece[$i]['nom']);
    echo' : </br></br>';
    echo '</h1>';
    for($j=0 ; $j<count($captact[$i]); $j++){
        print($captact[$i][$j]['type']);
        echo ' : </br>';
    }
    echo '</div>';
}

//<img src="images/plus.png" height="190" width="200">

?>

    <div class="piece">
    <h1>Ajouter une pièce</h1>
       <?php echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'&fonction=ajoutepiece">'; ?>
        </br>
        <p> Nom de la piece :</p>
            <input type="text" name="nompiece" required/>
            </br></br>
            <input type="submit" value="Ajouter"/>
        </form>
    </div>
</div>



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
                </tr>
                <?php
                for($j=0 ; $j<count($captact[$i]); $j++){
                    if($captact[$i][$j]['CaptOuAct']==1){
                        echo '<tr> <td>';
                        print($captact[$i][$j]['type']);
                        echo '</td> <td>';
                        echo'</td> </tr>';
                    }
}
                ?>

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
                        print($captact[$i][$j]['type']);
                        echo '</td> <td>';
                        echo'</td> </tr>';
                    }
                }
                ?>
            </table>
        </div>
        </section>
        <?php
        }
        ?>



</div>
</div>