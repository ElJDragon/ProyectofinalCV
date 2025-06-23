<?php
class Conexion {
    public function conectar() {
        $servename = "sql111.infinityfree.com"; // host proporcionado
        $username  = "if0_39291915";            // tu usuario MySQL
        $password  = "EEvMHnVnLwnlCbz";         // tu contraseña MySQL
        $database  = "if0_39291915_proyectocv"; // tu base de datos creada

        $conn = mysqli_connect($servename, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }
}
?>
