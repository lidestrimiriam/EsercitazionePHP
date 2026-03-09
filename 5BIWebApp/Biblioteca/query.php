<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>ETA PERSONE</title>
</head>
<body>


<?php
$conn = mysqli_connect("localhost","root","","Biblioteca");

if(isset($_GET['eta'])){
    $eta = $_GET['eta'];

    $query = "SELECT nome,cognome,eta FROM Utente WHERE eta = $eta";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
        while($riga = mysqli_fetch_assoc($result)){
            echo "Nome: ".$riga['nome']."<br>";
            echo "Cognome: ".$riga['cognome']."<br>";
            echo "Eta: ".$riga['eta']."<br><br>";
        }
    } else {
        echo "Nessun utente trovato";
    }
}
?>

</body>
</html>