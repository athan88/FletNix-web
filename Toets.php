<?php

    $auto = array(
        array("opel", "kadet", 50),
        array("volvo", "s40", 50),
        array("Tesla","X", 50000)
    );

    foreach($auto as $soort){
        echo "<br>";
        foreach($soort as $specificatie) {
                echo " $specificatie";
        };
    };

    $x = 15;
    $y = 4;
    $result = fmod($x,$y);
    echo $result


    ?>

