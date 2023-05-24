<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los valores del formulario
$codigoNCF = $_POST['codigoNCF'];
$solicitud = $_POST['solicitud'];
$tipo = $_POST['tipo'];
$proceso = $_POST['proceso'];
$descripcion = $_POST['descripcion'];
$conclusion = $_POST['conclusion'];
$acciones = $_POST['acciones'];
$responsable = $_POST['responsable'];
$recursos = $_POST['recursos'];
$tipoAccion = isset($_POST['tipoAccion']) ? $_POST['tipoAccion'] : '';
$fechaLimite = $_POST['fechaLimite'];

// Escapar los valores para prevenir inyección de SQL
$codigoNCF = mysqli_real_escape_string($conn, $codigoNCF);
$solicitud = mysqli_real_escape_string($conn, $solicitud);
$tipo = mysqli_real_escape_string($conn, $tipo);
$proceso = mysqli_real_escape_string($conn, $proceso);
$descripcion = mysqli_real_escape_string($conn, $descripcion);
$conclusion = mysqli_real_escape_string($conn, $conclusion);
$acciones = mysqli_real_escape_string($conn, $acciones);
$responsable = mysqli_real_escape_string($conn, $responsable);
$recursos = mysqli_real_escape_string($conn, $recursos);
$tipoAccion = mysqli_real_escape_string($conn, $tipoAccion);
$fechaLimite = mysqli_real_escape_string($conn, $fechaLimite);

// Ejecutar la consulta de inserción
$sql = "INSERT INTO inicio6 (codigoNCF, solicitud, tipo, proceso, descripcion, conclusion, acciones, responsable, recursos, tipoAccion, fechaLimite)
        VALUES ('$codigoNCF', '$solicitud', '$tipo', '$proceso', '$descripcion', '$conclusion', '$acciones', '$responsable', '$recursos', '$tipoAccion', '$fechaLimite')";

if ($conn->query($sql) === TRUE) {
    echo "Registro insertado correctamente.";
} else {
    echo "Error al insertar el registro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
