<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "clinica"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar el registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $gmail = $_POST['email'];
    $password = $_POST['password'];

    // Insertar en la base de datos
    $sql = "INSERT INTO pacientes (nombre, apellido, email, password) VALUES ('$nombre', '$apellido', '$gmail', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, redirigir al login
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
