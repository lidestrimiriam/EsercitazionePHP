<?php
 function divisione($a, $b){
        $divisione = 0;
        if($b != 0){
            $divisione = $a / $b;
        }else{
            echo "<h3>il numeratore non si può dividere</h3>";
        }
        return $divisione;
    }
?>