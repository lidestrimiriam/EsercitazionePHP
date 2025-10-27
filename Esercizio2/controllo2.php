
<html>
    <head>
     <title>Esercitazione GET</title>
    </head>
    <body>
        <h1>CONTROLLO CREDENZIALI</h1>
        <?php 
        $login = $_GET["login"];
        $password = $_GET[$login];
        if($json [$login] === $_GET["password"])
            echo("<p> Accesso consentito</p>");
        else 
           echo("<p> Accesso negato</p>"); 
        ?>
    </body>
</html>