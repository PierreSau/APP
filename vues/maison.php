<div>
    <div class="tableau2">


<?php

while ($donnees = $maisons->fetch())
{
    echo'<a href="index.php?cible=utilisateurs&fonction=faq">';

    echo '<div class="maison">';
    print($donnees['adresse']);
    echo'</div>';
    echo'</a>';

}

$maisons->closeCursor();
?>
<a href="index.php?cible=utilisateurs&fonction=ajoutmaison">
<div class="maison" >
    ajouter une maison
<br/>
    +
</div>
</a>
</div>

