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
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Prodotti</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">


<div class="container py-5">
<h1 class="text-center mb-4 text-primary fw-bold">PRODOTTI</h1>


<div class="row g-4">
<?php foreach ($prodotti as $p): ?>
<div class="col-md-4">
<div class="card shadow-sm h-100" style="border-radius: 15px;">
<div class="card-body">
<h3 class="card-title fw-bold text-primary"><?= $p["nome"] ?></h3>
<h6 class="text-muted">ID: <?= $p["id"] ?></h6>
<p class="card-text"><strong>Categoria:</strong> <?= $p["categoria"] ?></p>


<form action="" method="POST">
<input type="hidden" name="id" value="<?= $p["id"] ?>">
<button type="submit" class="btn btn-primary w-100 mt-2">Aggiungi al carrello</button>
</form>
</div>
</div>
</div>
<?php endforeach; ?>
</div>


<div class="text-center mt-5">
<form action="mostraCarrello.php" method="POST">
<button type="submit" class="btn btn-success px-4 py-2">Mostra Carrello</button>
</form>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>