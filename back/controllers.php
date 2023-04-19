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
	//$datosLogin=getDatosLogin($username);
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
	
}

function datosSalarios_form_action(){
	
}

function datosEmpleados_action(){
	
}

function datosEmpleados_form_action(){
	
}

function salariosList_action(){
	
}

function empleadosList_action(){
	
}
