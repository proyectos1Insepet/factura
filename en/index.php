<!DOCTYPE html>
<!--
Monitor de facturación
Sistemas Insepet LTDA
-->
<html>
 <head>
  <meta charset="UTF-8">
  <link REL="stylesheet" TYPE="text/css" HREF="../estilo.css">
  <link rel="icon" href="../favicon.ico">
  <link rel="shortcut icon" href="../favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script language="JavaScript" type="text/javascript" src="../js/jQuery.js"></script>
  <script language="JavaScript" type="text/javascript" src="../js/form.js"></script>
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
  <title>Billing Form</title>
 </head>
 <body>
     <header class="header"><a href="index.php"> <img src="../insepet.png" alt="Logo sistema NSX"></a> </header>
     <div id="idioma">Language : <a href="../index.php">es</a>/<a href="en/">en</a></div>
 <nav id="cssmenu">
  <ul>
    <li class="active"><a href="index.php">Sales</a></li>
    <li><a href="historico.php">Historical</a></li>
    <!--<li><a href="turno.php">Turnos</a></li>-->
    <li><a href="configuracion.php">Configuration</a></li>
  </ul>
</nav>
     <div id="resultados">
        <h1>Sales Print</h1>
     </div>
<div>
    <form name="fcontacto"  id="formulario"  method="post">
        <p><input name="num_venta" type="text"  placeholder="Número de venta" value="<?php echo filter_input(INPUT_GET, 'num_venta'); ?>" /></p>
      <p><input name="nombre" type="text"  placeholder="Name"  /></p>
      <p><input name="nit" type="text" placeholder="VAT"  /></p>
      <p><input name="dir" type="text" placeholder="Address"  /></p>
      <p><input name="tel" type="text"  placeholder="Phone"  /></p>    
      <p><input type="radio" name="Conocido" value="Google" id="Conocido_0" onclick="mostrarReferencia();" />Fields Complete
      <input type="radio" name="Conocido" value="Otros" id="Conocido_1" onclick="mostrarReferencia();" /> Add fields</p>
      <div id="desdeotro" style="display:none;">
          <p>Data accord user:<br><select name="select1">
              <option>Plate </option>
              <option>Data 2</option>      
         </select>      
      <input name="campo1" type="text"  placeholder="Type first data"  /></p>
          <p>Data accord user: <br><select name="select2">
          <option>Data 3</option>
          <option>Data 4</option>
         </select>
          <input name="campo2" type="text" placeholder="Type second data"  /></p>
      </div>
      <input type="image" name="enviar"  src="../printer_64.png" alt="impresion" width="60px" height="60px"  onclick ="this.form.action = 'impresion.php';this.form.target = '_self';"/>
      <input type="image" name="enviar"  src="../pdf.png" alt="impresion" width="60px" height="60px"  onclick ="this.form.action = 'pdf.php';this.form.target = '_self';"/>
     
      </form>
  </div>
     
    
        

<div id="impresion">
   

    
    
    

        
    </body>
</html>
