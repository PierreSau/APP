

<div class="tableau2">
    <?php
$i=0;
    while ($donnees = $maisons->fetch())
    {
        $i+=1;
        echo'<a href="index.php?cible=pieces&maison='.$i.'">';
        echo '<div class="maison">';
        print($donnees['adresse']);
        echo'</div>';
        echo'</a>';
    }
    $maisons->closeCursor();
    ?>
    <a href="index.php?cible=pieces&fonction=ajout">
        <div class="maison" >
            ajouter une maison
            <br/>
            +
        </div>
    </a>
</div>