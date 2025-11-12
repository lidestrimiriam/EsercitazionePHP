<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio2 Cookie</title>

</head>
<body>

    <form action = "credenziali.php" method = "POST">

    <label for = "nome">inserisci il nome</label>
    <input type = "text" name = "nome">
    <label for = "cognome">inserisci il cognome</label>
    <input type = "text" name = "cognome">
    <label for = "font">inserisci il font</label>
    <input type = "text" name = "font">
    <label for = "colore">inserisci il colore</label>
    <input type = "color" name = "colore">
    <label for = "sfondo">inserisci uno sfondo</label>
    <input type = "color" name = "sfondo">

    <button type = "submit">Invia</button>
    </form>

    <?php
    if (isset($_COOKIE["nome"]) && isset($_COOKIE["cognome"]) && isset($_COOKIE['personalizzazione'])) {
    
    $personalizzazione = explode("|", $_COOKIE["personalizzazione"]);
    $font = $personalizzazione[0];
    $coloreTesto = $personalizzazione[1];
    $coloreSfondo = $personalizzazione[2];
    $nome = $_COOKIE["nome"];
    $cognome = $_COOKIE["cognome"];
    ?>

</body>
</html>