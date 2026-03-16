<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>

     <form method="POST">
        Email: <input type="number" name="email"><br>
        Password: <input type="number" name="psw"><br>
        <input type="submit" value="Invia dati">
    </form>
    
<?php
session_start();

$conn = mysqli_connect("localhost", "root", " ", "Biblioteca");

if(isset($_POST["email"]) && isset($_POST["psw"])){
    $email = $_POST["email"];
    $psw = $_POST["psw"];

    $query = ("SELECT * FROM Utente WHERE email = ? AND psw = ?");

    if($stmt = $conn -> prepare($query)){
        $stmt -> bind_param("ss", $email, $psw);
        $stmt -> execute();
        $result = $stmt -> get_result();
    }

    

}

?>







</body>
</html>