<?php
//front/menu.php

/* 
 * Copyright © 2023 All rights reserved. Todos los derechos reservados.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 17/07/2023
 */

$link=$link.'<link rel="stylesheet" type="text/css" href="front/styles/normalize.css">'
           .'<link rel="stylesheet" type="text/css" href="front/styles/icons.css">'
           .'<link rel="stylesheet" type="text/css" href="front/styles/menu.css">';
$meta=$meta.'<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
$script=$script.'<script src="front/js/modernizr.custom.js"></script>';

ob_start();
?>
    <div class="contenedor">
	<!-- Push Wrapper -->
	<div class="mp-pusher" id="mp-pusher">
            <nav id="mp-menu" class="mp-menu">
		<div class="mp-level">
                    <h2 class="icon icon-world">Inicio</h2>
			<ul>
                            <li class="icon icon-arrow-left">
                                <a class="icon icon-stack" style="cursor: pointer !important;">Consultas</a>
                                <div class="mp-level">
                                    <h2 class="icon icon-data">Consultas</h2>
                                    <a class="mp-back">regresar</a>
                                    <ul>
                                        <li><a class="icon icon-banknote" href="salariosConsulta">Salarios</a></li>
                                        <li><a class="icon icon-user" href="empleadosConsulta">Empleados</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a class="icon icon-news" href="datosSalarios">Capturar Movimientos</a></li>
							<li><a class="icon icon-star" href="datosEmpleados">Ingresar Empleado</a></li>
                            <li><a class="icon icon-lock" href="logout" style="font-style: italic; font-size: 1.3em;">Cerrar Sesión</a></li>
			</ul>
		</div>
            </nav>				
            <div class="scroller">
                <div class="scroller-inner">
                    <div class="menu-top" style="position: fixed;">
                        <div class="block" style="padding-left: 10px;">
                            <p><a style="cursor: pointer !important;" id="trigger" class="menu-trigger">Menu</a></p>
			</div>
                    </div>
                    <?=$scrollContent?>
		</div><!-- /scroller-inner -->
            </div><!-- /scroller -->
	</div><!-- /pusher -->
    </div><!-- /container -->
    <script src="front/js/classie.js"></script>
    <script src="front/js/mlpushmenu.js"></script>
    <script>
        new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
    </script>
    <?//=$scriptsExtend?>
<?php $content = ob_get_clean();
include 'layout.php'; ?>