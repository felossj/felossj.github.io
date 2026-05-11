<?php
$temperatura = null;
$localidad = null;
$clima = null;

// CONEXIÓN
$conexion = new mysqli("localhost", "root", "", "bd_estufa");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// CREAR TABLA SI NO EXISTE (SOLUCIÓN DEFINITIVA)
$conexion->query("
    CREATE TABLE IF NOT EXISTS registros (
        id INT AUTO_INCREMENT PRIMARY KEY,
        localidad VARCHAR(100),
        temperatura INT,
        clima VARCHAR(100),
        fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

// PROCESAR FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_POST['temperatura']) && !empty($_POST['localidad']) && !empty($_POST['clima'])) {

        $temperatura = (int) $_POST['temperatura'];
        $localidad = htmlspecialchars($_POST['localidad'], ENT_QUOTES, 'UTF-8');
        $clima = htmlspecialchars($_POST['clima'], ENT_QUOTES, 'UTF-8');

        $stmt = $conexion->prepare("INSERT INTO registros (localidad, temperatura, clima) VALUES (?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("sis", $localidad, $temperatura, $clima);
            $stmt->execute();
            $stmt->close();
        } else {
            die("Error SQL: " . $conexion->error);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>estufa.io</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #0f172a;
    color: white;
    text-align: center;
    padding: 50px;
}

.card {
    background: #1e293b;
    width: 350px;
    margin: auto;
    padding: 20px;
    border-radius: 12px;
}

.temp {
    font-size: 50px;
    margin: 10px 0;
}

input {
    padding: 10px;
    width: 80%;
    margin-top: 10px;
    box-sizing: border-box;
}
</style>
</head>
<body>

<div class="card">
    <h2>🌡 estufa.io</h2>

    <div class="temp">
        <?php echo $temperatura !== null ? $temperatura . '°' : '--'; ?>
    </div>
    <div>
        <?php
            echo "Calefaccionando";
        ?>
    </div>
    <div>
        <?php 
        if ($localidad && $clima) {
            echo "Local: $localidad °C - $clima";
        } else {
            echo "--";
        }
        ?>
    </div>

    <form action="" method="post">
        <input type="text" name="localidad" placeholder="Temperatura ambiente en su localidad" required>

        <input type="number" name="temperatura" placeholder="Temperatura a alcanzar (°C)" required>

        <input type="text" name="clima" placeholder="Clima (Soleado, Nublado...)" required>

        <input type="submit" value="Guardar">
    </form>
</div>

</body>
</html>
