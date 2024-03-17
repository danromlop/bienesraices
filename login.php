<?php
// Conectar a la bbdd
require "includes/config/database.php";
$db = conectarDB();


// Autenticar el usuario
$errores = [];

if($_SERVER["REQUEST_METHOD"] === "POST"){
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    //validacion de email
    $email = mysqli_real_escape_string($db, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
    
    $password = mysqli_real_escape_string($db, $_POST["password"]);

    if(!$email){
        $errores[] = "El email es obligatorio o no es válido";
    }

    if(!$password){
        $errores[] = "El Password es obligatorio";
    }

    

    if (empty($errores)){
        //revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);
       

        //como es un objeto, se usa flecha -> para seleccionar num_rows
        if($resultado->num_rows){
            //Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
            //var_dump($usuario);

            //Verificar si el password es correcto

            $auth = password_verify($password, $usuario["password"]);

            //var_dump($auth);

            if($auth){
                //El usuario está autenticado
                //usamos superglobal $_SESSION
                session_start();

                //Llenar el array de la sesión con toda la info necesaria
                $_SESSION["usuario"] = $usuario["email"];
                $_SESSION["login"] = true;

                header("Location: /bienesraices/admin/index.php");

                echo "<pre>";
                var_dump($_SESSION);
                echo "</pre>";

            } else{
                $errores[] = "El password es incorrecto";
            }
            
        }else{
            $errores[] = "El usuario no existe";
        }

    }


};

// Incluye header
    require "includes/funciones.php";
 incluirTemplate("header");

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sesión</h1>

        <?php foreach($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" >
        <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu password" id="password" required>

                
            </fieldset>

            <input type ="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>


<?php

incluirTemplate("footer");

?>