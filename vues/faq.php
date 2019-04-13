<!DOCTYPE html>


<html>
<meta charset="utf-8">
<head>
    <link rel="stylesheet" href="vues/stylefaq.css">
    <title> FAQ </title>
</head>

<body>
<h1>
Questions les plus demandées
</h1>
<?php


$i=0;
while ($donnees = $faq->fetch())
{
    $i+=1;

echo '<section class="faq-section">';
    echo" <input type=\"checkbox\"   id=\"$i\" >";
    echo"<label for=\"$i\" > ";
    print($donnees['question']);
    echo" </label>";
    echo"<p>";
    print($donnees['reponse']);
    echo"</p>";
echo"</section>";

}

$faq->closeCursor(); // Termine le traitement de la requête

?>

</body>
</html>
