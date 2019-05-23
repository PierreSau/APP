<h1>

    <?php
    echo($idmaison)['adresse'];
    ?>
</h1><br>
<h2>

</h2>

<?php echo $alerte?>
<div class="tableauPiece">

<?php echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'&piece='.$piece.'">' ?>
        <div class="piece">

            <h2>Mode ECO</h2>

            <br/>
            Date de début du mode :

            <input type="date" name="datedebut" required>
            <br>
            Date de fin du mode :
            <input type="date" name="datefin" required>
            <br><br>
            De :
            <input type="time" name="heuredebut" required> à
            <input type="time" name="heurefin" required>
            <br>
            <input type="hidden" name="mode" value="eco" required>
            <input type="submit" value="Enregistrer" required/>
        </div>
</form>
</br>
    <?php echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'&piece='.$piece.' ">' ?>

    <div class="piece">
        <h2>Mode JOUR</h2>

        <br/>
        Date de début du mode :

        <input type="date" name="datedebut" required>
        <br>
        Date de fin du mode :
        <input type="date" name="datefin" required>
        <br><br>
        De :
        <input type="time" name="heuredebut" required> à
        <input type="time" name="heurefin" required>
        <br>
        <input type="hidden" name="mode" value="jour" required>
        <input type="submit" value="Enregistrer" />
    </div>

</form>
<br/>
    <?php echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'&piece='.$piece.'">' ?>

    <div class="piece">
        <h2>Mode NUIT</h2>

        <br/>
        Date de début du mode :

        <input type="date" name="datedebut" required>
        <br>
        Date de fin du mode :
        <input type="date" name="datefin" required>
        <br><br>
        De :
        <input type="time" name="heuredebut" required> à
        <input type="time" name="heurefin" required>
        <br>
        <input type="hidden" name="mode" value="nuit" required>
        <input type="submit" value="Enregistrer" />

    </div>
</form>
</div>