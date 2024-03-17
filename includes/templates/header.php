<?php 

    //revisamos si existe una sesion iniciada, si no, se inicia
    if(!isset($_SESSION)){
        session_start();
    }
    //para añadir más adelante enlace a cerrar sesión
    $auth = $_SESSION["login"] ?? false;

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
</head>
<body>

    <header class="header <?php echo $inicio ? "inicio" : "" ?>">
        <!--la clase contenedor facilita centrar los elementos-->
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraices/index.php">
                    <img src="/bienesraices/build/img/logo.svg">
                </a> <!--enlace nos lleva a la página principal-->

                <div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <!--muestra enlace de cerrar sesión si existe una sesión iniciada-->
                        <?php if ($auth): ?>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif;?>
                    </nav>
                </div>


            </div>
            <!--fin barra-->
            <?php if ($inicio){ ?>
            <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php }?>
        </div>
    </header>