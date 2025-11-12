<?php
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$font = $_POST["font"];
$colore = $_POST["colore"];
$sfondo = $_POST["sfondo"];

$personalizzazione = $font . '|' . $coloreTesto . '|' . $coloreSfondo;

setcookie("nome", $nome, time() + 86400, "/");
setcookie("cognome", $cognome, time() + 86400, "/");
setcookie("personalizzazione", $personalizzazione, time() + 86400, "/");


?>