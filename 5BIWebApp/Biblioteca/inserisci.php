<?php

$conn = mysqli_connect("localhost", "root", "", "Biblioteca");

$cf = $_POST['cf'];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$eta = $_POST['eta'];

$query = "INSERT INTO Utente (cf, nome, cognome, email, eta) 
VALUES ($cf, '$nome', '$cognome', '$email', $eta)";

$result = mysqli_query($conn, $query);

if($result){
    echo "Inserimento riuscito";
}else{
    echo "Errore: " . mysqli_error($conn);
}

mysqli_close($conn);
?>