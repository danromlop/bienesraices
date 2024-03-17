<?php
function conectarDB() : mysqli{ //devuelve una conexion de mysqli
    $db = mysqli_connect("localhost", "root", "cabeson123", "bienesraices_crud");

    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    };
    return $db;
};

