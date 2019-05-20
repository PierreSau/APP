<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 2019-05-20
 * Time: 10:08
 */
?>
<html>
<head>
    <h1>
        Statistiques énergetiques de votre maison
    </h1>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="vues/stat.css"/>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

<body>


    <div>
        <ul class="container">
            <?php

            $tab = [1,2,3];
            for ($x = 1; $x<=sizeof($ArrayPiece); $x++){
            ?>
            <li class="item" id="myBtn<?php echo $x?>"><a> Pièce<?php echo $x?> </a>
            </li>
                <!-- Trigger/Open The Modal -->

                <!-- The Modal -->
                <div id="myModal<?php echo $x?>" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close"></span>
                        <ul class="sous-menu">
                            <li><a ><?php //print_r($ArrayConso[$x-1]);
                                    print_r($ArrayConso[$x-1][0][0]);?></a></li>
                            <li><a >Stat 2</a></li>
                            <li><a >Stat 3</a></li>
                            <li><a >Stat 4</a></li>
                            <li><a >Stat 1</a></li>
                            <li><a >Stat 2</a></li>
                            <li><a >Stat 3</a></li>
                            <li><a >Stat 4</a></li>
                        </ul>
                    </div>

                </div>
                <script>


                    // Get the modal
                    var modal = document.getElementById('myModal<?php echo $x?>');

                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn<?php echo $x?>");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on the button, open the modal
                    btn.onclick = function() {
                        modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>

                <?php
            }

            ?>

        </ul>
    </div>
    <div id="myDiv"></div>
       <script>
           myDiv=document.getElementById('myDiv')
           trace =
               {
                   x: ['Salon','SdB','Cuisine'],
                   y: [23,45,38],
                   type: 'bar'
               };
           data =[trace];

           Plotly.newPlot(myDiv, data);

       </script>


    <?php echo $ArrayCat ?>




</body>

</html>