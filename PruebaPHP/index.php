<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla principal </title>
</head>
<body>
    <?php
        include_once ("connection.php");
        // Crea una instancia de Cconnection
        $connectionObj = new Cconnection();

        // Intenta establecer la conexión con la base de datos
        try {
            $conn = $connectionObj->ConnectionBD();
            } 
        catch (Exception $e) {
            echo $e->getMessage();
            // Realiza alguna acción adicional en caso de un fallo en la conexión
}
    ?>
</body>
</html>