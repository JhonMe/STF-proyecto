<?php
ob_start(); // Inicio del buffer de salida

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$id = isset($_POST['id']) ? $_POST['id'] : '';
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$clave = isset($_POST['clave']) ? $_POST['clave'] : '';

$sql = "INSERT INTO usuario_login (id, usuario, clave) VALUES ('$id','$usuario', '$clave')";
if ($conn->query($sql) === TRUE) {
    header('Location: tabla2.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "UPDATE usuario_login SET usuario='$usuario'";
if (!empty($clave)) {
    $sql .= ", clave='$clave'";
}
$sql .= " WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header('Location: tabla2.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$id = $_POST['id'];

$sql = "DELETE FROM usuario_login WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header('Location: tabla2.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

ob_end_flush(); // Envío del buffer de salida
?>