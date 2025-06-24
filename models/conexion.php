<?php
class Conexion {
    public function conectar() {
        $host = getenv("DB_HOST");
        $port = getenv("DB_PORT");
        $dbname = getenv("DB_NAME");
        $user = getenv("DB_USER");
        $password = getenv("DB_Psw");

        $conn = new mysqli($host, $user, $password, $dbname, (int)$port);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>
