<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "perro.c7ea6ego67h8.us-east-2.rds.amazonaws.com";
$username = "admin";
$password = "Simon2025_";
$database = "perro"; 
$conexion = mysqli_connect($servername, $username, $password, $database);

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
} else {
    echo "Conexión exitosa a la base de datos.";

    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];
    $raza = $_POST['raza'];
    $edad = $_POST['edad'];

    // Crear la consulta de inserción
    $sql = "INSERT INTO perros (nombre, codigo, raza, edad) 
            VALUES ('$nombre', '$codigo', '$raza', '$edad')";

    // Ejecutar la consulta
    $query = mysqli_query($conexion, $sql);

    // Verificar si la inserción fue exitosa
    if ($query) {
        echo "<script>alert('Perro registrado con éxito');</script>";
    } else {
        // Si hay un error, mostrar un mensaje de error
        echo "Error al registrar el perro: " . mysqli_error($conexion);
    }
}

// Redirigir a la página principal
header("Location: ../index.html");

?>