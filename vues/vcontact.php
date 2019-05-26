<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 2019-04-01
 * Time: 11:31
 */



?>

<form action="vcontact.php" method="post" >

    <fieldset>
        <p>Etes vous le proprietaire ? </p>
        <input type="radio" name="prop" value="oui" id="oui"
               checked="checked" />
        <label for="oui" class="inline">oui</label>
        <input type="radio" name="prop" value="non" id="non" />
        <label for="non" class="inline">non</label>

        <label for="utilise">Sujet message : </label>
        <select name="utilise" id="utilise">
            <option value="toujours"> information</option>
            <option value="parfois"> achat de materiel</option>
            <option value="jamais"> autre</option>
        </select>
    </fieldset>

    <fieldset>
        <legend>Vos coordonnees :</legend>
        <label for="email">Votre email :</label>
        <input type="email" name="email" size="20"
               maxlength="40" value="email" id="email" />
<br>
        <label for="comments">message :</label>
        <textarea name="comments" id="comments" cols="20" rows="4">
       </textarea>
    </fieldset>

    <p>
        <input type="submit" value="Envoyer" />
        <input type="reset" value="Annuler" />
    </p>

</form>


