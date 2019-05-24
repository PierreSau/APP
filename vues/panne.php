<br>
<h2>
    Pour déclarer votre problème, veuillez sélectionner la caractéristique principale de ce problème parmi les solutions proposées ci dessous :
</h2>

<form method="POST" action="index.php?cible=panne&choix=ValidationChoix">
    <select name="choix" value="choix">
        <option value="pbCemac">Problème de connexion du CeMac</option>
        <option value="pbCapteur">Problème de connexion d'un capteur</option>
        <option value="valAbs">Valeurs absurdes</option>
        <option value="autre">Autre</option>
    </select>
    <?php
    echo'<input type="hidden" name="idcapt" value='.$_POST["idcapt"].'>';
    ?>
    <input type="submit" value="Valider" />

</form>




