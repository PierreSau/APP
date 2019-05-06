<?php

include 'modele/panne.php';
if(empty($_POST['choix'])){ // si le bouton valider est appuyé alors ce champs n'est plus vide donc déclenche la suite
    $function = 'AccueilPanne';
}
else{
    $function = 'ValidationChoix';
}

switch ($function){
    case 'AccueilPanne':
        $vue = 'panne';
        $title = 'Déclaration d\'une panne';
        break;
    case 'ValidationChoix':
        $vue = 'panne2';
        $title = 'Problème déclaré';
        ajoutePanne($bdd,$_POST['choix']);
        //Parametrage de l'envoi du mail de confirmation
        $header="MIME-Version: 1.0"."\n";
        $header.='From:"SAV EcoM"<ConcactService.EcoM@gmail.com>'."\n";
        $header.="Reply-to: \"EcoM\" <ConcactService.EcoM@gmail.com>"."\n";
        $header.='Content-Type:text/html; charset="utf-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $message='
<html>
	<body>
		<divalign="center">
			Votre déclaration de panne a bien été prise en compte.</br>
			Cordialement, </br>
			Le SAV EcoM
		</div>
	</body>
</html>
';
        $mail=recupererEmail($bdd);

        $Objet='EcoM: Déclaration reçue';
        mail($mail,$Objet, $message, $header);
        switch($_POST['choix']){
            case 'pbCapteur':
                $choixType='un capteur';
                break;
            case 'pbCemac':
                $choixType='un Cemac';
                break;
            case 'valAbs':
                $choixType='des valeurs absurdes relevées';
                break;
            case 'autre':
                $choixType='un problème non notifié';
        }
        break;


}
include('vues/header.php');
include('vues/' . $vue . '.php');
include('vues/footer.php');







