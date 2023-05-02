<?php
// front/empleadosList.php

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
	$title = 'Consulta de Empleados';
	$style = '.menu-trigger:before {
					box-shadow: 0 6px #428BCA, 0 12px #fff, 0 18px #428BCA, 0 24px #fff;
			  }';
	$link = '<link rel="stylesheet" href="front/styles/bootstrap.min-table.css">'.
			'<link rel="stylesheet" href="front/styles/table.css">';
	$meta = '';
	$script = '<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>'.
			  '<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>'.
			  '<script src="front/js/tableprod.js"></script>';
	$bodyProperties = 'style="background: #428BCA;"';
	if($empleados == 'Error en la conexión de la base de datos'){
		echo '<p class="error">'.$empleados.'</p>';
	}
	ob_start();
?>

<!--Código HTML del contenido de la página-->
<div class="content">
	<div class="container" style="background-color: #428BCA; color: #333;">
		<div class="row">
			<div class="panel panel-primary filterable" style="border-color: #29A92E">
				<div class="panel-heading" style="background-color: #2FC135; border-color: #2FC135;">
					<h3 class="panel-title">Empleados</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>
                    </div>
				</div>
				<table class="table">
					<thead>
						<tr class="filters">
							<th><input type="text" class="form-control" placeholder="#" disabled></th>
							<th><input type="text" class="form-control" placeholder="CURP" disabled></th>
							<th><input type="text" class="form-control" placeholder="Nombre Completo" disabled></th>
							<th><input type="text" class="form-control" placeholder="Rol" disabled></th>
						</tr>
					</thead>
					<tbody class="table-bodyempl">
						<?php
                            $i=1;
                            foreach ($empleados as $empleado){ ?>
                            <tr>
                                <td><?= $i++ ?></td>
								<td><?= $empleado['curp']?></td>
                                <td><?= $empleado['nombre'].' '.$empleado['primerApellido'].' '.$empleado['segundoApellido']?></td>
                                <td><?= $empleado['rol'] ?></td>
                            </tr>
                        <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</div>

<?php $scrollContent = ob_get_clean();
	  include 'menu.php';
} ?>
