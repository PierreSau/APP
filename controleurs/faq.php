<?php

include('./modele/requetes.faq.php');

$faq=recuperefaq();

include ('./vues/header.php');
include ('./vues/faq.php');
include ('./vues/footer.php');
