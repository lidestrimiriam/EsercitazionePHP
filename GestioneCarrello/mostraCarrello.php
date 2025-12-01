<?php
    session_start();

    $prodotti = json_decode(file_get_contents("oggetti.json"), true);


    if (!isset($_SESSION["carrello"]) || empty($_SESSION["carrello"])) {
        echo "<h2>Il carrello è vuoto</h2>";
        echo '<a href="oggetti.php">Torna ai prodotti</a>';
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["quantita"])) {
    foreach ($_POST["quantita"] as $id => $q) {
        $q = intval($q);
            if ($q > 0) {
                $_SESSION["carrello"][$id] = $q;
            } else {
                unset($_SESSION["carrello"][$id]);
            }   
        }
        header("Location: mostraCarrello.php");
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
    <h1>CARRELLO:</h1>

    <form action="mostraCarrello.php" method="POST">
    <?php foreach ($_SESSION["carrello"] as $id => $quantita): ?>
        <?php 
            foreach ($prodotti as $p) {
                if ($p["id"] == $id) {
                    echo "<p><strong>" . $p["nome"] . "</strong> (" . $p["categoria"] . ") — Quantità: " . $quantita . "</p>";
                    echo ' — Quantità: <input type="number" name="quantita['.$id.']" value="'.$quantita.'" min="0">';
                    echo '</p>';
                }
            }
        ?>
    <?php endforeach; ?>
    <button type="submit">Aggiorna / Ricarica Carrello</button>
    </form>

    <br>
    <form action="oggetti.php">
    <button type="submit">Torna ai prodotti</button>
</form>

</body>
</html>


