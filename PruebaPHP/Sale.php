<!DOCTYPE html>
<html>
<head>
<center>
    <title>Realizar Venta</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Realizar Venta</h1>

    <?php
    // Verificar si se ha enviado el formulario de venta
    if (isset($_POST["id"]) && isset($_POST["cantidad"])) {
        // Obtener el ID del producto y la cantidad a vender desde el formulario
        $producto_id = $_POST["id"];
        $cantidad_vendida = intval($_POST["cantidad"]);

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

        // Obtener el stock actual del producto
        $sql = "SELECT Stock FROM productos WHERE ID = $producto_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stock_actual = $row["Stock"];

            if ($stock_actual >= $cantidad_vendida) {
                // Calcular el nuevo stock después de la venta
                $nuevo_stock = $stock_actual - $cantidad_vendida;

                // Actualizar el stock del producto en la base de datos
                $sql = "UPDATE productos SET Stock = $nuevo_stock WHERE ID = $producto_id";
                $conn->query($sql);

                // Verificar si ya existe un registro en la tabla de ventas para el producto con el ID especificado
                $sql = "SELECT Sale_Qty FROM ventas WHERE ID_Product = $producto_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Si ya existe un registro, obtener la cantidad previamente vendida y sumar la cantidad actual
                    $row = $result->fetch_assoc();
                    $cantidad_previa = $row["Sale_Qty"];
                    $nueva_cantidad = $cantidad_previa + $cantidad_vendida;

                    // Actualizar la cantidad vendida en la tabla de ventas
                    $sql = "UPDATE ventas SET Sale_Qty = $nueva_cantidad WHERE ID_Product = $producto_id";
                    $conn->query($sql);

                    echo "Venta realizada exitosamente. Cantidad vendida actualizada: $nueva_cantidad<br>";
                    echo "Venta realizada exitosamente. Stock actualizado: $nuevo_stock<br>";
                } else {
                    // Si no existe un registro, realizar una nueva inserción en la tabla de ventas
                    // Insertar el registro en la tabla de ventas (ID_Sale será igual a ID_Product)
                    $fecha_venta = date("yyyy-mm-dd"); // Fecha actual
                    $sql = "INSERT INTO ventas (ID_Product, ID_Sale, Sale_Qty, Sale_Date) VALUES ($producto_id, $producto_id, $cantidad_vendida, '$fecha_venta')";
                    $conn->query($sql);

                    echo "Venta realizada exitosamente. Cantidad vendida actualizada: $nueva_cantidad<br>";
                    echo "Venta realizada exitosamente. Stock actualizado: $nuevo_stock<br>";
                }
            } else {
                echo "No es posible realizar la venta. Stock insuficiente.<br>";
            }
        } else {
            echo "Producto no encontrado.<br>";
        }

        // Cerrar la conexión
        $conn->close();
    } else {
        // Formulario para ingresar el ID del producto y la cantidad a vender
        echo '<form action="Sale.php" method="post">';
        echo '<label for="id">ID del producto:</label>';
        echo '<input type="number" id="id" name="id" required><br>';
        echo '<label for="cantidad">Cantidad a vender:</label>';
        echo '<input type="number" id="cantidad" name="cantidad" required><br>';
        echo '<input type="submit" value="Realizar Venta">';
        echo '</form>';
    }
    ?>

    <!-- Botón Volver -->
    <a href="sales_menu.php">Volver al Menú Principal</a>
</center>
</body>
</html>
