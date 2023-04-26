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
    /*if($datosLogin == 'Error en la conexión de la base de datos'){
        echo '<p class="error">'.$datosLogin.'</p>';
    }
    else{
        if (!$datosLogin) {
            echo '<p class="error">¡El usuario y/o contraseña no son correctos!</p>';
        } else {
            $pepper = "6bMw5YkQ44xGMzFs8K7S2H2c";
            $pwd_peppered = hash_hmac("sha512", $_POST['password'], $pepper);
            if (password_verify($pwd_peppered, $datosLogin['contrasenia'])) {
                //ini_set("session.use_only_cookies","1");
                //ini_set("session.use_trans_sid","0");
                //session_save_path('/home/sates/public_html/iprm/tmp');
                session_start();
                $_SESSION['uid'] = $datosLogin['ID'];
                //$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
                //echo '<p class="success">Congratulations, you are logged in! ID: '.$_SESSION['uid'].'</p>';
                /*$host  = $_SERVER['HTTP_HOST'];
                $uri2   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = 'inicio';
                header("Location: https://$host$uri2/$extra");*/
                //header('Location: datosRetenedores/');
                //-->header('Location: inicio/');
                //echo 'https://'.$host.$uri2.'/'.$extra;
                //header('Location: https://www.google.com/');
                //-->exit;
            /*} else {
                echo '<p class="error">¡El usuario y/o contraseña no son correctos!</p>';
            }
        }
    }*/
	session_start();
    $_SESSION['uid'] = "1234";
	header('Location: inicio/');
	exit;
}
    /*$pwd_hash = password_hash("12345", PASSWORD_DEFAULT);
    echo $pwd_hash.'\n';
    echo password_verify("12345", $pwd_hash);*/
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

