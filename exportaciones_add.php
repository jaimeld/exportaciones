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
        <form id="acceso"  method="post">
        <fieldset>
        <legend>Ingresar Producto:</legend>
        nombre:<br>
        <input type="text" name="nombreproducto" id="nombreProducto"><br>
        Total USD:<br>
            <input type="text" name="totalUSD" id="totalUSD"><br>
            <br>
         Anio:<br>
            <input type="text" name="anio" id="anio"><br>
            <br>
            <div id="mensaje"></div>
            <input type="button" name="enviar" value ="Enviar" onclick="Validar()">
            
        </fieldset>
</form>
        
    </body>
    <script> 
        function Validar(){

        
        
          $.ajax({
                    url:'accProductoAgregar.php',
                    type:'POST',
                    data:"nombreProducto="+$("#nombreProducto").val()
                        +"totalUSD="+$("#totalUSD").val()
                        +"anio="+$("#anio").val(),
                    success:function(datos){
                      if (datos=='true') 
                          $("#mensaje").html("ingresado correctamente");
                      else
                           $("#mensaje").html("error al ingresar");
                    }
                });
        
        }
    </script> 
</html>