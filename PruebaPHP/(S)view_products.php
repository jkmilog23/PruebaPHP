<!DOCTYPE html>
<html>
<head>
<center>
    <title>Visualizar Productos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Visualizar Productos</h1>

    <?php
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

    // Consulta para obtener todos los productos
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar una tabla con los datos de los productos
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Name</th>';
        echo '<th>Ref</th>';
        echo '<th>Price</th>';
        echo '<th>Weight</th>';
        echo '<th>Category</th>';
        echo '<th>Stock</th>';
        echo '<th>Creation_Date</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["ID"] . '</td>';
            echo '<td>' . $row["Name"] . '</td>';
            echo '<td>' . $row["Ref"] . '</td>';
            echo '<td>' . $row["Price"] . '</td>';
            echo '<td>' . $row["Weight"] . '</td>';
            echo '<td>' . $row["Category"] . '</td>';
            echo '<td>' . $row["Stock"] . '</td>';
            echo '<td>' . $row["Creation_Date"] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "No hay productos registrados.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>

    <!-- Botón Volver -->
    <a href="sales_menu.php">Volver</a>
</center>
</body>
</html>
