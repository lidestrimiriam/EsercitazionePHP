<?php
    function somma($parametri[]){
        $somma = 0;
        foreach($parametri as $n){
            $somma = $somma + $n;
        }
        return $somma;
    }

    function moltiplicazione($parametri[]){
        $somma = 1;
        foreach($parametri as $n){
            $somma = $somma * $n;
        }
        return $somma;
    }

?>