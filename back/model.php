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
        $conexion = new PDO("mysql:host=localhost;dbname=nominarinku;charset=utf8", 'root', '');
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

function getAllEmpleados(){
	$conexion= abrirBDconexion();
    if($conexion != 'Error en la conexión de la base de datos'){
		$querytxt="SELECT ID_EMPLEADO AS curp, nombre, primerApellido, segundoApellido, Rol.rol AS rol FROM Empleado, Rol WHERE Rol.ID_ROL = Empleado.FK_ID_ROL ORDER BY ID_EMPLEADO";
		$result = $conexion->query($querytxt);
		$empleados =[];
		while($tupla = $result->fetch(PDO::FETCH_ASSOC)){
			$empleados[] = $tupla;
		}
		
		cerrarBDconexion($conexion);
	}
	else{
		$empleados=$conexion;
	}
	return $empleados;
}

function getAllSalarios(){
	$conexion= abrirBDconexion();
    if($conexion != 'Error en la conexión de la base de datos'){
		$querytxt="SELECT nombre, primerApellido, segundoApellido, anio, mes, horasTrabajadas as horas, sueldoBase, montoXentregas as entregas, ".
				  "montoXbonos as bonos, Porcentaje as isr, montoXretenciones as retenciones, montoXvales as vales, montoSueldo as sueldon ".
				  "FROM Sueldo, Empleado, CAT_ISR WHERE FK_ID_EMPLEADO = ID_EMPLEADO AND FK_ID_ISR = ID_ISR";
		$result = $conexion->query($querytxt);
		$salarios =[];
		while($tupla = $result->fetch(PDO::FETCH_ASSOC)){
			$salarios[] = $tupla;
		}
		
		cerrarBDconexion($conexion);
	}
	else{
		$salarios=$conexion;
	}
	return $salarios;
}

function getCondPagoEmpleado($curp){
	$conexion= abrirBDconexion();
    if($conexion != 'Error en la conexión de la base de datos'){    
        $querytxt="SELECT horasXdia, diasXsemana, pagoXhora, pagoXentrega, bonoXhora, porcVales FROM empleado, rol, cat_jornada WHERE FK_ID_ROL = ID_ROL AND FK_ID_JORNADA = ID_JORNADA AND ID_EMPLEADO = :curp";
        $stm=$conexion->prepare($querytxt);
        $stm->bindParam(":curp", $curp, PDO::PARAM_STR);
        $stm->execute();
    
        $datosCondPagoEmpleado=$stm->fetch(PDO::FETCH_ASSOC);
    
        cerrarBDconexion($conexion);
    }
    else{
        $datosCondPagoEmpleado=$conexion;
    }
    return $datosCondPagoEmpleado;
}

function getISR($sueldoBruto){
	$conexion= abrirBDconexion();
    if($conexion != 'Error en la conexión de la base de datos'){  
        $querytxt="SELECT ID_ISR AS idisr, Porcentaje AS isr FROM CAT_ISR WHERE :sueldob > Rango ORDER BY ID_ISR DESC";
        $stm=$conexion->prepare($querytxt);
        $stm->bindParam(":sueldob", $sueldoBruto, PDO::PARAM_INT);
        $stm->execute();
    
        $ISR=$stm->fetch(PDO::FETCH_ASSOC);
		
        cerrarBDconexion($conexion); 
    }
    else{
        $ISR=$conexion;
    }
    return $ISR;
}

function insertNewEmpleado($datosEmpleado){
	$conexion= abrirBDconexion();
    if($conexion != 'Error en la conexión de la base de datos'){
		
		//Agregar Empleado
		$querytxt="INSERT INTO Empleado (ID_EMPLEADO, nombre, primerApellido, segundoApellido, FK_ID_ROL, usuarioAlta) VALUES (:id, :nom, :apellidoP, :apellidoM, :idRol, :user)";
		$stm = $conexion->prepare($querytxt);
		$stm->bindParam(":id",$datosEmpleado['curp'],PDO::PARAM_STR);
		$stm->bindParam(":nom",$datosEmpleado['nombre'],PDO::PARAM_STR);
		$stm->bindParam(":apellidoP",$datosEmpleado['apellido1'],PDO::PARAM_STR);
		$stm->bindParam(":apellidoM",$datosEmpleado['apellido2'],PDO::PARAM_STR);
		$stm->bindParam(":idRol",$datosEmpleado['rol'],PDO::PARAM_INT);
		$stm->bindParam(":user",$datosEmpleado['usuario'],PDO::PARAM_STR);
		$resultado = $stm->execute();
		
		cerrarBDconexion($conexion);
	}
	else{
		$resultado=false;
	}
	return $resultado;
}

function insertNewSalario($datosSalario){
	$conexion= abrirBDconexion();
    if($conexion != 'Error en la conexión de la base de datos'){
		
		//Agregar Salario
		$querytxt="INSERT INTO Sueldo (anio, mes, horasTrabajadas, sueldoBase, montoXentregas, montoXbonos, FK_ID_ISR, montoXretenciones, ".
				  "montoXvales, montoSueldo, FK_ID_EMPLEADO, usuarioAlta) VALUES (YEAR(CURRENT_TIMESTAMP), :mes, :horast, :salb, :entregas, :bonos, :idisr, :retenciones, :vales, :salt, :curp, :user)";
		$stm = $conexion->prepare($querytxt);
		$stm->bindParam(":mes",$datosSalario['mes'],PDO::PARAM_INT);
		$stm->bindParam(":horast",$datosSalario['sihoras'],PDO::PARAM_INT);
		$stm->bindParam(":salb",$datosSalario['salBase'],PDO::PARAM_INT);
		$stm->bindParam(":entregas",$datosSalario['montoXentregas'],PDO::PARAM_INT);
		$stm->bindParam(":bonos",$datosSalario['montoXbonos'],PDO::PARAM_INT);
		$stm->bindParam(":idisr",$datosSalario['idisr'],PDO::PARAM_INT);
		$stm->bindParam(":retenciones",$datosSalario['montoXreten'],PDO::PARAM_INT);
		$stm->bindParam(":vales",$datosSalario['montoXvales'],PDO::PARAM_INT);
		$stm->bindParam(":salt",$datosSalario['montoSueldo'],PDO::PARAM_INT);
		$stm->bindParam(":curp",$datosSalario['curp'],PDO::PARAM_STR);
		$stm->bindParam(":user",$datosSalario['usuario'],PDO::PARAM_STR);
		$resultado = $stm->execute();
		
		cerrarBDconexion($conexion);
	}
	else{
		$resultado=false;
	}
	return $resultado;
}