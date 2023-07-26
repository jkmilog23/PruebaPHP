<?php
class Cconnection {

    function ConnectionBD(
        $host = 'localhost',
        $dbname = 'phpDB',
        $username = 'root',
        $password = ''
    ) {
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            echo "Se ha conectado correctamente a la base de datos";
            return $conn;
        } catch (PDOException $exp) {
            throw new Exception("No se logró conectar correctamente con la base de datos: $dbname, error: $exp");
        }
    }
}
?>