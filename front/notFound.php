<!-- front/notFound.php -->

<!--
 * Copyright (c) 2023, All rights reserved. Todos los derechos reservados.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 17/04/2023
-->

<?php $title = 'HTTP/1.1 404 No Encontrado'?>
<?php $style = ''?>
<?php $link = '<link rel="stylesheet" href="front/styles/errorPage.css">'?>
<?php $meta = ''?>
<?php $script = ''?>
<?php $bodyProperties = ''?>

<?php ob_start()?>
    <h1>404 Página de Error</h1>
    <p class="zoom-area">Lo sentimos, algo salió mal :(</p>
    <section class="error-container">
        <span>4</span>
        <span><span class="screen-reader-text">0</span></span>
        <span>4</span>
    </section>
    <div class="link-container">
        <a href="javascript:history.back()" class="more-link">Regresar a la página anterior</a>
    </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
    