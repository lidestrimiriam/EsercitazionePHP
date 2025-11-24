<?php
    session_start();
    
    if(!isset($_SESSION["carrello"])){
        $_SESSION["carrello"] = [];
    }

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
   
        if (!in_array($id, $_SESSION['carrello'])) {
            $_SESSION['carrello'][] = $id;
        }
    }

    $oggetti = json_decode(file_get_contents('oggetti.json'), true);


    $categoria = [];
    foreach ($oggetti as $oggetto) {
        $categoria[$oggetto["categoria"]][] = $oggetto;
    }

    foreach ($categorie as $nomeCategoria => $oggettiCategoria)


?>