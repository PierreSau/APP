<?php echo AfficheAlerte($alerte); ?>

<div class = accueil>
<form method="post" action="" class="accueilFond">

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

        <br />
        <label for="motDePasseVerif"> Vérification du  mot de passe : </label>
        <input type="password" name="motDePasseVerif" id="motDePasseVerif" placeholder="Entrez de nouveau votre mot de passe" size="26" maxlength="30" required/>

        <br/>
        <label for="CGU">J'accepte les <a href="index.php?cible=utilisateurs&fonction=conditionGene"> conditions générales d'utilisation  </a> </label> <input type="checkbox" name="CGU" id="CGU" required/>

        <br />
        <input type="submit" value="S'inscrire" />
    </fieldset>


</form>


<form method="post" action="" class="accueilFond">

    <fieldset class="connexion">

        <br/>
        <label for= "adresseMail2"> Votre e-mail : </label>
        <input type="email" name="adresseMail2" id="adresseMail2" placeholder="Entrez votre e-mail ici" maxlength="100" required/> </p>


        <br />
        <label for="motDePasse2"> Votre mot de passe : </label>
        <input type="password" name="motDePasse2" id="motDePasse2" placeholder="Entrez votre mot de passe ici" size="26" maxlength="30" required/>


        <br />
        <input type="submit" value="Connexion" />
    </fieldset>


</form>
</div>
