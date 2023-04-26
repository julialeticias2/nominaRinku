<!-- front/layout.php -->
<!DOCTYPE html>
<!--
 * Copyright (c) 2023, All rights reserved. Todos los derechos reservados.
 * Author: Ing. Julia Leticia Sánchez Sánchez
 * Date: 16/04/2023
-->

<!--<script>
function sheetLoaded() {
  // Hacer algo interesante; la hoja de estilos ha sido cargada
}

function sheetError() {
  alert("¡Ocurrió un error al cargar la hoja de estilos!");
}
</script>

<link rel="stylesheet" href="mystylesheet.css" onload="sheetLoaded()" onerror="sheetError()"> -->
<html lang="es-MX">
    <head>
        <base href="http://localhost/Nomina/">
        <title><?=$title?></title>
        <style><?=$style?></style>
        <?=$link?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta charset="UTF-8">
        <?=$meta?>
        <?=$script?>
    </head>
    <body <?=$bodyProperties?>>
        <?=$content?>
    </body>
    
 </html>

