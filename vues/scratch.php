<!DOCTYPE html>


<html>
<meta charset="utf-8">
<head>
    <link rel="stylesheet" href="stylefonct.css">
    <title> Mode de fonctionnement </title>
</head>

<body>
<h2>
    <div class="modes">
        <div class="mode1">Eco</div>
        <div class="mode2">Jour</div>
        <div class="mode3">Nuit</div>
    </div>
</h2>

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

</select><br />
Date de debut :

<input type="date" name="début">

<input type="time" name="début">



<br> Date de fin :
<input type="date" name="début">

<input type="time" name="début">

<br/>
<br/>
<input type="submit" value="enregistrer"/>

<?php
try {

    $bdd = new PDO('mysql:host=localhost;dbname=bdd ecom;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die("La base de données n'a pas pu se charger");
}


?>

</body>
</html>