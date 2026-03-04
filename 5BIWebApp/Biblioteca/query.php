<?php

if(isset($_POST['eta'])){

    $eta = $_POST['eta'];


    $conn = new mysqli("localhost", "root", "", "Biblioteca");

    if ($conn->connect_error) {
        die("Errore connessione: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM Utente WHERE eta = ?");
    $stmt->bind_param("i", $eta);
    $stmt->execute();
    $risultato = $stmt->get_result();

    echo "<h2>Risultati ricerca</h2>";

    if($risultato->num_rows > 0){

        while($riga = $risultato->fetch_assoc()){
            echo "CF: " . $riga["cf"] . "<br>";
            echo "Nome: " . $riga["nome"] . "<br>";
            echo "Cognome: " . $riga["cognome"] . "<br>";
            echo "Email: " . $riga["email"] . "<br>";
            echo "<hr>";
        }

    } else {
        echo "Nessun utente trovato con questa età.";
    }

    $stmt->close();
    $conn->close();
}
?>