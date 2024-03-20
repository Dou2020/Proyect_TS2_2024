<?php
$servername = "localhost";
$username = "root";
$password = ""; // La contraseña puede ser vacía si estás utilizando la configuración predeterminada de XAMPP
$database = "shopDigital";

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}
?>
