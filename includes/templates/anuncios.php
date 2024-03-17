<?php  
    // Importar la conexión
    require __DIR__ . "/../config/database.php";
    $db = conectarDB();
    

    // consultar
    $query = "SELECT * FROM propiedades LIMIT $limite";


    //obtener resultado
    $resultado = mysqli_query($db, $query);



?>



<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
            <div class="anuncio">
                <picture>
                    
                    <img loading="lazy" src="imagenes/<?php echo $propiedad["imagen" ] ?>"  alt="imagen anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad["titulo" ] ?></h3>
                    <p><?php echo $propiedad["descripcion" ] ?></p>
                    <p class="precio">$<?php echo $propiedad["precio" ] ?></p>

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

                    <a href="anuncio.php?id=<?php echo $propiedad["id" ] ?>" class="boton boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div><!--fin contenido anuncio-->
            </div><!-- fin anuncio -->
            <?php endwhile; ?>
        </div> <!--fin contenedor anuncios -->

        <?php 
            //cerrar la conexión

            mysqli_close($db);

        ?>