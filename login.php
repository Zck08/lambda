<?php
session_start();
require "config.php";

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Buscar usuario
$sql = "SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar contraseña
if ($user && hash("sha256", $clave) === $user['clave']) {

    // Guardar sesión (opcional, pero ya no es necesaria para HTML)
    $_SESSION['usuario'] = $usuario;

    // Redirigir a la página HTML del usuario
    header("Location: " . $user['pagina']);
    exit();

} else {
    echo "<h2>Usuario o contraseña incorrectos</h2>";
    echo "<a href='login.html'>Volver</a>";
}
?>