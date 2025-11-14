<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Nombre de la propiedad</h1>
    <picture>
        <source srcset="build/img/destacada.webp" type="image/webp">
        <source srcset="build/img/destacada.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada.jpg" alt="Anuncio destacado">
    </picture>
    <div class="resumen-propiedd">
        <p class="precio">3.000.000</p>
    </div>
    <ul class="iconos-caracteristicas">
        <li>
            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC">
            <p>3</p>
        </li>
        <li>
            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
            <p>1</p>
        </li>
        <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono Habitaciones">
            <p>4</p>
        </li>
    </ul>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis omnis natus beatae doloribus iste et quo,
        nam, odit temporibus velit, culpa assumenda! Tempora, itaque qui sequi assumenda suscipit dolorem totam.
        Distinctio, tenetur officiis laudantium quibusdam a cupiditate, debitis vero perspiciatis, expedita maiores
        cum ipsum nam corrupti commodi numquam nihil odit veniam cumque dolore. Deserunt exercitationem nam
        voluptatum iure saepe odio?
        Architecto similique odio nam porro ab esse, atque, perspiciatis expedita aliquam officiis eveniet doloribus
        dignissimos tempore? Ex veniam cupiditate laboriosam sint atque officiis harum consectetur, molestiae eaque,
        esse vel provident?
        Labore alias vero reiciendis quia veritatis ipsam tempora numquam nisi? Adipisci autem est maxime distinctio
        consequuntur architecto, et soluta aspernatur harum vitae quia expedita similique, amet nam dignissimos,
        iure fuga.</p>
</main>
<?php incluirTemplate('footer') ?>