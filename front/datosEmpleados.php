<?php
// front/datosEmpleados.php

/* 
 * Copyright © 2023 All rights reserved. Todos los derechos reservados.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 19/04/2023
 */

session_start();

if(!isset($_SESSION['uid'])){
    header('Location: index.php');
    exit;
} else {
	$title = 'Alta nuevo empleado de Rinku';
	$style = '.menu-trigger:before {
					box-shadow: 0 6px #A4DD48, 0 12px #fff, 0 18px #A4DD48, 0 24px #fff;
			  }
			  input + span {
					padding-right: 30px;
			  }

			  input:invalid + span::after {
					position: absolute;
					content: "✖";
					padding-left: 5px;
			  }

			  input:valid + span::after {
					position: absolute;
					content: "✓";
					padding-left: 5px;
			  }
			  .hero-nav{
				  position: fixed;
				  top: 0;
				  right: 0;
				  bottom: 0;
				  left: 0;
				  display: flex;
				  justify-content: center;
				  align-items: center;
				  height: 400px;
				  min-height: 105px;
				  background-image: url(https://images.unsplash.com/photo-1442606383395-175ee96ed967?q=80&fm=jpg&s=5c8c74be9bc91b47c79a1aaf92264be5);
				  background-size: cover;
				  background-position: center;
				  overflow: hidden;
				  .hero-nav__inner{
					  z-index: 1;
			   }
			   h1{
				   color: #efefef;
				   font-size: 5vw;
			   }
			   &:before{
				   content: "";
				   background: rgba(#000, 0);
				   position: absolute;
				   top: 0;
				   left: 0;
				   right: 0;
				   bottom: 0;
				   transition: background 400ms;
			   }
			   &.fixme{
				   &:before{
					   background: rgba(#000, 0.8);
				   }
			   }
			 }
			 .page-content{
				 width: 30em;
				 margin: 0 auto;
				 line-height: 1.625
			 }
			 .cbp-mc-submit-wrap {
	text-align: center;
	padding-top: 20px;
	padding-bottom: 20px;
	clear: both;
}

.cbp-mc-submit {
	background: #8148DD; /*#10689a*/
	border: none;
	color: #fff;
	width: auto;
	cursor: pointer;
	text-transform: uppercase;
	display: inline-block;
	padding: 15px 30px;
	font-size: 1.5vh; /*em*/
	border-radius: 2px;
	letter-spacing: 1px;
}

.cbp-mc-submit:hover {
	background: #0B1C7F; /*#1478b1*/
}';
	$link = '<link rel="stylesheet" href="front/styles/bootstrap.min-table.css">';
			//'<link rel="stylesheet" href="front/styles/blueprintResponsiveMultiColumnForm.css">';
	$meta = '';
	$script = '';
	$bodyProperties = 'style="background: #A4DD48"';
	
	if(isset($_POST['guardar'])){
		if($resultado){
			echo '<p class="success">¡Registro de '.$_POST['nombre'].' exitoso!</p>';
		}
		else{
			echo '<p class="error">Error al guardar los datos ingresados: '.$resultado.'</p>';
		}
		$_POST = array();
		if(isset($_POST['guardar']))
			echo '<p>No se borró POST :(</p>';
	}

	ob_start();
?>

<!--Código HTML del contenido de la página-->
<div class="content">
	<div class="container" style="background-color: #E8DDF8; color: #081119;">
		<div class="hero-nav__inner">
			<h1 align="center">Alta de un nuevo empleado en Rinku</h1>
			<div class="hero-nav__button">
				<a href="#" class="btn"></a>
			</div>
		</div>
<p style="padding-left: 50px;">Ingrese los siguientes datos requeridos para dar de alta un nuevo empleado.</p><br>

<form method="post" action="" style="padding-left: 50px;">
	<label for="curp">CURP</label>
	<input type="text" id="curp" name="curp" placeholder="XXXX000000XXXXXX00" required />
	<span class="validacion"></span><br>

	<label for="nombre">Nombre(s)</label>
	<input type="text" id="nombre" name="nombre" placeholder="Angélica María" required />
	<span class="validacion"></span><br>

	<label for="apellido1">Apellido Paterno</label>
	<input type="text" id="apellido1" name="apellido1" placeholder="García" required />
	<span class="validacion"></span><br>

	<label for="apellido2">Apellido Materno</label>
	<input type="text" id="apellido2" name="apellido2" placeholder="Hernández" required />
	<span class="validacion"></span><br><br>

	<p>Rol:</p>
	<input type="radio" id="chofer" name="rol" value=1 required>
	<label for="chofer">Chofer</label><br>
	<input type="radio" id="cargador" name="rol" value=2 required>
	<label for="cargador">Cargador</label><br>
	<input type="radio" id="aux" name="rol" value=3 required>
	<label for="aux">Auxiliar</label><br><br>

	<input type="hidden" id="usuario" name="usuario" value=<?= $_SESSION['uid']?>>
	<div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" type="submit" id="guardar" name="guardar" value="Guardar" /></div>
    <!--input type="submit" id="guardar" name="guardar" value="Guardar" /-->
</form>
</div>
</div>
<?php $scrollContent = ob_get_clean();
	  include 'menu.php';} ?>
 