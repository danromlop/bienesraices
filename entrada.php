<?php

    require "includes/funciones.php";
 incluirTemplate("header");

?>

   <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>


        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>

        
        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
        
        <div class="resumen-propiedad">
            

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero laborum a cupiditate amet consectetur fuga porro ut sunt minus ducimus, laudantium assumenda laboriosam! Dolorem atque exercitationem dolor, qui minus dolore! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur explicabo laborum rerum? Tempore ex quasi sunt officiis iste modi ipsa fugit, sit pariatur, totam voluptatibus neque voluptas doloremque placeat illum!</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga hic expedita, similique quidem odio officiis dolores sapiente vel ut quas excepturi neque numquam earum eum quisquam cupiditate maiores, itaque quam.</p>
        </div>
   </main>

   <?php

incluirTemplate("footer");

?>