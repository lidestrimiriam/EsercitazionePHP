  <?php
    session_start();
    $login = $_POST["login"];
    $password = $_POST["password"];
    

    $utente = json_decode(file_get_contents("utente.json"), true);

    $successo = false;
    $dati = [];


    if ($utente["login"] == $login && $utente["password"] == $password) {
     $successo = true;
     $dati = $utente;
    }


    if ($successo) {
        $_SESSION["utente"] = $dati;
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
    <label for = "cognome"></label>
    <input type = "text" name = "cognome" required>
    
    <button type="submit">Registrati</button>
    <p id = "testo"></p>

  

</body>
</html>