<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Buscar el usuario en la tabla de usuarios
$sql = "SELECT * FROM usuario_log WHERE usuario = '$usuario' AND clave = '$clave'";

$resultado = $conn->query($sql);

// Verificar si se encontró un usuario coincidente
if ($resultado->num_rows == 1) {
    // Iniciar sesión y redirigir al usuario a la página de bienvenida
    session_start();
    $_SESSION['usuario'] = $usuario;
    header("location: bienvenida.php");
} else {
    // Mostrar un mensaje de error si las credenciales no coinciden
    echo "Nombre de usuario o contraseña incorrectos.";
}

// Cerrar la conexión
$conn->close();
?>


