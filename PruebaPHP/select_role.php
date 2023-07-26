<!DOCTYPE html>
<html>
<head>
    <center><h1>Seleccionar Rol</h1></center>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <center>
    <p>Seleccione un rol para continuar:</p>
    <form action="process_role.php" method="post">
        <input type="radio" id="rol_productos" name="rol" value="productos" required>
        <label for="rol_productos">Productos</label><br><br>

        <input type="radio" id="rol_ventas" name="rol" value="ventas" required>
        <label for="rol_ventas">Ventas</label><br><br>

        <input type="submit" value="Continuar">
    </form>
    </center>
</body>
</html>
