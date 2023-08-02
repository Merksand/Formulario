<?php

session_start();

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

     verificar las credenciales
    $query = "SELECT * FROM clienteregistro WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if ($result === false) {
        die("Error en la consulta: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($result) == 1) {
        
        $_SESSION["email"] = $email;
        echo "success";
    } else {
        echo "error";
    }
}
?>