<!DOCTYPE html>


<html>

<head>
    <title>Proyecto Computacion Visual</title>
    <link rel="stylesheet" href="css/Style.css">
</head>
<style>
    .boton-sesion {
    display: inline-block;
    background-color: rgb(110, 7, 7); /* Color rojo */
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s, transform 0.3s;
}

.boton-sesion:hover {
    background-color: #8b0000; /* Rojo más oscuro al pasar el mouse */
    transform: scale(1.05); /* Le da un efecto de aumento */
}

.boton-sesion:active {
    background-color: #5c0202; /* Rojo aún más oscuro cuando se hace clic */
}
footer{
    background: rgb(110, 7, 7);
    color: white;
    text-align: center;
    font-size: large;
}
</style>

<body>
    <header>
        <img src="imagenes/banner.png" width="40%" height="150px"></img>
        
        <div style="float: right; margin-right: 10px;">
            <?php
session_start();
if (isset($_SESSION['usuario'])) {
    echo "<span style='margin-right: 15px;'>👤 " . $_SESSION['usuario'] . "</span>";
    echo "<a href='./views/interfaces/logout.php' class='boton-sesion'>Cerrar sesión</a>";
} else {
    echo "<a href='./views/interfaces/login.php' class='boton-sesion'>Iniciar sesión</a>";
}
?>


        </div>
    </header>

    <nav>
        <ul>
            <li><a href="index.php?action=inicio">Inicio</a></li>
            <li><a href="index.php?action=nosotros">Nosotros</a></li>
            <li><a href="index.php?action=servicios">Servicios</a></li>
            <li><a href="index.php?action=contactanos">Contactanos</a></li>
            <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']=='admin'){?>
                    <li><a href="index.php?action=Auditoria">Auditorias></a></li>
            <?php   }  ?>
        </ul>
    </nav>

    <section>
        <?php
        require_once "controllers/controller.php";
        require_once "models/model.php";
        $mvc = new MvcController();
        $mvc->enlacesPaginasController();
        ?>
    </section>

    
        <footer>
            Derechos Reservados ©Cuarto_Software
        </footer>
    
</body>

</html>
