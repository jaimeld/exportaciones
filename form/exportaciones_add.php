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
    <script src="js/md5/md5.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <body>
        <form id="acceso" action="index.php" method="post">
        <fieldset>
        <legend>Personal information:</legend>
        Usuario:<br>
        <input type="text" name="usuario" id="usuario"><br>
        Clave:<br>
            <input type="text" name="clave" id="clave"><br>
            <br>
            <div id="mensaje"></div>
            <input type="button" name="enviar" value ="Enviar" onclick="Validar()">
            
        </fieldset>
</form>
        
    </body>
    <script> 
        function Validar(){
        var clave;
        var dato=$("#clave").val();
        clave=CryptoJS.MD5(dato).toString();
        
        
          $.ajax({
                    url:'ValidaAcceso.php',
                    type:'POST',
                    data:"usuario="+$("#usuario").val()+"&clave="+clave,
                    success:function(datos){
                      if (datos=='true') 
                          $("#acceso").submit();
                      else
                           $("#mensaje").html("Usuario o clave erroneo");
                    }
                });
        
        }
    </script> 
</html>