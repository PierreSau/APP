<?php
/**
 * Vue : liste des utilisateurs inscrits
 */
?>
<?php echo AfficheAlerte($alerte); ?>
<p><?php echo $entete; ?></p>

<table>
    <thead>
    <tr>

        <th>Nom</th>
        <th>Prenom</th>
        <th>E-mail</th>
        <th>Téléphone</th>
        <th>Identité</th>
        <th>Modifier Identité</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($liste as $element) { ?>

        <tr>
            <td>
                <?php echo $element['nom']; ?>
            </td>
            <td>
                <?php echo $element['prenom']; ?>
            </td>
            <td>
                <?php echo $element['adresseMail']; ?>
            </td>
            <td>
                <?php echo $element['numDeTelephone']; ?>
            </td>
            <td>
                <?php switch ($element['niveau']){
                    case 1 :
                        echo 'Utilisateur';
                        break;
                    case 2 :
                        echo 'Gestionnaire';
                        break;
                    case 3 :
                        echo 'Administrateur';
                        break;
                    default:
                        echo 'Cet utilisateurs ne possède pas de rang';
                } ; ?>
            </td>
            <td>
                <form method="POST" action="index.php?cible=utilisateurs&fonction=modifListe&idPersonne=<?= $element['idPersonne'] ?>">
                    <select name="choix">
                        <option value="1">Utilisateur</option>
                        <option value="2">Gestionnaire</option>
                        <option value="3">Administrateur</option>
                    </select>
                    <input type="submit" value="Modifier" />

                </form>
            </td>
        </tr>

    <?php } ?>

    </tbody>
</table>


<?php if(isset($alerte)) { echo AfficheAlerte($alerte);} ?>

