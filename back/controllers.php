<?php
// back/controllers.php

/* 
 * Copyright © 2023 All rights reserved. Todos los derechos reservados.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 16/04/2023
 */

function login_action(){
    require 'front/login.php';
}

function login_form_action($username){
	$datosLogin = getDatosLogin($username);
    require 'front/login.php';
}

function inicio_action(){
    require 'front/welcome.php';
}

function notfound_action(){
    require 'front/notFound.php';
}

function mantenance_action(){
    require 'front/mantenance.php';
}

function logout_action(){
    session_start();
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])) {
        setcookie(session_name(), session_id(), 1);
    }
    session_destroy();
    header("Location: index.php");
}

function datosSalarios_action(){
	require 'front/datosSalarios.php';
}

function datosSalarios_form_action(){
	//Guardar los valores del formulario en $datosSalario[]
	$datosSalario=[];
	foreach($_POST as $clave => $valor){
		$datosSalario[$clave] = $valor;
	}
	
	//Procesamiento de $datosSalario, de acuerdo a la lógica del negocio
	
	//Obtener las condiciones de pago del empleado
	$datosCondPagoEmpleado = getCondPagoEmpleado($datosSalario['curp']);
	$horasXdia = $datosCondPagoEmpleado['horasXdia'];
	$diasXsemana = $datosCondPagoEmpleado['diasXsemana'];
	$pagoXhora = $datosCondPagoEmpleado['pagoXhora'];
	$pagoXentrega = $datosCondPagoEmpleado['pagoXentrega'];
	$pagoBonoxHora = $datosCondPagoEmpleado['bonoXhora'];
	$porcVales = $datosCondPagoEmpleado['porcVales'];
	
	//Horas por mes
	$semanasXmes=4;
	$horasXmes=$horasXdia*$diasXsemana*$semanasXmes;
	
	
	//Horas trabajadas
	$sihoras = $horasXmes - $datosSalario['nohoras'];
	$sihoras = $sihoras - ($datosSalario['nodias'] * $horasXdia);
	$datosSalario['sihoras'] = $sihoras;
	
	//Sueldo base
	$datosSalario['salBase'] = $sihoras * $pagoXhora;
	
	
	//Pago por entregas
	$datosSalario['montoXentregas'] = $pagoXentrega * $datosSalario['entregas'];
	
	//Pago por bono
	$datosSalario['montoXbonos'] = $pagoBonoxHora * $sihoras;
	
	//Impuestos
	$sueldoBruto = $datosSalario['salBase'] + $datosSalario['montoXentregas'] + $datosSalario['montoXbonos'];
	$ISR = getISR($sueldoBruto);
	$datosSalario['idisr'] = $ISR['idisr'];
	$datosSalario['montoXreten'] = round($sueldoBruto * ($ISR['isr'] / 100));
	
	//Suedo mensual
	$datosSalario['montoSueldo'] = $sueldoBruto - $datosSalario['montoXreten'];
	
	//Vales
	$datosSalario['montoXvales'] = round($datosSalario['montoSueldo'] * ($porcVales / 100)); 
	
	//Guardar la información en la BD
	$resultado = insertNewSalario($datosSalario);
	require 'front/datosSalarios.php';
}

function datosEmpleados_action(){
	require 'front/datosEmpleados.php';
}

function datosEmpleados_form_action(){
	//Guardar información en la BD
	$datosEmpleado=[];
	foreach($_POST as $clave => $valor){
		$datosEmpleado[$clave]=$valor;
	}
	$resultado=insertNewEmpleado($datosEmpleado);
	require 'front/datosEmpleados.php';
}

function salariosList_action(){
	$salarios = getAllSalarios();
	require 'front/salariosList.php';
}

function empleadosList_action(){
	$empleados = getAllEmpleados();
	require 'front/empleadosList.php';
}
