<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sistemadeinventario";

$connection = mysqli_connect($host, $user, $pass, $db);
// if ($connection) {
// 	echo "Conexión exitosaaa";
// } else {
// 	echo "Ocurrió un error al conectareee";
// }

if (isset($_POST["email"]) && isset($_POST["password"])) {
	$names = $_POST["nombre"];
	$lastNames = $_POST["apellido"];
	$emails = $_POST["correo"];
	$passwords = $_POST["contra"];

	$instruccion = "INSERT INTO clienteregistro (name, lastName, email, password)
					VALUES ('$names', '$lastNames', '$emails', '$passwords')";
	$resultado = mysqli_query($connection, $instruccion);

	if ($resultado) {
		header("Location:carritoDelete/index.html");
	} else {
		echo "Error al insertar el registrooooooooooo: " . mysqli_error($connection);
	}
} else {
	echo "Ingresa los datos";
}
?>


<!-- <?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "todo";

$connection = mysqli_connect($host, $user, $pass, $db);
if (isset($_POST["nombrea"]) && isset($_POST["emaila"])) {
	$nombre = $_POST['nombrea'];
	$email = $_POST['emaila'];

	$instruccion = "SELECT * FROM usuarios WHERE email = '$email'";
	$instruccion = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
	$resultado = mysqli_query($connection, $instruccion);
	if (mysqli_num_rows($resultado) == 0) {
		// Si no existe un registro con el mismo correo electrónico, insertar el nuevo registro
		$instruccion = "INSERT INTO usuarios (nombre,email) VALUES ('$nombre','$email')";
		$resultado = mysqli_query($connection, $instruccion);
		echo "Listo";
	} else {
		// Si ya existe un registro con el mismo correo electrónico, mostrar un mensaje de error
		echo "El correo electrónico ya está registrado en la base de datos.";
	}
}
?> -->