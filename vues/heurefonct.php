<h1>

    <?php
    echo($idmaison)['adresse'];
    ?>
</h1><br>
<h2>
    <?php
    print_r($idpiece[$piece]['nom']);
    ?>
</h2>


<div class="tableauPiece">

<?php echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'&piece='.$piece.'">' ?>
        <div class="piece">

            <h2>Mode ECO</h2>

            <br/>
            Date de début du mode :

            <input type="date" name="datedebut">
            <br>
            Date de fin du mode :
            <input type="date" name="datefin">
            <br><br>
            De :
            <input type="time" name="heuredebut"> à
            <input type="time" name="heurefin">
            <br>
            <input type="hidden" name="mode" value="eco">
            <input type="submit" value="Enregistrer" />
        </div>
</form>
</br>
    <?php echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'&piece='.$piece.' ">' ?>

    <div class="piece">
        <h2>Mode JOUR</h2>

        <br/>
        Date de début du mode :

        <input type="date" name="datedebut">
        <br>
        Date de fin du mode :
        <input type="date" name="datefin">
        <br><br>
        De :
        <input type="time" name="heuredebut"> à
        <input type="time" name="heurefin">
        <br>
        <input type="hidden" name="mode" value="jour">
        <input type="submit" value="Enregistrer" />
    </div>

</form>
<br/>
    <?php echo'<form method="post" action="index.php?cible=pieces&maison='.$maison.'&piece='.$piece.'">' ?>

    <div class="piece">
        <h2>Mode NUIT</h2>

        <br/>
        Date de début du mode :

        <input type="date" name="datedebut">
        <br>
        Date de fin du mode :
        <input type="date" name="datefin">
        <br><br>
        De :
        <input type="time" name="heuredebut"> à
        <input type="time" name="heurefin">
        <br>
        <input type="hidden" name="mode" value="nuit">
        <input type="submit" value="Enregistrer" />

    </div>
</form>
</div>