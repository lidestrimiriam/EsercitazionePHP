<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>

     <form action = "login.php" method="POST">
        Email: <input type="text" name="email"><br>
        Password: <input type="text" name="psw"><br>
        <input type="submit" value="Invia dati">
    </form>
    
<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "Biblioteca");

if(isset($_POST["email"]) && isset($_POST["psw"])){
    $email = $_POST["email"];
    $psw = $_POST["psw"];

    $query = ("SELECT cf FROM Utente WHERE email = ? AND psw = ?");

    if($stmt = $conn -> prepare($query)){
        $stmt -> bind_param("ss", $email, $psw);
        $stmt -> execute();
        $result = $stmt -> get_result();
    }

    if($result -> num_rows > 0){
        $riga = $result -> fetch_assoc();
        $_SESSION["id_utente"] = $riga["cf"];
        echo "<a href = 'mostra.php'> Vai a Mostra</a>";
    }

}

?>







</body>
</html>