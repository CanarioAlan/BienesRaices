<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Anuncios</h1>
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
        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio4.webp" type="image/webp">
                <source srcset="build/img/anuncio4.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/anuncio4.jpg" alt="Anuncio 3">
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
</main>
<?php incluirTemplate('footer') ?>