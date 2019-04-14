<?php
/**
 * Vue : inscrire un nouvel utilisateur
 */
?>

<?php// echo AfficheAlerte($alerte); ?>

<link rel="stylesheet" href="inscription.css"/>
<body>
<p> Création d'un compte : </p>
<form method="post" action="">

    <fieldset>
        <label for= "nom"> Votre Nom : </label>
        <input type="text" name="nom" id="nom" placeholder="Entrez votre nom ici" maxlength="30" required/> </p>

        <br />
        <label for= "prenom"> Votre Prénom : </label>
        <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prenom ici" maxlength="30" required/> </p>

        <br/>
        <label for= "adresseMail"> Votre e-mail : </label>
        <input type="email" name="adresseMail" id="adresseMail" placeholder="Entrez votre e-mail ici" maxlength="100" required/> </p>

        <br/>
        <label for= "numDeTelephone"> Votre numéro de téléphone : </label>
        <input type="tel" name="numDeTelephone" id="numDeTelephone" placeholder="Entrez votre numéro de téléphone ici" maxlength="10" required/> </p>

        <br />
        <label for="motDePasse"> Votre mot de passe : </label>
        <input type="password" name="motDePasse" id="motDePasse" placeholder="Entrez votre mot de passe ici" size="26" maxlength="30" required/>

        <br/>
        <label for="CGU">J'accepte les conditions générale d'utilisation</label> <input type="checkbox" name="CGU" id="CGU" required/>

        <br />
        <input type="submit" value="S'inscrire" />
    </fieldset>


</form>

<p><a href="index.php">Retour</a></p>
</body>