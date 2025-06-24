<?php
include('models/conexion.php');
$conn = new conexion();
$con = $conn->conectar();
$sql = "SELECT id,usuario,fecha,ip,navegador FROM auditoria_usuarios;";
$result=$con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>user</th>
            <th>fecha</th>
            <th>ip</th>
            <th>navegador</th>
        </tr>
        <?php
        while ($row=$result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['usuario']}</td>";
            echo "<td>{$row['fecha']}</td>";
            echo "<td>{$row['ip']}</td>";
            echo "<td>{$row['navegador']}</td>";
            echo "</tr>";
        }

        ?>
    </table>
    
</body>
</html>
