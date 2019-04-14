<?php
/*switch($_POST['fonction']){
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
}*/
$choixType = 'la panne numéro #1948'
?>

<html>

<body>
<p class="panne-texte">

    Le problème concernant <?php echo $choixType ?> a bien été signalé à un technicien le <?php echo date('d-m-Y'); ?>
    à <?php echo date('H:i'); ?>.

    Vous allez recevoir un mail de confirmation puis un technicien vous contactera via la messagerie à
    l'adresse <?php echo 'exemple@adresse.com'; //recupererEmail($bdd); ?>.

</p>

</body>
</html>
