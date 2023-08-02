<?php
// Inicia la sesión
session_start();

// Conexión a la base de datos (reemplaza con tus credenciales)
$host = "localhost";
$user = "root";
$pass = "";
$db = "sistemadeinventario";

$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    die("Ocurrió un error al conectar: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta a la base de datos para verificar las credenciales
    $query = "SELECT * FROM clienteregistro WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if ($result === false) {
        die("Error en la consulta: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($result) == 1) {
        // Si las credenciales son correctas, inicia sesión y devuelve "success"
        $_SESSION["email"] = $email;
        echo "success";
    } else {
        // Si las credenciales son incorrectas, devuelve "error"
        echo "error";
    }
}
?>