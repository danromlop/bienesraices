<?php

// Importar la conexión

require "includes/config/database.php";
$db = conectarDB();

// Crear un email y password
$email = "correo@correo.com";
$password = "123456";

//Hashear password //con esta funcion en php, las contraseñas hasheadas tienen una extension de 60 caracteres.
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

exit;
// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email','$passwordHash')";

echo $query;


//Agregarlo a la bbdd
mysqli_query($db, $query);