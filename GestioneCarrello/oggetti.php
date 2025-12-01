<?php
    session_start();

    $prodotti = json_decode(file_get_contents("oggetti.json"), true);

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
    <h1>PRODOTTI:</h1>

  <?php foreach ($prodotti as $p): ?>
    <div style="margin-bottom: 10px;">
        <b>ID:</b><?= $p["id"] ?> 
        <b>Nome:</b><?= $p["nome"] ?>
        <b>Categoria:</b><?= $p["categoria"] ?>
       
        <form action="" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $p["id"] ?>">
            <button type="submit">Aggiungi al carrello</button>
        </form>
    </div>
    <?php endforeach; ?>

    <br>
    <form action = "mostraCarrello.php" method = "POST">
    <button type="submit">Mostra Carrello</button>
    </form>

    
</body>
</html>