<?php

    require "includes/funciones.php";
 incluirTemplate("header", $inicio = true);

?>

    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>

       <?php

       $limite = 3;
        include "includes/templates/anuncios.php";
       ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de un contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.html" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta"> Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                        <p>Consejos para construir una terraza en el techo con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>

            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, modi distinctio? Quod, ex?</p>
                    </a>
                </div>

            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, inventore rem et aspernatur non facilis ipsam voluptatibus perspiciatis enim excepturi vero dolore temporibus.
                </blockquote>
                <p>Juan de la Torre</p>
            </div>
        </section>
    </div>

    <?php

 incluirTemplate("footer");

?>
   