<?php
function sottrazione($a, $b){
        $sottrazione = 0;
        if($a >= $b){
            $sottrazione = $a - $b;
        }else{
            echo "<h3>la differenza è negativa</h3>";
        }
        return $sottrazione;
    }
?>