<?php
$nomeFile = "file.json";
if(!file_exists($nomeFile)){
    die("XoX");
}else{
    $json = file_get_contents($nomeFile);
    $array = json_decode($json, true);
    //rappresentazione oggetto
    $nuovoUtente = ["login" => "miriam", "password" => "miri007"];
    //aggiungere
    $array[] = $nuovoUtente;
    
    foreach($array as $utente){
    echo("<p>");
        foreach($utente as $k => $v){
            echo("$k: $v</br>");
        }
    echo("</p>");
    }
   
    



}







?>