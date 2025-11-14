<?php
require 'includes/funciones.php';
$inicio = true;
incluirTemplate('header', $inicio);
?>
<main class="contenedor seccion">
    <h1>Más sobre Nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono de Seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Proporcionamos sistemas de seguridad avanzados para garantizar la tranquilidad de nuestros clientes.
            </p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono de Precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto aliquid, dicta, delectus hic
                eligendi odio odit iusto natus repellat sequi mollitia? Deleniti ut a atque aut voluptatibus nobis
                aliquid laborum.
            </p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono de A tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora est nisi suscipit doloremque quo
                cumque fugiat esse perferendis, minima exercitationem dicta numquam ut harum adipisci ullam
                blanditiis consequatur eveniet nemo!.
            </p>
        </div>
    </div>
</main>
<section class="seccion contenedor">
    <h2>Casas y Depas en Ventas</h2>
    <div class="contenedor-anuncio">
        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio1.webp" type="image/webp">
                <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/anuncio1.jpg" alt="Anuncio 1">
            </picture>
            <div class="contenido-anuncio">
                <h3>Casa de lujo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis asperiores accusamus ad
                    cupiditate porro ipsam, dolores quam iusto assumenda itaque explicabo. </p>
                <p class="precio">$3,000,000</p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg"
                            alt="Icono Estacionamiento">
                        <p>1</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg"
                            alt="Icono Habitaciones">
                        <p>4</p>
                    </li>
                </ul>
                <a href="anuncio.php" class="boton boton-amarillo">Ver propiedad</a>
            </div>
        </div> <!--.anuncio-->
        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio2.webp" type="image/webp">
                <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/anuncio2.jpg" alt="Anuncio 2">
            </picture>
            <div class="contenido-anuncio">
                <h3>Casa de lujo con exelentes terminciones </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis asperiores accusamus ad
                    cupiditate porro ipsam, dolores quam iusto assumenda itaque explicabo. </p>
                <p class="precio">$3,000,000</p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg"
                            alt="Icono Estacionamiento">
                        <p>1</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg"
                            alt="Icono Habitaciones">
                        <p>4</p>
                    </li>
                </ul>
                <a href="anuncio.php" class="boton boton-amarillo">Ver propiedad</a>
            </div>
        </div> <!--.anuncio-->
        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio3.webp" type="image/webp">
                <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/anuncio3.jpg" alt="Anuncio 3">
            </picture>
            <div class="contenido-anuncio">
                <h3>Casa con exelente picina</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis asperiores accusamus ad
                    cupiditate porro ipsam, dolores quam iusto assumenda itaque explicabo. </p>
                <p class="precio">$6,000,000</p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg"
                            alt="Icono Estacionamiento">
                        <p>1</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg"
                            alt="Icono Habitaciones">
                        <p>4</p>
                    </li>
                </ul>
                <a href="anuncio.php" class="boton boton-amarillo">Ver propiedad</a>
            </div>
        </div> <!--.anuncio-->
    </div> <!--.contenedor-anuncio-->
    <div class="alinear-derecha">
        <a href="Anuncios.php" class="boton-verde">Ver todas</a>
    </div>
</section>
<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulrio de contacto y un sesor se pondra en contacto con tigo a la brevedad</p>
    <a href="Contacto.php" class="boton-amarillo-inblock">Contactanos</a>
</section>
<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y
                        ahorrando dinero</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Gui de decoracion</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>
                    <p>Consejos para decoracion e implementacion de mejoras inprecionantes</p>
                </a>
            </div>
        </article>
    </section>
    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <blockquote>
            El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple
            con todas mis expectativas.
        </blockquote>
        <p>- Juan Perez</p>
    </section>
</div>
<?php incluirTemplate('footer') ?>