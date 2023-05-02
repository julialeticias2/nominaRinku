<?php
// front/salariosList.php

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
	$title = 'Consulta de Salarios';
	$style = '.menu-trigger:before {
					box-shadow: 0 6px #428BCA, 0 12px #fff, 0 18px #428BCA, 0 24px #fff;
			  }';
	$link = '<link rel="stylesheet" href="front/styles/bootstrap.min-table.css">'.
			'<link rel="stylesheet" href="front/styles/table.css">';
	$meta = '';
	$script = '<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>'.
			  '<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>'.
			  '<script src="front/js/table.js"></script>';
	$bodyProperties = 'style="background: #428BCA;"';
	
	if($salarios == 'Error en la conexión de la base de datos'){
		echo '<p class="error">'.$salarios.'</p>';
	}

	ob_start();
?>

<!--Código HTML del contenido de la página-->
<div class="content">
	<div class="container" style="background-color: #428BCA; color: #333;">
		<div class="row">
			<div class="panel panel-primary filterable" style="border-color: #B1713A">
				<div class="panel-heading" style="background-color: #CA8142; border-color: #CA8142;">
					<h3 class="panel-title">Informe de movimientos</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>
                    </div>
				</div>
				<table class="table">
					<thead>
						<tr class="filters">
							<th><input type="text" class="form-control" placeholder="#" disabled></th>
							<th><input type="text" class="form-control" placeholder="Nombre del Empleado" disabled></th>
							<th><input type="text" class="form-control" placeholder="Año" disabled></th>
							<th><input type="text" class="form-control" placeholder="Mes" disabled></th>
							<th><input type="text" class="form-control" placeholder="Horas Trabajadas" disabled></th>
							<th><input type="text" class="form-control" placeholder="Sueldo Base" disabled></th>
							<th><input type="text" class="form-control" placeholder="Pago por Entregas" disabled></th>
							<th><input type="text" class="form-control" placeholder="Pago por Bonos" disabled></th>
							<th><input type="text" class="form-control" placeholder="Porcentaje de ISR" disabled></th>
							<th><input type="text" class="form-control" placeholder="Monto Retenido" disabled></th>
							<th><input type="text" class="form-control" placeholder="Vales" disabled></th>
							<th><input type="text" class="form-control" placeholder="Sueldo bruto" disabled></th>
							<th><input type="text" class="form-control" placeholder="Sueldo neto" disabled></th>
						</tr>
					</thead>
					<tbody class="table-bodysal">
						<?php
                            $i=1;
                            foreach ($salarios as $salario){ ?>
                            <tr>
                                <td><?=$i++ ?></td>
                                <td><?= $salario['nombre'].' '.$salario['primerApellido'].' '.$salario['segundoApellido']?></td>
                                <td><?= $salario['anio'] ?></td>
								<td><?= $salario['mes'] ?></td>
								<td><?= $salario['horas'] ?></td>
								<td><?= $salario['sueldoBase'] ?></td>
								<td><?= $salario['entregas'] ?></td>
								<td><?= $salario['bonos'] ?></td>
								<td><?= $salario['isr'] ?></td>
								<td><?= $salario['retenciones'] ?></td>
								<td><?= $salario['vales'] ?></td>
								<td><?= $salario['sueldoBase'] + $salario['entregas'] + $salario['bonos']?></td>
								<td><?= $salario['sueldon'] ?></td>
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
