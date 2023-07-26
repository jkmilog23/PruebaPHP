<?php
// Verificar las credenciales de inicio de sesión
$user = "admin"; // Usuario correcto
$password = "password"; // Contraseña correcta

$user_ingresado = $_POST["user"];
$password_ingresada = $_POST["password"];

if ($user_ingresado === $user && $password_ingresada === $password) {
    // Inicio de sesión exitoso, guardar el rol del usuario en una sesión
    session_start();

    // Aquí determinamos el rol del usuario, en este caso, simplemente lo establecemos como "admin"
    $_SESSION["rol"] = "admin";

    // Redirigir a la página de selección de roles
    header("Location: select_role.php");
    exit;
} else {
    // Credenciales incorrectas
    echo "Usuario o contrasena incorrectos. Vuelve a intentarlo.";
}
?>
