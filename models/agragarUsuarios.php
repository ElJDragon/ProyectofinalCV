<?php
include_once 'conexion.php';
$conn = new Conexion();
$con = $conn->conectar();

$user = $_POST['user'] ?? '';
$psw = $_POST['psw'] ?? '';

if (empty($user) || empty($psw)) {
    echo json_encode("Usuario o contraseña vacíos.");
    exit;
}

$psw_hash = password_hash($psw, PASSWORD_DEFAULT);
$intentos = 0;
$bloqueado = 0;

$sqlInsert = "INSERT INTO usuarios1 (user, psw, intentos, bloqueado) VALUES (?, ?, ?, ?)";
$stmt = $con->prepare($sqlInsert);

if ($stmt) {
    $stmt->bind_param("ssii", $user, $psw_hash, $intentos, $bloqueado);
    if ($stmt->execute()) {
        echo json_encode("Usuario guardado correctamente.");
    } else {
        echo json_encode("Error al guardar: " . $stmt->error);
    }
    $stmt->close();
} else {
    echo json_encode("Error preparando consulta: " . $con->error);
}

$con->close();
?>
