<?php
session_start();

$prodotti = json_decode(file_get_contents("oggetti.json"), true);

// SE IL CARRELLO È VUOTO
if (!isset($_SESSION["carrello"]) || empty($_SESSION["carrello"])) {
    echo '<!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Carrello Vuoto</title>
    </head>
    <body class="bg-light d-flex justify-content-center align-items-center vh-100">
        <div class="card p-5 shadow-lg text-center" style="border-radius:20px; max-width:450px;">
            <h2 class="text-danger mb-3">Il carrello è vuoto</h2>
            <a href="oggetti.php" class="btn btn-primary mt-2">Torna ai prodotti</a>
        </div>
    </body></html>';
    exit;
}


// AGGIORNA QUANTITÀ CARRELLO
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
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrello</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
<h1 class="text-center text-primary mb-4">CARRELLO</h1>

<form action="mostraCarrello.php" method="POST">
<div class="row g-4">

<?php foreach ($_SESSION["carrello"] as $id => $quantita): ?>
<?php foreach ($prodotti as $p): if ($p["id"] == $id): ?>

<div class="col-md-6">
<div class="card shadow-sm p-3" style="border-radius: 15px;">
    <h4 class="text-primary fw-bold"><?= $p["nome"] ?></h4>
    <p class="text-muted mb-1">Categoria: <?= $p["categoria"] ?></p>
    <p><strong>Quantità attuale:</strong> <?= $quantita ?></p>

    <label class="fw-semibold">Modifica quantità:</label>
    <input type="number" name="quantita[<?= $id ?>]" value="<?= $quantita ?>" min="0" class="form-control w-50 mb-2">
</div>
</div>

<?php endif; endforeach; ?>
<?php endforeach; ?>

</div>

<div class="text-center mt-4">
<button type="submit" class="btn btn-warning px-4 py-2">Aggiorna Carrello</button>
</div>
</form>

<div class="text-center mt-4">
<form action="oggetti.php">
<button type="submit" class="btn btn-success px-4 py-2">Torna ai prodotti</button>
</form>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
ree
