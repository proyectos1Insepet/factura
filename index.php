<!DOCTYPE html>
<!--
Monitor de facturación
Sistemas Insepet LTDA
-->
<html>
 <head>
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <meta charset="UTF-8">
  <link REL="stylesheet" TYPE="text/css" HREF="estilo.css">
  <link rel="icon" href="favicon.ico">
  <link rel="shortcut icon" href="favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script language="JavaScript" type="text/javascript" src="js/jQuery.js"></script>
  <script language="JavaScript" type="text/javascript" src="js/form.js"></script>
    <script type="text/javascript">

        function mostrarReferencia(){
        //Si la opcion con id Conocido_1 (dentro del documento > formulario con name fcontacto >     y a la vez dentro del array de Conocido) esta activada
        if (document.fcontacto.Conocido[1].checked === true) {
        //muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
        document.getElementById('desdeotro').style.display='block';
        //por el contrario, si no esta seleccionada
        } else {
        //oculta el div con id 'desdeotro'
        document.getElementById('desdeotro').style.display='none';
        }
        }
    </script>
  <title>Formulario de facturación</title>
 </head>
 <body>
 <header class="header"><a href="index.php"> <img src="insepet.png" alt="Logo sistema NSX"></a> </header>
     <div id="idioma">Idioma : <a href="index.php">es</a>/<a href="en/index.php">en</a></div>
        <nav id="cssmenu">
            <ul>
                <li class="active"><a href="index.php">Ventas</a></li>
                <li><a href="historico.php">Historico</a></li>
                <li><a href="configuracion.php">Configuracion</a></li>
            </ul>
        </nav>                
<!--     <fieldset id="buildyourform">
     <legend>Build your own form!</legend>
     </fieldset>
     <input type="button" value="Preview form" class="add" id="preview" />
        <input type="button" value="Add a field" class="add" id="add" />   -->
<div id="resultados">
<h1>Impresión de ventas</h1>
</div>
<form  name="fcontacto" id="formulario"  method="post">
        
      <p><input name="num_venta" type="text"  placeholder="Venta" value="<?php echo filter_input(INPUT_GET, 'num_venta'); ?>" /></p>      
      <p><input name="nombre" type="text" placeholder="Nombre / Razón Social"  /></p>
      <p><input name="nit" type="text" placeholder="Nit / Cif / Cédula"  /></p>
      <p><input name="dir" type="text" placeholder="Dirección"  /></p>
      <p><input name="tel" type="text"  placeholder="Teléfono"  /></p> 
      <p><input type="radio" name="Conocido" value="Google" id="Conocido_0" onclick="mostrarReferencia();" /> Campos completos
      <input type="radio" name="Conocido" value="Otros" id="Conocido_1" onclick="mostrarReferencia();" /> Agregar campos</p>
      <div id="desdeotro" style="display:none;">
          <p>Dato según usuario:<br><select name="select1">
              <option name="">Placa </option>
              <option>Dato 2</option>      
         </select>      
      <input name="campo1" type="text"  placeholder="Digite el primer dato"  /></p>
          <p>Dato según usuario 2: <br><select name="select2">
          <option>Dato 3</option>
          <option>Dato 4</option>
         </select>
          <input name="campo2" type="text" placeholder="Digite segundo dato"  /></p>
      </div>
      <input class="centro" type="image" name="enviar"  src="printer_64.png" alt="impresion" width="60px" height="60px"  onclick ="this.form.action = 'impresion.php';this.form.target = '_self';"/>
      <input class="centro" type="image" name="enviar"  src="pdf.png" alt="impresion" width="60px" height="60px"  onclick ="this.form.action = 'pdf.php';this.form.target = '_self';"/>
     
      </form>
  
          
    </body>
</html>
