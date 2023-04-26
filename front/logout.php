<?php
/* 
 * Copyright (c) 2021, Dirección de Atención y Enlace del SATES (Servicio de Administración Tributaria del Estado de Sinaloa)
 * All rights reserved.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 29/01/2021
 */

/*setcookie(session_name(), session_id(), 1);
$_SESSION = array();
session_destroy();*/

session_start();
$_SESSION = array();
session_destroy();
header("Location: index.php");


