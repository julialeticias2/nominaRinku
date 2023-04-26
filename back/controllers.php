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
	//Guardar información en la BD
	require 'front/datosSalarios.php';
}

function datosEmpleados_action(){
	require 'front/datosEmpleados.php';
}

function datosEmpleados_form_action(){
	//Guardar información en la BD
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
