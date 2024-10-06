<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "clinica";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar el inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gmail = $_POST['username'];
    $password = $_POST['password'];

    // Consultar la base de datos
    $sql = "SELECT * FROM pacientes WHERE email='$gmail' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        header("Location: pagina1.html"); // Cambia a la página deseada
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}

$conn->close();
?>
