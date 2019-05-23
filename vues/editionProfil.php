

<form method="post" action="">

    <fieldset>
        <label for= "nom"> Votre Nom : </label>
        <input type="text" name="nom" id="nom" value="<?= $_SESSION['nom']?>" maxlength="30" required/> </p>

        <br />
        <label for= "prenom"> Votre Prénom : </label>
        <input type="text" name="prenom" id="prenom" value="<?= $_SESSION['prenom']?>" maxlength="30" required/> </p>

        <br/>
        <label for= "adresseMail"> Votre e-mail : </label>
        <input type="email" name="adresseMail" id="adresseMail" value="<?= $_SESSION['adresseMail']?>" maxlength="100" required/> </p>

        <br/>
        <label for= "numDeTelephone"> Votre numéro de téléphone : </label>
        <input type="tel" name="numDeTelephone" id="numDeTelephone" value="<?= $_SESSION['numDeTelephone']?>" maxlength="10" required/> </p>


        <br />
        <input type="submit" value="Modifier" />
    </fieldset>


</form>