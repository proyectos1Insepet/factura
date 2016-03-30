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

<h1>Impresión de ventas</h1>
    
    <form  id="formulario"  method="post">
        
      <p><input name="num_venta" type="text"  placeholder="Venta" value="<?php echo filter_input(INPUT_GET, 'num_venta'); ?>" /></p>      
      <p><input name="nombre" type="text" placeholder="Nombre / Razón Social"  /></p>
      <p><input name="nit" type="text" placeholder="Nit / Cif / Cédula"  /></p>
      <p><input name="dir" type="text" placeholder="Dirección"  /></p>
      <p><input name="tel" type="text"  placeholder="Teléfono"  /></p>   
      <p>Dato según usuario:<select name="campo1">
          <option>Dato 1 </option>
          <option>Dato 2</option>      
         </select>      
      <p>Dato según usuario: <select name="campo2">
          <option>Dato 3 </option>
          <option>Dato 4</option>
         </select>
      <input class="centro" type="image" name="enviar"  src="printer_64.png" alt="impresion" width="60px" height="60px"  onclick ="this.form.action = 'impresion.php';this.form.target = '_blank';"/>
      <input class="centro" type="image" name="enviar"  src="pdf.png" alt="impresion" width="60px" height="60px"  onclick ="this.form.action = 'pdf.php';this.form.target = '_blank';"/>
     
      </form>
  
          
    </body>
</html>
