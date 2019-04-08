<?php
/**
* Vue : inscrire un nouvel utilisateur
*/
?>

<?php echo AfficheAlerte($alerte); ?>

<p> Création d'un compte : </p>

<form method="post" action="inscription.php">

    <fieldset>
    <label for= "nom"> Votre Nom : </label>
    <input type="text" name="nom" id="nom" placeholder="Entrez votre nom ici" maxlength="30" required/> </p>

    <br />
    <label for= "prénom"> Votre Prénom : </label>
    <input type="text" name="prénom" id="prénom" placeholder="Entrez votre prénom ici" maxlength="30" required/> </p>

    <br/>
    <label for= "email"> Votre e-mail : </label>
    <input type="email" name="email" id="email" placeholder="Entrez votre e-mail ici" maxlength="100" required/> </p>

    <br/>
    <label for= "tel"> Votre numéro de téléphone : </label>
    <input type="tel" name="tel" id="tel" placeholder="Entrez votre numéro de téléphone ici" maxlength="10" required/> </p>

    <br />
    <label for="mdp"> Votre mot de passe : </label>
    <input type="password" name="mdp" id="mdp" placeholder="Entrez votre mot de passe ici" size="26" maxlength="30" required/>

    <br/>
        <label for="CGU">J'accepte les conditions générale d'utilisation</label> <input type="checkbox" name="CGU" id="CGU" required/>

    <br />
        <input type="submit" value="Envoyer" />
    </fieldset>


</form>

<p><a href="index.php">Retour</a></p>