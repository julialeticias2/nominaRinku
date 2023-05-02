<?php
/*
 * Copyright © 2023 All rights reserved. Todos los derechos reservados.
 * All rights reserved.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 16/04/2023
*/

session_start();
$_SESSION = array();
session_destroy();
header("Location: index.php");


