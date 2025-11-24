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


    $categorie = [];
    foreach ($oggetti as $oggetto) {
        $categorie[$oggetto["categoria"]][] = $oggetto;
    }

    foreach ($categorie as $nomeCategoria => $oggettiCategoria)


?>