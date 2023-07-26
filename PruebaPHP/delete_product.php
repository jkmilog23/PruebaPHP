<!DOCTYPE html>
<html>
<head>
<center>
    <title>Eliminar Producto por Nombre</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Eliminar Producto por Nombre</h1>
    
    <?php
    // Verificar si se ha enviado el nombre del producto a eliminar
    if (isset($_POST["nombre"])) {
        // Obtener el nombre del producto desde el formulario
        $nombre_producto = $_POST["nombre"];

        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "phpDB"; 

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta para eliminar el producto por nombre
        $sql = "DELETE FROM productos WHERE Name = '$nombre_producto'";
        $result = $conn->query($sql);

        if ($conn->affected_rows > 0) {
            echo "El producto ha sido eliminado exitosamente.";
        } else {
            echo "Producto no encontrado o no se pudo eliminar.";
        }

        // Cerrar la conexión
        $conn->close();
    } else {
        // Formulario para ingresar el nombre del producto a eliminar
        echo '<form action="delete_product.php" method="post">';
        echo '<label for="nombre">Nombre del producto:</label>';
        echo '<input type="text" id="nombre" name="nombre" required>';
        echo '<input type="submit" value="Eliminar Producto">';
        echo '</form>';
    }
    ?>

    <!-- Botón de "Volver" para regresar a la página de inicio de sesión -->
    <a href="product_menu.php">Volver</a>
</center>
</body>
</html>
