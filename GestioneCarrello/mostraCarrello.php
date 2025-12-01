<?php
    session_start();

    $prodotti = json_decode(file_get_contents("oggetti.json"), true);


    if (!isset($_SESSION["carrello"]) || empty($_SESSION["carrello"])) {
        echo "<h2>Il carrello è vuoto</h2>";
        echo '<a href="prodotti.php">Torna ai prodotti</a>';
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
</head>
<body>
    <h2>Carrello:</h2>

    <?php foreach ($_SESSION["carrello"] as $id => $quantita): ?>
    <?php 
        foreach ($prodotti as $p) {
            if ($p["id"] == $id) {
                echo "<p><strong>{$p["nome"]}</strong> ({$p["categoria"]}) — Quantità: $quantita</p>";
            }
        }
    ?>
    <?php endforeach; ?>

<form action="oggetti.php">
    <button type="submit">Torna ai prodotti</button>
</form>

</body>
</html>


