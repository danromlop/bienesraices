<?php
    //autentificacion
    session_start();

  
    $auth = $_SESSION["login"];

    if(!$auth){ //envia a la pagina principal si intenta acceder sin estar logeado
        header("Location: /bienesraices/index.php");
    }

    // Importar la conexión

    require "../includes/config/database.php";
    $db = conectarDB();

    // Escribir el Query
    $query = "SELECT * FROM propiedades";

    //Consultar la BBDD
    $resultadoConsulta = mysqli_query($db, $query);


    // Para mostrar mensaje condicional, "creado correctamente"
    $resultado = $_GET["resultado"] ?? null; //con ??, en caso de que el valor no exista, se le asignará null

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $id = $_POST["id"]; 
        $id = filter_var($id, FILTER_VALIDATE_INT); //validamos el id para proteger la bbdd frente a los usuarios

        if($id){
            //Eliminar el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = $id";

            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

           
            unlink("../imagenes/" . $propiedad['imagen']);

            //Eliminar la propiedad
            $query = "DELETE FROM propiedades WHERE id = $id;";

            $resultado = mysqli_query($db, $query);

            if($resultado){
                header("location: /bienesraices/admin/index.php?resultado=3");
            }
        }
    }




    require "../includes/funciones.php";
    incluirTemplate("header");



?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if($resultado == 1):  ?>
            <p class="alerta exito">Anuncio Creado correctamente</p>
        <?php elseif($resultado == 2): ?>
            <p class="alerta exito">Anuncio Actualizado correctamente</p>
        <?php elseif($resultado == 3): ?>
            <p class="alerta exito">Anuncio Eliminado correctamente</p>
        <?php  endif; ?>

        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>



        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

           <tbody> <!--  Mostrar los resultados -->
           <?php while( $propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    
                    <td><?php echo $propiedad["id"];?></td>
                    <td><?php echo $propiedad["titulo"];?></td>
                    <td><img class="imagen-tabla" src="/bienesraices/imagenes/<?php echo  $propiedad["imagen"]; 
                   
                    
                    ?>"></td>
                    <td><?php echo "$ " . $propiedad["precio"];?></td>
                    <td>
                        <form method="POST" class="w-100">
                        <!-- input hidden, envia datos de forma oculta -->
                            <input type="hidden" name="id" value="<?php echo $propiedad["id"] ?>">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>


                        
                        <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad["id"]; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>


<?php




// Cerrar la conexión

mysqli_close($db);

incluirTemplate("footer");

?>