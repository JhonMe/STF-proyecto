<?php
// Obtener el ID del registro a eliminar
$id = $_POST['id'];

// Configuración de la base de datos
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

// Realizar la lógica para eliminar el registro de la base de datos
$sql = "DELETE FROM inicio1 WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    // Eliminación exitosa
    echo 'success';
} else {
    // Error al eliminar el registro
    echo 'error';
}

// Cerrar la conexión a la base de datos
$conn->close();
