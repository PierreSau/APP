

<table>
    <thead>
    <tr>

        <th>Capteur</th>
        <th>Unité</th>
        <th>Trame</th>

    </tr>
    </thead>
    <tbody>

    <?php foreach ($catalogueCapteur as $element) { ?>

        <tr>
            <td>
                <?php echo $element['type']; ?>
            </td>
            <td>
                <?php echo $element['unite']; ?>
            </td>
            <td>
                <?php echo $element['champTYP']; ?>
            </td>
        </tr>

    <?php } ?>
    <tr>
        <form method="post" action="index.php?cible=utilisateurs&fonction=modifCatalogueCapteurs">
            <td><input type="text" name="type" placeholder="Entrez le type de capteur" maxlength="30" required/>
            </td>
            <td><input type="text" name="unite" placeholder="Entrez l'unité du capteur" maxlength="30" required/>
            </td>
            <td><input type="text" name="champTYP" placeholder="Entrez la trame du capteur" maxlength="30" required/>
            </td>
            <td><input type="submit" value="Ajouter"/></td>
        </form>
    </tr>

    </tbody>
</table>

<table>
    <thead>
    <tr>

        <th>Actionneur</th>
        <th>Unité</th>
        <th>Trame</th>

    </tr>
    </thead>
    <tbody>

    <?php foreach ($catalogueActionneur as $element) { ?>

        <tr>
            <td>
                <?php echo $element['type']; ?>
            </td>
            <td>
                <?php echo $element['unite']; ?>
            </td>
            <td>
                <?php echo $element['champTYP']; ?>
            </td>
        </tr>

    <?php } ?>
    <tr>
        <form method="post" action="index.php?cible=utilisateurs&fonction=modifCatalogueActionneur">
            <td><input type="text" name="type" placeholder="Entrez le type de Actionneur" maxlength="30" required/>
            </td>
            <td><input type="text" name="unite" placeholder="Entrez l'unité de l'actionneur" maxlength="30" required/>
            </td>
            <td><input type="text" name="champTYP" placeholder="Entrez la trame de l'actionneur" maxlength="30" required/>
            </td>
            <td><input type="submit" value="Ajouter"/></td>
        </form>
    </tr>

    </tbody>
</table>


<?php if (isset($alerte)) {
    echo AfficheAlerte($alerte);
} ?>
