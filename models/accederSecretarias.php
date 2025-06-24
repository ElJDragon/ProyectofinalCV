<?php
include_once 'conexion.php';
$conn = new Conexion();
$con = $conn->conectar();
$sql = "SELECT * FROM usuarios1;";
$respuesta = $con->query($sql);
$resultado = array();

if ($respuesta->num_rows > 0) {
    while ($fila = $respuesta->fetch_assoc()) {  
        array_push($resultado, $fila);
    }
} else {
    $resultado = "No hay usuarios";
}

header('Content-Type: application/json');
echo json_encode($resultado);
?>

