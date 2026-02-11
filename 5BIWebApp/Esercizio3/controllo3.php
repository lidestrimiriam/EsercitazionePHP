<html>
<head>
  <title>Controllo credenziali</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h1>Controllo credenziali</h1>
<?php
$login = $_GET["login"];
$password = $_GET["password"];

$utenti = json_decode(file_get_contents('utenti.json'), true);

$successo = false;
$dati = [];

foreach ($utenti as $utente) {
    if ($utente["login"] == $login && $utente["password"] == $password) {
        $successo = true;
        $dati = $utente;
        break;
    }
}

if ($successo) {
    echo "<div class='alert alert-success'>Accesso consentito</div>";
    echo "<p>Login: " . htmlspecialchars($login) . "</p>";
    echo "<p>Password: " . htmlspecialchars($password) . "</p>";
    echo "<p>Nome: " . htmlspecialchars($dati['nome']) . "</p>";
    echo "<p>Cognome: " . htmlspecialchars($dati['cognome']) . "</p>";
    echo "<p>Email: " . htmlspecialchars($dati['email']) . "</p>";
} else {
    echo "<div class='alert alert-danger'>Login o password errati</div>";
}
?>
</div>
</body>
</html>