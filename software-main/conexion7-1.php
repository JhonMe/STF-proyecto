<?php
$servername = "localhost"; // Nombre del servidor
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña del usuario
$dbname = "usuarios"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $detalle_cierre = $_POST["detalle_cierre"];
    $verificacion_implementacion = $_POST["verificacion_implementacion"];
    $fecha_implementacion = isset($_POST["fecha_implementacion"]) ? 1 : 0;
    $fecha_programa_cierre = isset($_POST["fecha_programa_cierre"]) ? 1 : 0;
    $estado = $_POST["estado"];
    $buscador_archivos = $_POST["buscador_archivos"];
    $detalle_sacp = $_POST["detalle_sacp"];
    $fecha_cierre = isset($_POST["fecha_cierre"]) ? 1 : 0;
    $fecha_eficacia = $_POST["fecha_eficacia"];
    $eficacia_correcta = isset($_POST["eficacia_correcta"]) ? 1 : 0;
    $acciones = $_POST["acciones"];
    $recursos = $_POST["recursos"];
    $responsable = $_POST["responsable"];
    $fecha_limite = $_POST["fecha_limite"];
    $descripcion = $_POST["descripcion"];
    $conclusion_analisis = $_POST["conclusion_analisis"];

    // Insertar datos en la tabla "formulario"
    $sql = "INSERT INTO inicio8 (detalle_cierre, verificacion_implementacion, fecha_implementacion, fecha_programa_cierre, estado, buscador_archivos, detalle_sacp, fecha_cierre, fecha_eficacia, eficacia_correcta, acciones, recursos, responsable, fecha_limite, descripcion, conclusion_analisis)
            VALUES ('$detalle_cierre', '$verificacion_implementacion', $fecha_implementacion, $fecha_programa_cierre, '$estado', '$buscador_archivos', '$detalle_sacp', $fecha_cierre, '$fecha_eficacia', $eficacia_correcta, '$acciones', '$recursos', '$responsable', '$fecha_limite', '$descripcion', '$conclusion_analisis')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos del formulario insertados correctamente";
    }
    else {
        echo "Error al insertar datos del formulario: " . $conn->error;
    }
    }
    
    // Cerrar la conexión
    $conn->close();
    ?>
