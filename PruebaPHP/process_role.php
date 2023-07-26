<?php
session_start();

if (isset($_POST["rol"])) {
    $rol_seleccionado = $_POST["rol"];

    // Verificar el rol seleccionado y redirigir a la página correspondiente
    if ($rol_seleccionado === "productos") {
        header("Location: product_menu.php");
    } elseif ($rol_seleccionado === "ventas") {
        header("Location: sales_menu.php");
    } else {
        echo "Rol no válido.";
    }
} else {
    echo "Debe seleccionar un rol.";
}
?>
