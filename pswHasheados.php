<?php
include_once ('models/conexion.php');
$con = new Conexion();
$conn = $con->conectar();

$sql = "SELECT user, psw FROM usuarios1";
$stmt = $conn->query($sql);

while ($row = $stmt->fetch_assoc()) {
    $usuario = $row['admin'];
    $clave_original = $row['psw'];
    $clave_hasheada = password_hash($clave_original, PASSWORD_DEFAULT);

    $update = $conn->prepare("UPDATE usuarios1 SET psw = ? WHERE user = ?");
    $update->bind_param("ss", $clave_hasheada, $usuario);
    $update->execute();

    echo "Contraseña de $usuario hasheada <br>";
}

?>
