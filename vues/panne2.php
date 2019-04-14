<?php
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
?>

<html >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylepagepanne.css" />

    <title>Déclaration d'une panne</title>
</head>
<body>
<p>
    <h2>
    Le problème concernant <?php echo $choixType?> a bien été signalé à un technicien le <?php echo date('d-m-Y'); ?> à <?php echo date('H:i');?>.
    </h2>
    <h3>
        Vous allez recevoir un mail de confirmation puis un technicien vous contactera via la messagerie à l'adresse <?php echo recupererEmail($bdd); ?>.
    </h3>

</p>

</body>
</html>
