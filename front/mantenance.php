<!--front/mantenance.php-->

<!--
 * Copyright (c) 2023, All rights reserved. Todos los derechos reservados.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 17/04/2023
-->

<?php $title = 'Ejercicio Técnico Coppel'?>
<?php $style = ''?>
<?php $link = '<link rel="shortcut icon" href="favicon.ico">
               <link rel="stylesheet" type="text/css" href="front/styles/mantenance.css"/>'?>
<?php $meta = '<meta charset="UTF-8" />
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <meta name="description" content="Página de aviso de mantenimiento del sistema de la nómina de Rinku. Referencia: Infinite WebGL tubes as seen on Fornasetti.com made with Three.js" />
               <meta name="keywords" content="mantenimiento, mantenance" />
               <meta name="author" content="Louis Hoebregts for Codrops. Edited by Julia Leticia Sánchez Sánchez" />'?>
<?php $script = '<script>document.documentElement.className = "js";</script>'?>
<?php $bodyProperties = ''?>

<?php ob_start()?>
<body class="demo-2">
    <svg class="hidden">
	<symbol id="icon-arrow" viewBox="0 0 24 24">
            <title>arrow</title>
            <polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
	</symbol>
	<symbol id="icon-drop" viewBox="0 0 24 24">
            <title>drop</title>
            <path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/><path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
	</symbol>
    </svg>
    <main>
        <header class="codrops-header">
            <h1 class="codrops-header__title" style="font-size:300%; text-align:center;">Página en mantenimiento</h1>
            <p class="codrops-header__tagline"><br>Diseño del tunel proporcionado por: <a href="https://tympanus.net/codrops/2017/05/09/infinite-tubes-with-three-js/">Timpanus.Net</a> Inspirado en el efecto visto en <a href="http://www.fornasetti.com/">Fornasetti</a></p>
            <p class="codrops-header__info">Si necesita alguna información, envíe un mensaje al correo julia.sanchez15@gmail.com</p>
	</header>
	<div class="content">
            <!-- The canvas where ThreeJs renders the WebGL -->
            <canvas id="scene" class="clickable"></canvas>
	</div>
        </div>
    </main>
    <script src="front/js/vendors/three.min.js"></script>
    <script src="front/js/vendors/TweenMax.min.js"></script>
    <script src="front/js/mantenance.js"></script>
</body>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
