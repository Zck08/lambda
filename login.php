<?php
// Usuario y clave válidos
$usuarioValido = "admin";
$claveValida = "1234";

// Recibir datos del formulario
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Validación
if ($usuario === $usuarioValido && $clave === $claveValida) {
    // Redirige a otra página
    header("Location: dashboard.php");
    exit();
} else {
    echo "<h2>Usuario o contraseña incorrectos</h2>";
    echo "<a href='login.html'>Volver</a>";
}
?>