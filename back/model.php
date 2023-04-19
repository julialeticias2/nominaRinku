<?php
// back/model.php

/* 
 * Copyright © 2023 All rights reserved. Todos los derechos reservados.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 16/04/2023
 */

function abrirBDconexion()
{
    try{
        $conexion = new PDO("mysql:host=localhost;dbname=nomina;charset=utf8", 'root', '');
    }
    catch (PDOException $e){
        $conexion = 'Error en la conexión de la base de datos';
    }
    return $conexion;
}

function cerrarBDconexion(&$conexion)
{
    $conexion = null;
}

function getDatosLogin($username){
    $conexion= abrirBDconexion();
    if($conexion != 'Error en la conexión de la base de datos'){    
        $querytxt="SELECT ID_USUARIO AS ID,correoElectronico,contrasenia FROM usuario WHERE correoElectronico=:username";
        $stm=$conexion->prepare($querytxt);
        $stm->bindParam(":username", $username, PDO::PARAM_STR);
        $stm->execute();
    
        $datosLogin=$stm->fetch(PDO::FETCH_ASSOC);
    
        cerrarBDconexion($conexion);
    }
    else{
        $datosLogin=$conexion;
    }
    return $datosLogin;
}
