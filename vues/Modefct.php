

<body>
<div class="tableau">
    <div class="modes">
        <h2>ECO</h2>

        <br/>
        Temperature :

        <select name="select">
            <?php
            for ($i=15;$i<=30;$i++)   {
                echo '<option value="T'.$i.'">'.$i.'°C</option>';
            }

            ?>
        </select><br />


        Luminosité :
        <select name="select">
            <option value="L_Fort">Fort</option>
            <option value="L_Moyen">Moyen</option>
            <option value="L_Faible">Faible</option>
            <option value="L_Eteint">Eteint</option>

        </select><br />
        Ventilateur :
        <select name="select">
            <option value="V_Désactivé">Désactivé</option>
            <option value="V_ACtivé">Activé</option>

        </select><br/>
        Date de debut :

        <input type="date" name="début" >

        <input type="time" name="début" >



        <br/> Date de fin :
        <input type="date" name="début">

        <input type="time" name="début">

        <br/>
        <br/>
        <input type="submit" value="Enregistrer" />
    </div>
    <br/>
    <div class="modes">
        <h2>JOUR</h2>

        <br/>
        Temperature :

        <select name="select">
            <?php
            for ($i=15;$i<=30;$i++)   {
                echo '<option value="T'.$i.'">'.$i.'°C</option>';
            }

            ?>
        </select><br />


        Luminosité :
        <select name="select">
            <option value="L_Fort">Fort</option>
            <option value="L_Moyen">Moyen</option>
            <option value="L_Faible">Faible</option>
            <option value="L_Eteint">Eteint</option>

        </select><br />
        Ventilateur :
        <select name="select">
            <option value="V_Désactivé">Désactivé</option>
            <option value="V_ACtivé">Activé</option>

        </select><br/>
        Date de debut :

        <input type="date" name="début" >

        <input type="time" name="début" >



        <br/> Date de fin :
        <input type="date" name="début">

        <input type="time" name="début">

        <br/>
        <br/>
        <input type="submit" value="Enregistrer" />
    </div>
    <br/>
    <div class="modes">
        <h2>NUIT</h2>

        <br/>
        Temperature :

        <select name="select">
            <?php
            for ($i=15;$i<=30;$i++)   {
                echo '<option value="T'.$i.'">'.$i.'°C</option>';
            }

            ?>
        </select><br />


        Luminosité :
        <select name="select">
            <option value="L_Fort">Fort</option>
            <option value="L_Moyen">Moyen</option>
            <option value="L_Faible">Faible</option>
            <option value="L_Eteint">Eteint</option>

        </select><br />
        Ventilateur :
        <select name="select">
            <option value="V_Désactivé">Désactivé</option>
            <option value="V_ACtivé">Activé</option>

        </select><br/>
        Date de debut :

        <input type="date" name="début" >

        <input type="time" name="début" >



        <br/> Date de fin :
        <input type="date" name="début">

        <input type="time" name="début">

        <br/>
        <br/>
        <input type="submit" value="Enregistrer" />
    </div></div>



