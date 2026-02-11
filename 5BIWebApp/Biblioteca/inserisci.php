<?php

$conn = mysqli_connect("localhost", "root", "","Biblioteca");

$cf = $_POST['cf'];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$eta = $_POST['eta'];

$query = "INSERT INTO Utente (cf, nome, cognome, email, eta) 
VALUES ($cf, '$nome', '$cognome', '$email', $eta)"

$result = mysqli_query($con, $query);
?>
