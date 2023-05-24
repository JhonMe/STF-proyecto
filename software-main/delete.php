<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_user_id"])) {
        // Obtener el ID del cargo a eliminar
        $idcargo = $_POST["delete_user_id"];

        // Realizar la consulta de eliminación
        $sql = "DELETE FROM cargos WHERE idcargo = '$idcargo'";

        if ($conn->query($sql) === TRUE) {
            // La eliminación se realizó correctamente
            header('Location: tabla1.php');
            exit();
        } else {
            // Hubo un error al eliminar el cargo
            echo "Error al eliminar el cargo: " . $conn->error;
        }
    }
}

// Cerrar la conexión
$conn->close();
?>

