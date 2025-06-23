
<?php
include_once "models/conexion.php";
$con = new Conexion();
$conn = $con->conectar();

// 1. Crear hash limpio
$usuario = "user";
$clave_original = "123";
$hash_limpio = password_hash($clave_original, PASSWORD_DEFAULT);

// 2. Actualizar en base de datos
$stmt = $conn->prepare("UPDATE usuarios1 SET psw = ? WHERE user = ?");
$stmt->bind_param("ss", $hash_limpio, $usuario);
$stmt->execute();

echo "✅ Contraseña de 'admin' actualizada con hash limpio.";
