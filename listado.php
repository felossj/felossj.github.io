<?php
// Configuración de conexión
$host = "localhost";
$usuario = "root";
$clave = "";
$baseDatos = "bd_estufa";

// Crear conexión
$conexion = new mysqli($host, $usuario, $clave, $baseDatos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener todos los registros
$sql = "SELECT * FROM registros";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Registros</title>
    <style>
        /* Estilos Generales */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .contenedor-tabla {
            width: 100%;
            max-width: 1000px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow-x: auto; /* Hace la tabla responsiva en móviles */
            padding: 20px;
        }

        h2 {
            margin-top: 0;
            color: #2c3e50;
            font-weight: 600;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        /* Estilos de la Tabla */
        .tabla-moderna {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 0.95rem;
        }

        .tabla-moderna thead tr {
            background-color: #007bff;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .tabla-moderna th, 
        .tabla-moderna td {
            padding: 12px 15px;
            border-bottom: 1px solid #dddddd;
        }

        /* Filas alternas (Cebra) */
        .tabla-moderna tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        /* Efecto Hover */
        .tabla-moderna tbody tr:hover {
            background-color: #f1f7ff;
            cursor: pointer;
        }

        /* Estilo para cuando no hay datos */
        .sin-datos {
            padding: 20px;
            text-align: center;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="contenedor-tabla">
    <h2>Registros del Sistema</h2>

    <?php
    if ($resultado = $conexion->query($sql)) {
        if ($resultado->num_rows > 0) {
            // Eliminamos los atributos antiguos como border, cellpadding, etc.
            echo "<table class='tabla-moderna'>";
            echo "<thead><tr>";

            // Encabezados de la tabla
            while ($campo = $resultado->fetch_field()) {
                echo "<th>" . htmlspecialchars($campo->name) . "</th>";
            }
            echo "</tr></thead>";
            echo "<tbody>";

            // Filas de datos
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                foreach ($fila as $valor) {
                    echo "<td>" . htmlspecialchars($valor) . "</td>";
                }
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='sin-datos'>No hay registros en la tabla.</p>";
        }
        $resultado->free();
    } else {
        echo "<p>Error en la consulta: " . $conexion->error . "</p>";
    }

    // Cerrar conexión
    $conexion->close();
    ?>
</div>

</body>
</html>