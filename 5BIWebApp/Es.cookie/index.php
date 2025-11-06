<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esercizio Cookie</title>

</head>
<body>

 <?php
    if(isset($_COOKIE["utente"])){
       echo "Benvenuto!";
       echo '<a href = "delete-cookie.php"> Elimina cookie</a>';
    }else{
      echo '
       <form action = "set-cookie.php" method = "POST">
       <label for = "nome">Inserisci il tuo nome</lable>
       <input type = "text" name = "nome">
      ';
    }


  ?>

  </form>


</body>
</html>
