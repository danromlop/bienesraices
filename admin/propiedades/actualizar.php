<?php
    require "../../includes/funciones.php";

    $auth = estaAutenticado();

    if(!$auth){ //envia a la pagina principal si intenta acceder sin estar logeado
        header("Location: /bienesraices/index.php");
    }
    

    // Validar la URL por ID válido
    $id = $_GET["id"]; //coge el id del anuncio a actualizar
    $id = filter_var($id, FILTER_VALIDATE_INT); //lo valida

    if(!$id){ //si no hay id, lo redirige al index
        header("Location: /bienesraices/admin/index.php");
    }
    
    
    // Base de datos

    require "../../includes/config/database.php";
    $db = conectarDB();

    
    incluirTemplate("header");

    // Obtener los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id= {$id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    // echo "<pre>";
    // var_dump($propiedad);
    // echo "</pre>";

    //Consultar para obtener  los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Array con mensajes de errores
    $errores = [];

    $titulo = $propiedad["titulo"];
    $precio = $propiedad["precio"];
    $descripcion = $propiedad["descripcion"];
    $habitaciones = $propiedad["habitaciones"];
    $wc = $propiedad["wc"];
    $estacionamiento = $propiedad["estacionamiento"];
    $vendedor_id = $propiedad["vendedores_id"];

    $imagenPropiedad = $propiedad["imagen"];



    //Ejecuta el código después de que el usuario envía el formulario

    if($_SERVER["REQUEST_METHOD"] === "POST"){

            // echo "<pre>";
            // var_dump($_POST);
            // echo "</pre>";

       
        //msqli real escape string protege de actos maliciosos contra nuestra bbdd - en POO no es necesario sanitizar
        $titulo = mysqli_real_escape_string($db, $_POST["titulo"]);
        $precio = mysqli_real_escape_string($db, $_POST["precio"]);
        $descripcion = mysqli_real_escape_string($db, $_POST["descripcion"]);
        $habitaciones = mysqli_real_escape_string($db, $_POST["habitaciones"]);
        $wc = mysqli_real_escape_string($db, $_POST["wc"]);
        $estacionamiento = mysqli_real_escape_string($db, $_POST["estacionamiento"]);
        $vendedor_id = mysqli_real_escape_string($db, $_POST["vendedor_id"]);
        $creado = date("Y/m/d");

        // Asignar files hacia una variable
        $imagen = $_FILES["imagen"];
        
       

        

        //echo $_FILES["imagen"];
       
  
        

        if(!$titulo){
            $errores[] = "Debes añadir un título";
        }
        if(!$precio){
            $errores[] = "Debes añadir un precio";
        }
        if( strlen ($descripcion) < 50){
            $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
            
        }

        if(!$habitaciones){
            $errores[] = "El número de habitaciones es obligatorio";
        }

        if(!$wc){
            $errores[] = "El número de baños es obligatorio";
        }

        if(!$estacionamiento){
            $errores[] = "El número de lugares de estacionamiento es obligatorio";
        }

        if(!$vendedor_id){
            $errores[] = "Elige un vendedor";
        }
        
       

        //Validar por tamaño (100 kb max)
        $medida = 1000 * 1000;

        if ($imagen["size"] > $medida){
            $errores[] = "La imagen es muy pesada";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        // Revisar que el array de errores esté vacío

        if (empty($errores)){

        /** SUBIDA DE ARCHIVOS **/

        // Crear carpeta
        $carpetaImagenes = "../../imagenes/";

        if (!is_dir($carpetaImagenes)){ //is_dir indica si existe la carpeta
            mkdir($carpetaImagenes);
        }

        //validar imagen, elimina la imagen previa si actualiza nueva, y mantiene la original si no actualiza
        $nombreImagen = "";

        if($imagen["name"]){

            // Eliminar imagen previa
            unlink($carpetaImagenes . $propiedad["imagen"]);

             // Generar un nombre único
            $nombreImagen = md5(uniqid(rand())) . ".jpg"; //genera un id unico y aleatorio cada vez que recargas la pagina

            // Subir la imagen
             move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . $nombreImagen);
        }else{
            $nombreImagen =  $propiedad["imagen"];
        }

        
        
       

        

        // Insertar en la base de datos
            $query = "UPDATE propiedades SET titulo = '$titulo' , precio = '$precio' , imagen = '$nombreImagen' , descripcion = '$descripcion' , habitaciones = $habitaciones , wc = $wc , estacionamiento = $estacionamiento , vendedores_id = '$vendedor_id' WHERE id = $id ;";

            //echo $query;


            $resultado = mysqli_query($db, $query);

            if($resultado){
               // Redireccionar al usuario para evitar duplicados.

               header("Location: /bienesraices/admin/index.php?resultado=2"); //a partir del ? para mandar info por GET a index.php

            }else if (!$resultado){
                echo "Error al realizar la consulta";
        }
        }

        


    }

?>

    <main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
        <?php echo $error; ?>
        </div>
        
           
        <?php endforeach; ?>

            <!--enctype es para permitir subir archivos (img en este caso)-->
        <form class="formulario" method="POST"  enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>
                
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>" >

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/bienesraices/imagenes/<?php echo $imagenPropiedad ?>" class="imagen-small">

                <label for="descripcion">Descripción:</label>
                <textarea id=descripcion name="descripcion"><?php echo $descripcion; ?></textarea>


            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" name="wc" id="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">

                

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <!--bucle para mostrar todos los vendedores de la bbdd en un elemento <option>-->
                <select name="vendedor_id">
                    <option value="">--Seleccione--</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)):?>
                        <!--operador ternario (if en una linea) para que la seleccion de vendedor se mantenga si salta error en algún campo-->
                        <option <?php echo $vendedor_id === $vendedor["id"] ? "selected" : ""; ?>   value="<?php echo $vendedor["id"] ?>"><?php echo $vendedor["nombre"] . " " . $vendedor["apellido"];  ?></option>
                    

                    <?php endwhile; ?>
                </select>
            </fieldset>


            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

        </form>


    </main>


<?php

incluirTemplate("footer");

?>