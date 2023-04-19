<?php
//index.php

/* 
 * Copyright © 2023 All rights reserved. Todos los derechos reservados.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 16/04/2023
 */
 
//Carga e inicialización de cualquier biblioteca global
require_once 'back/model.php';
require_once 'back/controllers.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

/********Mantenimiento************/
/*if('/Nomina/' === $uri || '/Nomina/index.php' === $uri || '/Nomina/inicio/' === $uri || '/Nomina/datosSalarios' === $uri || '/Nomina/datosEmpleados' === $uri || '/Nomina/salariosConsulta' === $uri || '/Nomina/empleadosConsulta' === $uri){
    mantenance_action();
}
else {
    notfound_action();
}*/

if(('/Nomina/' === $uri || '/Nomina/index.php' === $uri) && isset($_POST['entrar'])){
    login_form_action($_POST['email']);
} elseif('/Nomina/' === $uri || '/Nomina/index.php' === $uri) {
    login_action();
} elseif('/Nomina/inicio/' === $uri || '/Nomina/inicio' === $uri){
    inicio_action();
} elseif ('/Nomina/logout/' === $uri || '/Nomina/logout' === $uri){
    logout_action();
} elseif('/Nomina/datosSalarios/' === $uri || '/Nomina/datosSalarios' === $uri){
    datosSalarios_action();
} elseif(('/Nomina/datosSalarios/' === $uri || '/Nomina/datosSalarios' === $uri) && isset($_POST['guardar'])){
    datosSalarios_form_action();
} elseif('/Nomina/datosEmpleados/' === $uri || '/Nomina/datosEmpleados' === $uri){
    datosEmpleados_action();
} elseif(('/Nomina/datosEmpleados/' === $uri || '/Nomina/datosEmpleados' === $uri) && isset($_POST['enviar'])){
    datosEmpleados_form_action();
} elseif('/Nomina/salariosConsulta/' === $uri || '/Nomina/salariosConsulta' === $uri){
    salariosList_action();
} elseif('/Nomina/empleadosConsulta/' === $uri || '/Nomina/empleadosConsulta' === $uri){
    empleadosList_action();
} else {
    notfound_action();
}

