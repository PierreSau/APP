<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 2019-03-26
 * Time: 13:11
 */
/**
 * Vue : des pièces
 */
?>

<?php require('header.php'); ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo $title; ?></title>

        <style>
            h1 {
                color:gray;
            }
            .boite{
                display: grid;
                width: 100%;
                grid-template-columns: repeat(5, 1fr);
                grid-auto-rows: 110px;
                grid-column-gap: calc(2% - 15px);
                grid-row-gap: 10px;
            }
        </style>
    </head>
<body>
<?php foreach ($liste as $element) { ?>

    <div class="boite"> <?php echo $element['name']; ?> </div>
    <header>
        <h1><?php echo $title; ?></h1>
    </header>

<?php } ?>
<?php require('footer.php'); ?>