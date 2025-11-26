<?php
    session_start();

    $prodotti = json_decode(file_get_contents("prodotti.json"), true);

    if (!isset($_SESSION["carrello"])) {
        $_SESSION["carrello"] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
        $id = $_POST["id"];

        if (!isset($_SESSION["carrello"][$id])) {
            $_SESSION["carrello"][$id] = 1;
        } else {
            $_SESSION["carrello"][$id]++;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prodotti</title>
</head>
<body>
    <h2>PRODOTTI:</h2>
    

    <form action = "mostraCarrello" method = "POST">
    <button type="submit">Mostra Carrello</button>
    </form>

    
</body>
</html>