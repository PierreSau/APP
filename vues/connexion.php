
/**
 * Created by PhpStorm.
 * User: leopo
 * Date: 13/05/2019
 * Time: 09:56
 */

<form method="post" action="index.php?cible=utilisateurs&fonction=connexion">

    <fieldset>

        <br/>
        <label for= "adresseMail"> Votre e-mail : </label>
        <input type="email" name="adresseMail" id="adresseMail" placeholder="Entrez votre e-mail ici" maxlength="100" required/> </p>


        <br />
        <label for="motDePasse"> Votre mot de passe : </label>
        <input type="password" name="motDePasse" id="motDePasse" placeholder="Entrez votre mot de passe ici" size="26" maxlength="30" required/>


        <br />
        <input type="submit" value="Connexion" />
    </fieldset>


</form>

<p><a href="index.php">Retour</a></p>