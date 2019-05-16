
<form method="post" action="">

    <fieldset>
        <label for= "nom"> Votre Nom : </label>
        <input type="text" name="nom" id="nom" placeholder="<?= $_SESSION['nom']?>" maxlength="30" required/> </p>

        <br />
        <label for= "prenom"> Votre Prénom : </label>
        <input type="text" name="prenom" id="prenom" placeholder="<?= $_SESSION['prenom']?>" maxlength="30" required/> </p>

        <br/>
        <label for= "adresseMail"> Votre e-mail : </label>
        <input type="email" name="adresseMail" id="adresseMail" placeholder="<?= $_SESSION['adresseMail']?>" maxlength="100" required/> </p>

        <br/>
        <label for= "numDeTelephone"> Votre numéro de téléphone : </label>
        <input type="tel" name="numDeTelephone" id="numDeTelephone" placeholder="<?= $_SESSION['numDeTelephone']?>" maxlength="10" required/> </p>

        <br />
        <label for="motDePasse"> Votre mot de passe : </label>
        <input type="password" name="motDePasse" id="motDePasse" placeholder="Entrez un nouveaux Mot de Passe" size="26" maxlength="30" required/>


        <br />
        <input type="submit" value="Modifier" />
    </fieldset>


</form>