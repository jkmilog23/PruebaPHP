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

// Obtener los datos del formulario
$Name = $_POST["Name"];
$Ref = $_POST["Ref"];
$Price = intval($_POST["Price"]);
$Weight = intval($_POST["Weight"]);
$Category = $_POST["Category"];
$Stock = intval($_POST["Stock"]);
$Creation_Date = $_POST["Creation_Date"];

// Consulta para insertar el producto en la base de datos
$sql = "INSERT INTO productos (Name, Ref, Price, Weight, Category, Stock, Creation_Date) VALUES ('$Name', '$Ref', '$Price', '$Weight', '$Category', '$Stock', '$Creation_Date')";

if ($conn->query($sql) === TRUE) {
    echo "Producto agregado exitosamente.";
} else {
    echo "Error al agregar el producto: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <tittle>Redireccionar a Product Menu</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h3>Redireccionar a Product Menu</h3>
    <!-- Botón para redirigir a product_menu.php -->
    <a href="product_menu.php">Ir a Product Menu</a>
</body>
</html>

