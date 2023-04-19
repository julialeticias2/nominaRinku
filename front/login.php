<?php 
//front/login.php

/*
 * Copyright (c) 2023, Coppel
 * All rights reserved.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 16/04/2023
*/

$title = 'Ejercicio Técnico Coppel';
$style = '';
$link = '<link rel="stylesheet" href="front/styles/cleanContactForm.css">';
$meta = '';
$script = '<script>
    document.cookie="testcookie";
    cookiesEnabled=(document.cookie.indexOf("testcookie")!==-1)? true : false;
    if(!cookiesEnabled){
        document.write("<p>Disculpe, las cookies deben estar habilitadas</p>");
    }
</script>';
$bodyProperties = '';

if(isset($_POST['entrar'])){
    session_start();
    $_SESSION['uid'] = "1234";
	header('Location: inicio/');
	exit;
}

ob_start();
?>
    <div class="container">
        <div class="row header">
            <h1>Acceso a la Nomina de Rinku</h1>
            <h3>Inicio de sesión</h3>
        </div>
        <div class="row body">
            <form method="post" action="">
                <ul>
                    <li>
                        <p>
                            <label for="email">Usuario (email)<span class="req">*</span></label>
                            <input type="email" name="email" placeholder="su_correo@dominio.del.correo" title="Ingrese su correo electrónico" /><!--required--><!--oninvalid="this.setCustomValidity('El correo electrónico ingresado no es válido')"-->
                        </p>
                        <p>
                            <label for="password">Contraseña <span class="req">*</span></label>
                            <input type="password" name="password" placeholder="contraseña_asignada" title="Ingrese la contraseña asignada" /><!--required-->
                        </p>
                    </li>        
                    <li>
                        <input class="btn btn-submit" type="submit" name="entrar" value="entrar" />
                        <small>o presione <strong>enter</strong></small>
                    </li>
                </ul>
            </form>  
        </div>
    </div>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>

