<?php

$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);
//redirigir a la pagina principal si no hay id
if(!$id){
    header("Location: /bienesraices/index.php");
};


 // Importar la conexión
 require "includes/config/database.php";
 $db = conectarDB();
 


 // consultar


 $query = "SELECT * FROM propiedades WHERE id = $id";


 //obtener resultado
 $resultado = mysqli_query($db, $query);

 $propiedad = mysqli_fetch_assoc($resultado);


    require "includes/funciones.php";
 incluirTemplate("header");

 

?>

   <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad["titulo" ] ?></h1>

        <picture>
            
            <img loading="lazy" src="imagenes/<?php echo $propiedad["imagen" ] ?>" alt="imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propiedad["precio" ] ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" class="icono" alt="icono_wc">
                    <p><?php echo $propiedad["wc" ] ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" class="icono" alt="icono_estacionamiento">
                    <p><?php echo $propiedad["estacionamiento" ] ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" class="icono" alt="icono habitaciones">
                    <p><?php echo $propiedad["habitaciones" ] ?></p>
                </li>
            </ul>

            <p><?php echo $propiedad["descripcion" ] ?></p>

            
        </div>
   </main>

   <?php

incluirTemplate("footer");

?>