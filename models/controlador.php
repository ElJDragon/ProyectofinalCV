<?php
session_start();
include_once "conexion.php";
$con = new Conexion();
$conn = $con->conectar();

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $clave_ingresada = trim($_POST['password']);
    
$stmt = $conn->prepare("SELECT psw, intentos, bloqueado FROM usuarios1 WHERE user = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    
   if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $clave_guardada = $row['psw'];
        $intentos = $row['intentos'];
        $bloqueado = $row['bloqueado'];

        // 2. Usuario bloqueado
        if ($bloqueado) {
            $_SESSION['error'] = "🚫 Usuario bloqueado por exceso de intentos.";
            header("Location: ../views/interfaces/login.php");
            exit;
        }

        if (password_verify($clave_ingresada, $clave_guardada)) {
    session_regenerate_id(true);
    $_SESSION['usuario'] = $usuario;

    $ip = $_SERVER['REMOTE_ADDR'];
    $navegador = $_SERVER['HTTP_USER_AGENT'];
    $fecha = date('Y-m-d H:i:s');

    $auditoria = $conn->prepare("INSERT INTO auditoria_usuarios (usuario, fecha, ip, navegador) VALUES (?, ?, ?, ?)");
    $auditoria->bind_param("ssss", $usuario, $fecha, $ip, $navegador);
    $auditoria->execute();
    
    $reset = $conn->prepare("UPDATE usuarios1 SET intentos = 0 WHERE user = ?");
    $reset->bind_param("s", $usuario);
    $reset->execute();


    // Redirigir al inicio si el login es exitoso
    header("Location: ../index.php");  // o "../views/interfaces/inicio.php" según el flujo de tu plantilla
    exit;
} else {
    $intentos++;
    
            $bloqueado = ($intentos >= 3) ? 1 : 0;

            $update = $conn->prepare("UPDATE usuarios1 SET intentos = ?, bloqueado = ? WHERE user = ?");
            $update->bind_param("iis", $intentos, $bloqueado, $usuario);
            $update->execute();

            $_SESSION['error'] = "❌ Contraseña incorrecta."."Intentos restantes: " . (3 - $intentos);
            header("Location: ../views/interfaces/login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "❌ Usuario no encontrado.";
        header("Location: ../views/interfaces/login.php");
        exit;
    }
}
