
<?php echo AfficheAlerte($alerte); ?>

<div class="tableauMaison">
    <?php
$i=0;
    while ($donnees = $maisons->fetch())
    {
        $i+=1;
        echo'<a href="index.php?cible=pieces&maison='.$i.'">';
        echo '<div class="maison">';
        echo '<form method="post" action="index.php?cible=utilisateurs&fonction=maison">';
        echo'<input type="hidden" name="maisonsuppr" value='.$i.'>';
        echo'<button class="croix"></button>';
        echo '</form>';
        print($donnees['adresse']);
        echo'<img src="images/maison.jpg">';
        echo'</div>';
        echo'</a>';
    }
    $maisons->closeCursor();
    ?>
    <div class="piece">
        <h1>Ajouter une maison</h1>
        <form method="post" action="index.php?cible=utilisateurs&fonction=maison">
        </br>
        <p> Adresse de la maison :</p>
        <input type="text" name="nommaison" required/>
        </br></br>
        <input type="submit" value="Ajouter"/>
        </form>
    </div>
</div>