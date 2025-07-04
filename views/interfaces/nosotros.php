<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div class="container mt-5">
    <h2 class="row justify-content-center">Más Acerca de Nosotros</h2>

    <div class="row justify-content-center" id="estudiantesContainer">
        <!-- Los estudiantes se agregarán dinámicamente aquí -->
    </div>
</div>

<script>
    // Array de estudiantes con los datos
    const estudiantes = [
            {
            nombre: "Josué Sebastián Guevara Tierras",
            direccion: "Ambato",
            telefono: "0963134445",
            correo: "jguevara8928@uta.edu.ec",
            foto: "imagenes/Josue.jpeg"
        }
    ];

    // Función para agregar estudiantes en tarjetas
    function cargarEstudiantes() {
        const container = document.querySelector("#estudiantesContainer");
        estudiantes.forEach(estudiante => {
            const divCard = document.createElement("div");
            divCard.classList.add("col-md-4", "mb-4");

            divCard.innerHTML = `
                <div class="card">
                    <img src="${estudiante.foto}" alt="Foto de ${estudiante.nombre}" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">${estudiante.nombre}</h5>
                        <p class="card-text"><strong>Dirección:</strong> ${estudiante.direccion}</p>
                        <p class="card-text"><strong>Teléfono:</strong> ${estudiante.telefono}</p>
                        <p class="card-text"><strong>Correo:</strong> ${estudiante.correo}</p>
                    </div>
                </div>
            `;
            container.appendChild(divCard);
        });
    }

    // Llamar a la función para cargar los estudiantes al cargar la página
    window.onload = cargarEstudiantes;
</script>

</body>
</html>


