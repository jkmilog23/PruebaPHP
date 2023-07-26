<!DOCTYPE html>
<html>
<head>
    <center><h1>Editar Producto por Nombre</h1>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    
    
    <?php
    // Verificar si se ha enviado el nombre del producto a editar
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

        // Consulta para obtener los datos del producto a editar por nombre
        $sql = "SELECT * FROM productos WHERE Name = '$nombre_producto'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $producto = $result->fetch_assoc();

            // Formulario para editar el producto
            echo '<form action="edit_product.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $producto["ID"] . '">';

            echo '<label for="Name">Nombre del producto:</label>';
            echo '<input type="text" id="Name" name="Name" value="' . $producto["Name"] . '" required><br>';

            echo '<label for="Ref">Referencia:</label>';
            echo '<input type="text" id="Ref" name="Ref" value="' . $producto["Ref"] . '" required><br>';

            echo '<label for="Price">Precio:</label>';
            echo '<input type="number" id="Price" name="Price" value="' . $producto["Price"] . '" required><br>';

            echo '<label for="Weight">Peso:</label>';
            echo '<input type="number" id="Weight" name="Weight" value="' . $producto["Weight"] . '" required><br>';

            echo '<label for="Category">Categoría:</label>';
            echo '<input type="text" id="Category" name="Category" value="' . $producto["Category"] . '" required><br>';

            echo '<label for="stock">Stock:</label>';
            echo '<input type="number" id="stock" name="stock" value="' . $producto["Stock"] . '" required><br>';

            echo '<label for="Creation_Date">Fecha de creación:</label>';
            echo '<input type="date" id="Creation_Date" name="Creation_Date" value="' . $producto["Creation_Date"] . '" required><br>';

            echo '<input type="submit" value="Guardar Cambios">';
            $sql = "SELECT * FROM productos WHERE Name = '$nombre_producto'";
            $result = $conn->query($sql);
            echo '</form>';
        } else {
            echo "Producto no encontrado.";
        }

        // Cerrar la conexión
        $conn->close();
    } else {
        // Formulario para ingresar el nombre del producto a editar
        echo '<form action="edit_product.php" method="post">';
        echo '<label for="nombre">Nombre del producto:</label>';
        echo '<input type="text" id="nombre" name="nombre" required>';
        echo '<input type="submit" value="Buscar Producto">';
        echo '</form>';
    }
    ?>

    <!-- Botón de Volver-->
    <a href="product_menu.php">Volver</a>
</center>
</body>
</html>
