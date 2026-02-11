<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST"){
$login = $_POST["login"];
$password = $_POST["password"];
}


$utente = json_decode(file_get_contents("utente.json"), true);


$successo = false;
$dati = [];


if ($utente["login"] == $login && $utente["password"] == $password) {
$successo = true;
$dati = $utente;
}
?>


<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
<div class="card shadow-lg p-4" style="width: 400px; border-radius: 20px;">
<h2 class="text-center mb-4 text-primary">LOGIN</h2>


<form action="oggetti.php" method="POST">
<div class="mb-3">
<label for="login" class="form-label">Inserisci username:</label>
<input type="text" name="login" class="form-control" required>
</div>


<div class="mb-3">
<label for="password" class="form-label">Inserisci password:</label>
<input type="password" name="password" class="form-control" required>
</div>


<button type="submit" class="btn btn-primary w-100">Accedi</button>


<p id="testo" class="text-danger fw-bold mt-3"></p>
</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>