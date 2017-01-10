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
    echo $result;




                function almelo($steden_info){

                    $steden_info = array();

                }

                almelo();


                $ding = 1;


                switch ($ding){

                    case 1:
                        echo "oh crap";
                        break;

                    case 2:
                        break:

                    default:
                        echo "you suck";
                        break;
                }
?>

