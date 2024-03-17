<?php

    require "includes/funciones.php";
 incluirTemplate("header");

?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>
        
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="sobre nosotros">
                </picture>

                
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt exercitationem iusto eius suscipit debitis, dolore nihil! Corrupti sint adipisci quam expedita error consectetur, molestiae aliquam qui porro rem quos perspiciatis. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta eligendi temporibus rerum nulla, pariatur quibusdam delectus at, modi neque exercitationem repudiandae veritatis tempora cumque possimus illo consectetur, mollitia maiores natus?</p>

                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat, aut aspernatur porro quod enim natus hic aperiam quae accusantium dolores nulla omnis odit minus numquam sit beatae accusamus. Officia, libero?</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, at consequatur possimus, nihil ullam dolor nobis dolorum explicabo excepturi, quaerat repudiandae recusandae laboriosam voluptate perferendis consectetur aperiam sint quam distinctio!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, at consequatur possimus, nihil ullam dolor nobis dolorum explicabo excepturi, quaerat repudiandae recusandae laboriosam voluptate perferendis consectetur aperiam sint quam distinctio!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, at consequatur possimus, nihil ullam dolor nobis dolorum explicabo excepturi, quaerat repudiandae recusandae laboriosam voluptate perferendis consectetur aperiam sint quam distinctio!</p>
            </div>
        </div>
    </section>

    <?php

incluirTemplate("footer");

?>