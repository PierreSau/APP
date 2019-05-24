

<div class="tableauPiece">
    <?php echo'<form method="post" action="index.php?cible=utilisateurs&fonction=modeeco&maison='.$maison.'">'; ?>
    <div class="piece">

        <h2>ECO</h2>

        <br/>
        Temperature :

        <select name="selecttemp">
            <?php
            for ($i=15;$i<=30;$i++)   {
                echo '<option value='.$i.'>'.$i.'°C</option>';
            }

            ?>
        </select><br />


        Luminosité :
        <select name="selectlum">
            <option value="3">Fort</option>
            <option value="2">Moyen</option>
            <option value="1">Faible</option>
            <option value="0">Eteint</option>

        </select><br />
        Ventilateur :
        <select name="selectvent">
            <option value="0">Désactivé</option>
            <option value="1">Activé</option>

        </select><br/>
        <input type="submit" value="Enregistrer" />
        <h4>
            Valeurs actuelles:
            <?php
            echo 'Temperature =' .$valeursEco["temp"] ."</br>";
            switch ($valeursEco["lum"]) {
                case '0':
                    $valeurEcoLum = 'éteint';
                    break;
                case '1':
                    $valeurEcoLum = 'faible';
                    break;
                case '2':
                    $valeurEcoLum = 'moyen';
                    break;
                case '3':
                    $valeurEcoLum = 'fort';
                    break;
            }
            echo 'Niveau de luminosité ='.$valeurEcoLum."</br>";
            switch ($valeursEco["vent"]){
                case '0':
                    $valeurEcoVent="éteint";
                    break;
                case '1':
                    $valeurEcoVent="allumée";
            }
            echo 'Niveau de ventilation =' .$valeurEcoVent."</br>";
            ?>
        </h4>
    </div>
    </form>
    </br>
    <?php echo'<form method="post" action="index.php?cible=utilisateurs&fonction=modejour&maison='.$maison.'">';?>

    <div class="piece">
        <h2>JOUR</h2>

        <br/>
        Temperature :

        <select name="selecttemp">
            <?php
            for ($i=15;$i<=30;$i++)   {
                echo '<option value='.$i.'>'.$i.'°C</option>';
            }

            ?>
        </select><br />


        Luminosité :
        <select name="selectlum">
            <option value="3">Fort</option>
            <option value="2">Moyen</option>
            <option value="1">Faible</option>
            <option value="0">Eteint</option>

        </select><br />
        Ventilateur :
        <select name="selectvent">
            <option value="0">Désactivé</option>
            <option value="1">Activé</option>

        </select><br/>
        <input type="submit" value="Enregistrer" />
        <h4>
            Valeurs actuelles:
            <?php
            echo 'Temperature =' .$valeursJour["temp"] ."</br>";
            switch ($valeursEco["lum"]) {
                case '0':
                    $valeurJourLum = 'éteint';
                    break;
                case '1':
                    $valeurJourLum = 'faible';
                    break;
                case '2':
                    $valeurJourLum = 'moyen';
                    break;
                case '3':
                    $valeurJourLum = 'fort';
                    break;
            }
            echo 'Niveau de luminosité ='.$valeurJourLum."</br>";
            switch ($valeursJour["vent"]){
                case '0':
                    $valeurJourVent="éteint";
                    break;
                case '1':
                    $valeurJourVent="allumée";
            }
            echo 'Niveau de ventilation =' .$valeurJourVent."</br>";
            ?>
        </h4>
    </div>

    </form>
    <br/>
    <?php echo'<form method="post" action="index.php?cible=utilisateurs&fonction=modenuit&maison='.$maison.'">';?>

    <div class="piece">
        <h2>NUIT</h2>

        <br/>
        Temperature :

        <select name="selecttemp">
            <?php
            for ($i=15;$i<=30;$i++)   {
                echo '<option value='.$i.'>'.$i.'°C</option>';
            }

            ?>
        </select><br />


        Luminosité :
        <select name="selectlum">
            <option value="3">Fort</option>
            <option value="2">Moyen</option>
            <option value="1">Faible</option>
            <option value="0">Eteint</option>

        </select><br />
        Ventilateur :
        <select name="selectvent">
            <option value="0">Désactivé</option>
            <option value="1">Activé</option>

        </select><br/>
        <input type="submit" value="Enregistrer" />
        <h4>
            Valeurs actuelles:
            <?php
            echo 'Temperature =' .$valeursNuit["temp"] ."</br>";
            switch ($valeursNuit["lum"]) {
                case '0':
                    $valeurNuitLum = 'éteint';
                    break;
                case '1':
                    $valeurNuitLum = 'faible';
                    break;
                case '2':
                    $valeurNuitLum = 'moyen';
                    break;
                case '3':
                    $valeurNuitLum = 'fort';
                    break;
            }
            echo 'Niveau de luminosité ='.$valeurNuitLum."</br>";
            switch ($valeursNuit["vent"]){
                case '0':
                    $valeurNuitVent="éteint";
                    break;
                case '1':
                    $valeurNuitVent="allumée";
            }
            echo 'Niveau de ventilation =' .$valeurNuitVent."</br>";
            ?>
        </h4>
    </div>
    </form>

</div>



