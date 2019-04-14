<?php

include('modele/requetes.faq.php');

$faq=recupererFAQ();

include ('vues/header.php');
include ('vues/faq.php');
include ('vues/footer.php');
