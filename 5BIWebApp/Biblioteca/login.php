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
$conn = mysqli_connect("localhost","root","","Biblioteca");

if(isset($_POST['email'] && $_POST['psw'])){
    $email = $_POST['email'];
    $psw= $_POST['psw'];
    
    $query = "SELECT * FROM Utente WHERE email = '$email' AND '$psw'";
    $result = mysqli_query($conn,$query);
}



?>









</body>
</html>