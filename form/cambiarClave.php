<?php 
session_start();
require 'Usuario.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <!-- URL de prueba http://jsfiddle.net/33hmj/ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="js/md5/md5.js"></script>
    <body>

        <?php require 'ValidaSesion.php';?>

<?php

$oUsr=unserialize($_SESSION['oUsr']);

echo "Cambiar clave a:".$oUsr->getNombre()." ".$oUsr->getApellido();
?>
 <form id="cambioclave" >
        <fieldset>
        <legend>Personal information:</legend>
        Clave Actual:<br>
        <input type="text" name="claveactual" id="claveactual"><br>
        Nueva Clave:<br>
            <input type="text" name="clavenueva" id="clavenueva"><br>
            <br>
        Repetir Clave:<br>
            <input type="text" name="repetirclave" id="repetirclave"><br>
            <br>
            <div id="mensaje"></div>
            <input type="button" name="enviar" value ="Enviar" onclick="Cambiar()">
            
        </fieldset>
</form>
<script> 
        function Cambiar(){
            var clave;
            var claveactual="<?=$oUsr->getClave();?>";
            var dato=$("#claveactual").val();
            clave=CryptoJS.MD5(dato).toString();

            if (claveactual!=clave){
               alert("Clave actual no corresponde"); 
               return;
            }

            if ($("#clavenueva").val()!=$("#repetirclave").val()){
                alert("Su nueva clave no coincide");
                return;
            }
            
            $.ajax({
                    url:'AccCambiarClave.php',
                    type:'POST',
                    data:"clave="+ CryptoJS.MD5($("#clavenueva").val()).toString(),
                    success:function(datos){
                      alert("clave cambiada");
                    }
                });
        }
    </script> 
</body>
</html>