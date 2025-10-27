<?php

$path = "utenti.json";
if(!file_exists($path))
    die("errore il file non esiste");
else{
    //leggere contenuto
    $json = file_get_contents("utenti.json");
    //var_dump($contenuto);
    $dati = json_decode($json, true);
    //var_dump($dati);
    foreach($dati as $valore){
        echo("<p>");
        foreach($valore as $k => $v){
            echo("$k: $v</br>");
        }
     echo("</p>");

    }
}

?>

?>