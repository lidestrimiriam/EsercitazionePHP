  <?php
    session_start();
    $login = $_POST["login"];
    $password = $_POST["password"];

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
        $_SESSION['utente'] = $dati;
        echo "Login riuscito";
    } else {
        echo "Login fallito";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>LOGIN</h2>

    <label for = "login"></label>
    <input type = "text" name = "login" required>
    <br>
    <label for = "password"></label>
    <input type = "text" name = "password" required>
    
    <button type="submit">Accedi</button>

  

</body>
</html>