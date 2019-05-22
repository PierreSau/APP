

    <div class="tableauPiece">
        <form method="post" action="index.php?cible=utilisateurs&fonction=modeeco">
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
                echo 'Niveau de luminosité ='.$valeursEco["lum"]."</br>";
                echo 'Niveau de ventilation =' .$valeursEco["vent"]."</br>";
                ?>
            </h4>
        </div>
</form>
</br>
<form method="post" action="index.php?cible=utilisateurs&fonction=modejour">

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
            echo 'Niveau de luminosité ='.$valeursJour["lum"]."</br>";
            echo 'Niveau de ventilation =' .$valeursJour["vent"]."</br>";
            ?>
        </h4>
    </div>

</form>
<br/>
<form method="post" action="index.php?cible=utilisateurs&fonction=modenuit">

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
            echo 'Niveau de luminosité ='.$valeursNuit["lum"]."</br>";
            echo 'Niveau de ventilation =' .$valeursNuit["vent"]."</br>";
            ?>
        </h4>
    </div>
</form>

</div>



