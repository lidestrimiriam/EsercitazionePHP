<?php
 function divisione($a, $b){
        $somma = 1;
        foreach($a, $b as $n){
            $somma = $somma / $n;
        }
        return $somma;
    }
?>