<?php
// Verificar si se recibieron los datos necesarios
if (isset($_POST['id']) && isset($_POST['fecha_limite'])) {
    // Obtener los valores enviados desde el formulario
    $id = $_POST['id'];
    $fechaLimite = $_POST['fecha_limite'];

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

    // Actualizar la fecha límite en la base de datos
    $sql = "UPDATE inicio1 SET fecha_limite = '$fechaLimite' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        // Actualización exitosa
        echo "Fecha límite actualizada correctamente";
    } else {
        // Error en la actualización
        echo "Error al actualizar la fecha límite: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Datos faltantes, mostrar un mensaje de error
    echo "Error: Falta el ID o la fecha límite";
}
?>
